<?php

namespace App\Http\Controllers;

use App\Models\Ppuf;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
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
        if (!$this->isAdmin($user)) {
            return redirect()->route('user.dashboard');
        }

        $year = (int) request('year', date('Y'));
        [$ppuf_month, $bulanChart] = $this->initializeMonthData($year);

        $ppufs = $this->getPpufsForFiscalYear($year, array_keys($ppuf_month));
        $this->processPpufs($ppufs, $ppuf_month);

        $output = $this->calculateStatistics($year);
        $budgetChart = array_column($ppuf_month, 'approved_budget');

        return view('home', compact('output', 'ppuf_month', 'bulanChart', 'budgetChart'));
    }

    protected function isAdmin(User $user): bool
    {
        return $user->superAdmin() || $user->wr2();
    }

    protected function initializeMonthData(int $year): array
    {
        $months = [
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
            'januari',
            'februari'
        ];

        $ppuf_month = [];

        // March-December current year
        foreach (array_slice($months, 0, 10) as $month) {
            $ppuf_month[strtolower($month) . ' ' . $year] = $this->getMonthTemplate();
        }

        // January-February next year
        foreach (array_slice($months, 10, 2) as $month) {
            $ppuf_month[strtolower($month) . ' ' . ($year + 1)] = $this->getMonthTemplate();
        }

        return [$ppuf_month, array_keys($ppuf_month)];
    }

    protected function getMonthTemplate(): array
    {
        return [
            'count' => 0,
            'budget' => 0,
            'submissions' => 0,
            'submissions_budget' => 0,
            'approved_budget' => 0,
            'data' => []
        ];
    }

    protected function getPpufsForFiscalYear(int $year, array $orderedMonths)
    {
        [$start1, $end1, $start2, $end2] = $this->getFiscalYearDateRange($year);

        return Ppuf::with('submissions')
            ->where(function ($q) use ($year) {
                $q->where('period', $year);
            })
            ->where(function ($q) use ($start1, $end1, $start2, $end2) {
                $q->whereBetween('created_at', [$start1, $end1])
                    ->orWhereBetween('created_at', [$start2, $end2]);
            })
            ->orderByRaw("FIELD(`date`, '" . implode("','", $orderedMonths) . "')")
            ->get();
    }

    protected function getFiscalYearDateRange(int $year): array
    {
        return [
            Carbon::create($year, 3, 1)->startOfMonth(),  // March 1
            Carbon::create($year, 12, 31)->endOfDay(),    // December 31
            Carbon::create($year + 1, 1, 1)->startOfDay(), // January 1
            Carbon::create($year + 1, 2, 1)->endOfMonth() // February 28/29
        ];
    }

    protected function processPpufs($ppufs, &$ppuf_month): void
    {
        foreach ($ppufs as $ppuf) {
            try {
                $key = strtolower($ppuf->date) . ' ' . $ppuf->period;
                if (!isset($ppuf_month[$key])) continue;

                $submissions = $ppuf->submissions ?? collect();

                $ppuf_month[$key]['count']++;
                $ppuf_month[$key]['budget'] += (int)($ppuf->budget ?? 0);
                $ppuf_month[$key]['submissions'] += $submissions->count();
                $ppuf_month[$key]['submissions_budget'] += $submissions->sum('budget');
                $ppuf_month[$key]['approved_budget'] += $submissions->sum('approved_budget');
                $ppuf_month[$key]['data'][] = ['budget' => (int)($ppuf->budget ?? 0)];
            } catch (\Exception $e) {
                logger()->error('Error processing PPUF: ' . $e->getMessage());
                continue;
            }
        }
    }

    protected function calculateStatistics(int $year): array
    {
        [$start1, $end1, $start2, $end2] = $this->getFiscalYearDateRange($year);

        $rkat = Ppuf::with('submissions')
            ->where(function ($q) use ($start1, $end1, $start2, $end2) {
                $q->whereBetween('created_at', [$start1, $end1])
                    ->orWhereBetween('created_at', [$start2, $end2]);
            })
            ->get();

        $totalRkat = $rkat->count();
        $totalRab = $rkat->sum(fn($item) => (int)($item->budget ?? 0));

        $submissions = $rkat->pluck('submissions')->flatten();
        $totalPengajuan = $submissions->count();
        $totalRabDiajukan = $submissions->sum('budget');
        $totalRabDisetujui = $submissions->sum('approved_budget');

        $totalRoleMengajukan = User::whereHas('role.ppuf.submissions')->count();

        return [
            'total_rkat' => $totalRkat,
            'total_rab' => $totalRab,
            'total_user_mengajukan' => $totalRoleMengajukan,
            'total_pengajuan' => $totalPengajuan,
            'persentase_pengajuan' => $totalRkat ? round(($totalPengajuan / $totalRkat) * 100, 2) : 0.0,
            'total_rab_diajukan' => $totalRabDiajukan,
            'persentase_rab_diajukan' => $totalRab ? round(($totalRabDiajukan / $totalRab) * 100, 2) : 0.0,
            'total_rab_disetujui' => $totalRabDisetujui,
            'persentase_sudah_disetujui' => $totalRabDiajukan ? round(($totalRabDisetujui / $totalRabDiajukan) * 100, 2) : 0.0,
        ];
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
                if ($currentMonth < $targetMonth)
                    $year--;
                return strtolower($month) . ' ' . $year;
            })->toArray();
        $monthsInNextYear = collect($monthsInNextYear)
            ->map(function ($month) use ($currentMonth, $targetMonth, $year) {
                if ($currentMonth >= $targetMonth)
                    $year++;
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
                    ->each(fn($item) => intval($item))
                    ->sum();
                $ppuf_month[$key]['approved_budget'] += collect($ppuf->submissions)
                    ->pluck('approved_budget')
                    ->map(fn($item) => intval($item))
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
        $totalRab = $rkat->pluck('budget')->map(fn($item) => intval($item))->sum();
        $totalPengajuan = $rkat->sum(fn($rkat) => $rkat->submissions->count());
        $totalRabDiajukan = $rkat->flatMap(fn($rkat) => $rkat->submissions)->pluck('budget')->each(fn($item) => intval($item))->sum();
        $totalRabDisetujui = $rkat->flatMap(fn($rkat) => $rkat->submissions)->pluck('approved_budget')->map(fn($item) => intval($item))->sum();

        $totalRoleMengajukan = User::whereHas('role', function ($query) use ($subdivisionIds) {
            $query
                ->whereIn('id', $subdivisionIds)
                ->whereHas('ppuf.submissions');
        })->count();

        $totalRkat = $totalRkat ?? 0;
        $totalRab = $totalRab ?? 0;
        $totalPengajuan = $totalPengajuan ?? 0;
        $totalRabDiajukan = $totalRabDiajukan ?? 0;
        $totalRabDisetujui = $totalRabDisetujui ?? 0;
        $totalRoleMengajukan = $totalRoleMengajukan ?? 0;

        $output = [
            'total_rkat' => $totalRkat,
            'total_rab' => $totalRab,
            'total_user_mengajukan' => $totalRoleMengajukan,
            'total_pengajuan' => $totalPengajuan,
            'persentase_pengajuan' => 0.0,
            'total_rab_diajukan' => $totalRabDiajukan,
            'persentase_rab_diajukan' => 0.0,
            'total_rab_disetujui' => $totalRabDisetujui,
            'persentase_sudah_disetujui' => 0.0,
        ];

        if ($totalRkat != 0) {
            $output['persentase_pengajuan'] = round(($totalPengajuan / $totalRkat) * 100, 2);
        }

        if ($totalRab != 0) {
            $output['persentase_rab_diajukan'] = round(($totalRabDiajukan / $totalRab) * 100, 2);
        }

        if ($totalRabDiajukan != 0) {
            $output['persentase_sudah_disetujui'] = round(($totalRabDisetujui / $totalRabDiajukan) * 100, 2);
        }

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

    // public function dashboard()
    // {
    //     $user = Auth::user();
    //     $admin = $user->superAdmin() || $user->wr2();
    //     if (!$admin) {
    //         return redirect()->route('user.dashboard');
    //     }

    //     $monthsInThisYear = ['maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
    //     $monthsInNextYear = ['januari', 'februari'];
    //     $ppuf_month = [];

    //     $currentMonth = date('n');
    //     $targetMonth = 3;
    //     $year = date('Y');
    //     $monthsInThisYear = collect($monthsInThisYear)
    //         ->map(function ($month) use ($currentMonth, $targetMonth, $year) {
    //             if ($currentMonth < $targetMonth)
    //                 $year--;
    //             return strtolower($month) . ' ' . $year;
    //         })->toArray();
    //     $monthsInNextYear = collect($monthsInNextYear)
    //         ->map(function ($month) use ($currentMonth, $targetMonth, $year) {
    //             if ($currentMonth >= $targetMonth)
    //                 $year++;
    //             return strtolower($month) . ' ' . $year;
    //         })->toArray();
    //     $monthsCollection = collect(array_merge($monthsInThisYear, $monthsInNextYear));

    //     $monthsCollection->each(function ($month) use (&$ppuf_month) {
    //         $ppuf_month[$month] = [
    //             'count' => 0,
    //             'budget' => 0,
    //             'submissions' => 0,
    //             'submissions_budget' => 0,
    //             'approved_budget' => 0,
    //             'data' => []
    //         ];
    //     });

    //     $ppufs = Ppuf::whereIn('period', [date('Y'), date('Y') + 1])
    //         ->orderByRaw("FIELD(`date`, '" . $monthsCollection->implode("','") . "')")
    //         ->get();

    //     $ppufs->each(function (Ppuf $ppuf) use (&$ppuf_month) {
    //         $key = strtolower($ppuf->date) . ' ' . $ppuf->period;
    //         if (array_key_exists($key, $ppuf_month)) {
    //             $ppuf_month[$key]['count']++;
    //             $ppuf_month[$key]['budget'] += intval($ppuf->budget);
    //             $ppuf_month[$key]['submissions'] += count($ppuf->submissions);
    //             $ppuf_month[$key]['submissions_budget'] += collect($ppuf->submissions)
    //                 ->pluck('budget')
    //                 ->each(fn($item) => intval($item))
    //                 ->sum();
    //             $ppuf_month[$key]['approved_budget'] += collect($ppuf->submissions)
    //                 ->pluck('approved_budget')
    //                 ->map(fn($item) => intval($item))
    //                 ->sum();
    //             $ppuf_month[$key]['data'][] = [
    //                 'budget' => intval($ppuf->budget)
    //             ];
    //         }
    //     });

    //     $chart = [];
    //     foreach ($ppuf_month as $key => $value) {
    //         $chart[] = [
    //             'bulan' => $key,
    //             'budget' => $value['approved_budget']
    //         ];
    //     }
    //     $bulanChart = collect($chart)->pluck("bulan")->all();
    //     $budgetChart = collect($chart)->pluck("budget")->all();

    //     $user = User::query()
    //         ->whereHas('role', fn(Builder $query) => $query->whereHas('ppuf'))
    //         ->get();

    //     $rkat = Ppuf::query()
    //         ->with('submissions')
    //         ->where('period', date('Y'))
    //         ->orWhere('period', date('Y') + 1)
    //         ->get();

    //     $totalRkat = $rkat->count();
    //     $totalRab = $rkat->pluck('budget')->map(fn($item) => intval($item))->sum();
    //     $totalPengajuan = $rkat->sum(fn($rkat) => $rkat->submissions->count());
    //     $totalRabDiajukan = $rkat->flatMap(fn($rkat) => $rkat->submissions)->pluck('budget')->each(fn($item) => intval($item))->sum();
    //     $totalRabDisetujui = $rkat->flatMap(fn($rkat) => $rkat->submissions)->pluck('approved_budget')->map(fn($item) => intval($item))->sum();

    //     $totalRoleMengajukan = User::whereHas('role', fn($query) => $query->whereHas('ppuf.submissions'))->count();

    //     $totalRkat = $totalRkat ?? 0;
    //     $totalRab = $totalRab ?? 0;
    //     $totalPengajuan = $totalPengajuan ?? 0;
    //     $totalRabDiajukan = $totalRabDiajukan ?? 0;
    //     $totalRabDisetujui = $totalRabDisetujui ?? 0;
    //     $totalRoleMengajukan = $totalRoleMengajukan ?? 0;

    //     $output = [
    //         'total_rkat' => $totalRkat,
    //         'total_rab' => $totalRab,
    //         'total_user_mengajukan' => $totalRoleMengajukan,
    //         'total_pengajuan' => $totalPengajuan,
    //         'persentase_pengajuan' => 0.0,
    //         'total_rab_diajukan' => $totalRabDiajukan,
    //         'persentase_rab_diajukan' => 0.0,
    //         'total_rab_disetujui' => $totalRabDisetujui,
    //         'persentase_sudah_disetujui' => 0.0,
    //     ];

    //     if ($totalRkat != 0) {
    //         $output['persentase_pengajuan'] = round(($totalPengajuan / $totalRkat) * 100, 2);
    //     }

    //     if ($totalRab != 0) {
    //         $output['persentase_rab_diajukan'] = round(($totalRabDiajukan / $totalRab) * 100, 2);
    //     }

    //     if ($totalRabDiajukan != 0) {
    //         $output['persentase_sudah_disetujui'] = round(($totalRabDisetujui / $totalRabDiajukan) * 100, 2);
    //     }

    //     return view('home', compact('output', 'user', 'ppuf_month', 'bulanChart', 'budgetChart'));
    // }
}
