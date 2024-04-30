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

        foreach ($monthsInThisYear as $month) {
            $ppuf_month[strtolower($month) . ' ' . date('Y')] = 0;
        }
        foreach ($monthsInNextYear as $month) {
            $ppuf_month[strtolower($month) . ' ' . (date('Y') + 1)] = 0;
        }

        $ppufs = Ppuf::whereIn('period', [date('Y'), date('Y') + 1])
            ->orderByRaw("FIELD(`date`, '" . implode("','", array_merge($monthsInNextYear, $monthsInThisYear)) . "')")
            ->get();

        foreach ($ppufs as $ppuf) {
            $key = strtolower($ppuf->date) . ' ' . $ppuf->period;
            if (array_key_exists($key, $ppuf_month)) {
                $ppuf_month[$key]++;
            }
        }

        return $ppuf_month;

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

        return view('home', compact('output', 'user', 'ppuf_month'));
    }
}
