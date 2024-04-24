<?php

namespace App\Http\Controllers;

use App\Models\Ppuf;
use App\Models\Submission;
use App\Models\User;
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
        // tampilkan submission berdasarakan period 
        // tampilkan submission berdasarakan period pencairan 
        $submisions = Submission::query()
            ->orderBy('period')
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

        return view('home', compact('output'));
    }
}
