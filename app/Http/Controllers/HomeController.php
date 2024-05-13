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
            $user = Auth::user();
            $admin = $user->superAdmin() || $user->wr2();
            return $admin ? redirect()->route('dashboard') : redirect()->route('user.dashboard');
        }
        return view('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $admin = $user->superAdmin() || $user->wr2();
        if (!$admin) {
            return redirect()->route('user.dashboard');
        }

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
            'persentase_pengajuan' => round(($totalPengajuan / $totalRkat) * 100, 2),
            'total_rab_diajukan' => $totalRabDiajukan,
            'persentase_rab_diajukan' => round(($totalRabDiajukan / $totalRab) * 100, 2),
            'total_rab_disetujui' => $totalRabDisetujui,
            'persentase_sudah_disetujui' => ($totalRabDiajukan != 0) ? round(($totalRabDisetujui / $totalRabDiajukan) * 100, 2) : 0,
        ];

        return view('home', compact('output', 'user', 'ppuf_month', 'bulanChart', 'budgetChart'));
    }

    public function period($period)
    {
        $user = Auth::user();
        $admin = $user->superAdmin() || $user->wr2();
        if (!$admin) {
            return redirect()->route('user.period', $period);
        }
        $month = explode(" ", $period)[0];
        $keyword = request('keyword', NULL);
        $status = request('status', NULL);

        $submissions = Submission::with('ppuf')
            ->whereHas('ppuf', function (Builder $query) use ($month) {
                $query->whereRaw("LOWER(date) LIKE ?", ["%" . strtolower($month) . "%"])
                    ->orWhereRaw("UPPER(date) LIKE ?", ["%" . strtoupper($month) . "%"]);
            })
            ->when($keyword, function (Builder $builder) use ($keyword) {
                $builder->whereHas('ppuf', function (Builder $builder) use ($keyword) {
                    $builder->whereAny([
                        'ppuf_number',
                        'activity_type',
                        'program_name',
                        'date',
                    ], 'LIKE', "%$keyword%");
                })
                    ->orWhereHas('ppuf', function (Builder $builder) use ($keyword) {
                        $builder->whereHas('author', function (Builder $builder) use ($keyword) {
                            $builder->where('role', 'LIKE', "%$keyword%");
                        });
                    });
            })
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->paginate();

        return view('period', compact('submissions', 'period'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $admin = $user->superAdmin() || $user->wr2();
        if ($admin) {
            return redirect()->route('dashboard');
        }

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

        $user = Auth::user();
        $subdivisionIds = collect($user->hasSubDivision())->pluck('id')->toArray();

        $ppufs = Ppuf::whereIn('period', [date('Y'), date('Y') + 1])
            ->orderByRaw("FIELD(`date`, '" . $monthsCollection->implode("','") . "')")
            ->whereHas('author', function (Builder $query) use ($subdivisionIds) {
                $query->whereIn('id', $subdivisionIds);
            })
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
            ->whereHas('role', function (Builder $query) use ($subdivisionIds) {
                $query
                    ->whereIn('id', $subdivisionIds)
                    ->whereHas('ppuf');
            })
            ->get();

        $rkat = Ppuf::query()
            ->with('submissions')
            ->where(function ($query) use ($subdivisionIds) {
                $query->whereHas('author', function (Builder $authorQuery) use ($subdivisionIds) {
                    $authorQuery->whereIn('id', $subdivisionIds);
                });
            })
            ->where(function ($query) {
                $query->where('period', date('Y'))
                    ->orWhere('period', date('Y') + 1);
            })
            ->get();

        $totalRkat = $rkat->count();
        $totalRab = $rkat->pluck('budget')->each(fn ($item) => intval($item))->sum();
        $totalPengajuan = $rkat->sum(fn ($rkat) => $rkat->submissions->count());
        $totalRabDiajukan = $rkat->flatMap(fn ($rkat) => $rkat->submissions)->pluck('budget')->each(fn ($item) => intval($item))->sum();
        $totalRabDisetujui = $rkat->flatMap(fn ($rkat) => $rkat->submissions)->pluck('approved_budget')->each(fn ($item) => intval($item))->sum();

        $totalRoleMengajukan = User::whereHas('role', function ($query) use ($subdivisionIds) {
            $query
                ->whereIn('id', $subdivisionIds)
                ->whereHas('ppuf.submissions');
        })->count();

        $output = [
            'total_rkat' => $totalRkat,
            'total_rab' => $totalRab,
            'total_user_mengajukan' => $totalRoleMengajukan,
            'total_pengajuan' => $totalPengajuan,
            'persentase_pengajuan' => round(($totalPengajuan / $totalRkat) * 100, 2),
            'total_rab_diajukan' => $totalRabDiajukan,
            'persentase_rab_diajukan' => round(($totalRabDiajukan / $totalRab) * 100, 2),
            'total_rab_disetujui' => $totalRabDisetujui,
            'persentase_sudah_disetujui' => ($totalRabDiajukan != 0) ? round(($totalRabDisetujui / $totalRabDiajukan) * 100, 2) : 0,
        ];

        return view('home', compact('output', 'user', 'ppuf_month', 'bulanChart', 'budgetChart'));
    }

    public function userPeriod($period)
    {
        $user = Auth::user();
        $admin = $user->superAdmin() || $user->wr2();
        if ($admin) {
            return redirect()->route('ppuf.period', $period);
        }

        $month = explode(" ", $period)[0];
        $keyword = request('keyword', NULL);
        $status = request('status', NULL);

        $user = Auth::user();
        $subdivisionIds = collect($user->hasSubDivision())->pluck('id')->toArray();

        $submissions = Submission::with('ppuf')
            ->whereHas('ppuf', function (Builder $query) use ($month, $subdivisionIds) {
                $query->whereHas('author', function (Builder $authorQuery) use ($subdivisionIds) {
                    $authorQuery->whereIn('id', $subdivisionIds);
                })->where(function ($query) use ($month) {
                    $query->whereRaw("LOWER(date) LIKE ?", ["%" . strtolower($month) . "%"])
                        ->orWhereRaw("UPPER(date) LIKE ?", ["%" . strtoupper($month) . "%"]);
                });
            })
            ->when($keyword, function (Builder $builder) use ($keyword) {
                $builder->whereHas('ppuf', function (Builder $builder) use ($keyword) {
                    $builder->whereAny([
                        'ppuf_number',
                        'activity_type',
                        'program_name',
                        'date',
                    ], 'LIKE', "%$keyword%");
                })
                    ->orWhereHas('ppuf', function (Builder $builder) use ($keyword) {
                        $builder->whereHas('author', function (Builder $builder) use ($keyword) {
                            $builder->where('role', 'LIKE', "%$keyword%");
                        });
                    });
            })
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->paginate();

        return view('period', compact('submissions', 'period'));
    }
}
