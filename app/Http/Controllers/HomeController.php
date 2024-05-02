<?php

namespace App\Http\Controllers;

use App\Models\Ppuf;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth');
    }

    public function dashboard()
    {
        $monthsInThisYear = ['maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
        $monthsInNextYear = ['januari', 'februari'];
        $ppuf_month = [];

        $currentMonth = date('n');
        $targetMonth = 3;
        $year = date('Y');
        $monthsInThisYear = collect($monthsInThisYear)
            ->map(function ($month) use ($currentMonth, $targetMonth, $year) {
                if ($currentMonth < $targetMonth) $year--;
                return strtolower($month) . ' ' . $year;
            })->toArray();
        $monthsInNextYear = collect($monthsInNextYear)
            ->map(function ($month) use ($currentMonth, $targetMonth, $year) {
                if ($currentMonth >= $targetMonth) $year++;
                return strtolower($month) . ' ' . $year;
            })->toArray();
        $monthsCollection = collect(array_merge($monthsInThisYear, $monthsInNextYear));

        $monthsCollection->each(function ($month) use (&$ppuf_month) {
            $ppuf_month[$month] = [
                'count' => 0,
                'budget' => 0,
                'submissions' => 0,
                'submissions_budget' => 0,
                'approved_budget' => 0,
                'data' => []
            ];
        });

        $ppufs = Ppuf::whereIn('period', [date('Y'), date('Y') + 1])
            ->orderByRaw("FIELD(`date`, '" . $monthsCollection->implode("','") . "')")
            ->get();

        $ppufs->each(function (Ppuf $ppuf) use (&$ppuf_month) {
            $key = strtolower($ppuf->date) . ' ' . $ppuf->period;
            if (array_key_exists($key, $ppuf_month)) {
                $ppuf_month[$key]['count']++;
                $ppuf_month[$key]['budget'] += intval($ppuf->budget);
                $ppuf_month[$key]['submissions'] += count($ppuf->submissions);
                $ppuf_month[$key]['submissions_budget'] += collect($ppuf->submissions)
                    ->pluck('budget')
                    ->each(fn ($item) => intval($item))
                    ->sum();
                $ppuf_month[$key]['approved_budget'] += collect($ppuf->submissions)
                    ->pluck('approved_budget')
                    ->each(fn ($item) => intval($item))
                    ->sum();
                $ppuf_month[$key]['data'][] = [
                    'budget' => intval($ppuf->budget)
                ];
            }
        });

        $chart = [];
        foreach ($ppuf_month as $key => $value) {
            $chart[] = [
                'bulan' => $key,
                'budget' => $value['approved_budget']
            ];
        }
        $bulanChart = collect($chart)->pluck("bulan")->all();
        $budgetChart = collect($chart)->pluck("budget")->all();

        $user = User::query()
            ->whereHas('role', fn (Builder $query) => $query->whereHas('ppuf'))
            ->get();

        $rkat = Ppuf::query()
            ->with('submissions')
            ->where('period', date('Y'))
            ->orWhere('period', date('Y') + 1)
            ->get();

        $totalRkat = $rkat->count();
        $totalRab = $rkat->pluck('budget')->each(fn ($item) => intval($item))->sum();
        $totalPengajuan = $rkat->sum(fn ($rkat) => $rkat->submissions->count());
        $totalRabDiajukan = $rkat->flatMap(fn ($rkat) => $rkat->submissions)->pluck('budget')->each(fn ($item) => intval($item))->sum();
        $totalRabDisetujui = $rkat->flatMap(fn ($rkat) => $rkat->submissions)->pluck('approved_budget')->each(fn ($item) => intval($item))->sum();

        $totalRoleMengajukan = User::whereHas('role', fn ($query) => $query->whereHas('ppuf.submissions'))->count();

        $output = [
            'total_rkat' => $totalRkat,
            'total_rab' => $totalRab,
            'total_user_mengajukan' => $totalRoleMengajukan,
            'total_pengajuan' => $totalPengajuan,
            'persentase_pengajuan' => ($totalPengajuan / $totalRkat) * 100,
            'total_rab_diajukan' => $totalRabDiajukan,
            'persentase_rab_diajukan' => ($totalRabDiajukan / $totalRab) * 100,
            'total_rab_disetujui' => $totalRabDisetujui,
            'persentase_sudah_disetujui' => ($totalRabDiajukan != 0) ? ($totalRabDisetujui / $totalRabDiajukan) * 100 : 0,
        ];

        return view('home', compact('output', 'user', 'ppuf_month', 'bulanChart', 'budgetChart'));
    }
}
