<?php

namespace App\Http\Controllers;

use App\Models\Ppuf;
use App\Models\Submission;
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
        $months = [
            'januari',
            'februari',
            'maret',
            'april',
            'mei',
            'juni',
            'juli',
            'agustus',
            'september',
            'oktober',
            'november',
            'desember',
        ];

        $ppuf_month = [];

        foreach ($months as $month) {
            $ppuf_month[strtolower($month) . ' ' . date('Y')] = 0;
        }
        foreach ($months as $month) {
            $ppuf_month[strtolower($month) . ' ' . (date('Y') + 1)] = 0;
        }

        $ppufs = Ppuf::whereIn('period', [date('Y'), date('Y') + 1])
            ->orderByRaw("FIELD(`date`, '" . implode("','", $months) . "')")
            ->get();

        foreach ($ppufs as $ppuf) {
            $key = strtolower($ppuf->date) . ' ' . $ppuf->period;
            $ppuf_month[$key]++;
        }

        $user = User::query()
            ->whereHas('role', function (Builder $query) {
                $query->whereHas('ppuf');
            })
            ->get();

        $rkat = Ppuf::query()
            ->with('submissions')
            ->where('period', date('Y'))
            ->get();

        $totalRkat = $rkat->count();
        $totalRab = $rkat->pluck('budget')->sum();
        $totalPengajuan = $rkat->sum(function ($rkat) {
            return $rkat->submissions->count();
        });
        $totalRabDiajukan = $rkat->flatMap(function ($rkat) {
            return $rkat->submissions;
        })->pluck('budget')->sum();
        $totalRabDisetujui = $rkat->flatMap(function ($rkat) {
            return $rkat->submissions;
        })->pluck('approved_budget')->sum();

        $totalRoleMengajukan = User::whereHas('role', function ($query) {
            $query->whereHas('ppuf.submissions');
        })->count();

        $output = [
            'total_rkat' => $totalRkat,
            'total_rab' => $totalRab,
            'total_user_mengajukan' => $totalRoleMengajukan,
            'total_pengajuan' => $totalPengajuan,
            'persentase_pengajuan' => ($totalPengajuan / $totalRkat) * 100,
            'total_rab_diajukan' => $totalRabDiajukan,
            'persentase_rab_diajukan' => ($totalRabDiajukan / $totalRab) * 100,
            'total_rab_disetujui' => $totalRabDisetujui,
            'persentase_sudah_disetujui' => ($totalRabDisetujui / $totalRabDiajukan) * 100,
        ];

        return view('home', compact('output', 'user', 'ppuf_month'));
    }
}
