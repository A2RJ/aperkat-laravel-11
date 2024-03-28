<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\ActionLpjRequest;
use App\Http\Requests\Submission\PeriodRequest;
use App\Http\Requests\Submission\UploadLpjRequest;
use App\Models\DisbursementPeriod;
use App\Models\Submission;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubDivisionController extends Controller
{
    public function index()
    {
        $keyword = request('keyword', NULL);
        $start = request('start', NULL);
        $end = request('end', NULL);
        $status = request('status', NULL);

        $roleId = Auth::user()->strictRole->id;
        $user = Auth::user();
        $subdivisionIds = collect($user->hasSubDivision())->pluck('id')->toArray();

        $submissions = Submission::with('ppuf')
            ->whereHas('ppuf', function ($query) use ($subdivisionIds) {
                $query->whereIn('role_id', $subdivisionIds);
            })
            ->when($keyword, function (Builder $builder) use ($keyword) {
                $builder->whereHas('ppuf', function (Builder $builder) use ($keyword) {
                    $builder->whereAny([
                        'ppuf_number',
                        'activity_type',
                        'program_name',
                    ], 'LIKE', "%$keyword%");
                })
                    ->orWhereHas('ppuf', function (Builder $builder) use ($keyword) {
                        $builder->whereHas('author', function (Builder $builder) use ($keyword) {
                            $builder->where('role', 'LIKE', "%$keyword%");
                        });
                    });
            })
            ->when($start && !$end, function (Builder $builder) use ($start) {
                $builder->whereDate('created_at', $start);
            })
            ->when($start && $end, function (Builder $builder) use ($start, $end) {
                $builder->whereBetween('created_at', [$start, $end]);
            })
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->when($status == 'need approve', function (Builder $query) use ($roleId) {
            $query->where('role_id', $roleId);
            })
            ->paginate();
        return view('submission.sub-divison.index', compact('submissions'));
    }

    public function dirKeuangan()
    {
        $keyword = request('keyword', NULL);
        $start = request('start', NULL);
        $end = request('end', NULL);
        $status = request('status', NULL);

        $roleId = Auth::user()->strictRole->id;
        $submissions = Submission::with(['ppuf', 'approval'])
            ->when($keyword, function (Builder $builder) use ($keyword) {
                $builder->whereHas('ppuf', function (Builder $builder) use ($keyword) {
                    $builder->whereAny([
                        'ppuf_number',
                        'activity_type',
                        'program_name',
                    ], 'LIKE', "%$keyword%");
                })
                    ->orWhereHas('ppuf', function (Builder $builder) use ($keyword) {
                        $builder->whereHas('author', function (Builder $builder) use ($keyword) {
                            $builder->where('role', 'LIKE', "%$keyword%");
                        });
                    });
            })
            ->when($start && !$end, function (Builder $builder) use ($start) {
                $builder->whereDate('created_at', $start);
            })
            ->when($start && $end, function (Builder $builder) use ($start, $end) {
                $builder->whereBetween('created_at', [$start, $end]);
            })
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->when($status == 'need approve', function (Builder $query) use ($roleId) {
            $query->where('role_id', $roleId)
                    ->whereNull('disbursement_period_id')
                    ->orWhere('role_id', 5)
                    ->whereNull('disbursement_period_id');
            })
            ->paginate();

        $periods = DisbursementPeriod::query()->get(['id', 'period']);
        return view('submission.direktur-keuangan.index', compact('submissions', 'periods', 'roleId'));
    }

    public function period(PeriodRequest $request, Submission $submission)
    {
        try {
            $approvalBudget = preg_replace('/[^0-9]/', '', $request->approved_budget);
            $budget = preg_replace('/[^0-9]/', '', $submission->budget);
            if ($approvalBudget > $budget) {
                return redirect()
                    ->route('submission.dir-keuangan')
                ->with('failed', 'RAB disetujui tidak boleh lebih besar dari RAB diajukan')
                ->withInput();
            }
            $period = DisbursementPeriod::query()->where('id', $request->period_id)->first();
            DB::transaction(function () use ($request, $submission, $period) {
                $submission->update([
                    'approved_budget' => $request->approved_budget,
                    'disbursement_period_id' => $request->period_id,
                    'role_id' => 5
                ]);
                $submission->status()->create([
                    'role_id' => 6,
                    'status' => true,
                    'message' => 'Telah disetujui untuk pencairan ' . $period->period,
                ]);
            });
            return redirect()->route('submission.dir-keuangan')->with('success', 'Berhasil menambahkan pengajuan ke periode tersebut');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function wr2()
    {
        $keyword = request('keyword', NULL);
        $start = request('start', NULL);
        $end = request('end', NULL);
        $status = request('status', NULL);
        $period = request('period', NULL);

        $roleId = Auth::user()->strictRole->id;

        $submissions = Submission::with('ppuf')
            ->when($keyword, function (Builder $builder) use ($keyword) {
                $builder->whereHas('ppuf', function (Builder $builder) use ($keyword) {
                    $builder->whereAny([
                        'ppuf_number',
                        'activity_type',
                        'program_name',
                    ], 'LIKE', "%$keyword%");
                })
                    ->orWhereHas('ppuf', function (Builder $builder) use ($keyword) {
                        $builder->whereHas('author', function (Builder $builder) use ($keyword) {
                            $builder->where('role', 'LIKE', "%$keyword%");
                        });
                    });
            })
            ->when($start && !$end, function (Builder $builder) use ($start) {
                $builder->whereDate('created_at', $start);
            })
            ->when($start && $end, function (Builder $builder) use ($start, $end) {
                $builder->whereBetween('created_at', [$start, $end]);
            })
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->when($status == 'need approve', function (Builder $query) use ($roleId) {
            $query->where('role_id', $roleId);
            })
            ->when($period, function (Builder $query) use ($period) {
                $query->where('disbursement_period_id', $period);
            })
            ->paginate();

        $periods = DisbursementPeriod::query()->get(['id', 'period']);
        return view('submission.wr2.index', compact('submissions', 'periods'));
    }

    public function wr2Approve(DisbursementPeriod $period)
    {
        try {
            $role = Auth::user()->strictRole;
            DB::transaction(function () use ($period, $role) {
                $period->submissions()->where('role_id', '=', $role->id)->each(function ($submission) use ($period, $role) {
                    $submission->update([
                        'role_id' => $role->parent->id,
                    ]);
                    $submission->status()->create([
                        'role_id' => $role->id,
                        'status' => true,
                        'message' => 'Telah disetujui untuk pencairan ' . $period->period,
                    ]);
                });
            });
            return redirect()->route('submission.wr2')->with('success', 'Berhasil menerima pengajuan dengan periode ' . $period->period);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function action(ActionLpjRequest $request, Submission $submission)
    {
        $note = $request->note;
        $action = $request->action;

        $role = Auth::user()->strictRole;
        if ($action == 'revisi') {
            DB::transaction(function () use ($submission, $role, $note) {
                $submission->status()->create([
                    'role_id' => $role->id,
                    'status' => false,
                    'message' => 'Mohon direvisi: ' . $note,
                ]);
            });
            return back()->with('failed', "Berhasil $action pengajuan");
        } elseif ($action == 'terima') {
            DB::transaction(function () use ($submission, $role, $note) {
                $submission->update([
                    'role_id' => $role->parent->id,
                ]);
                $submission->status()->create([
                    'role_id' => $role->id,
                    'status' => true,
                    'message' => 'Telah disetujui: ' . $note,
                ]);
            });
            return back()->with('success', "Berhasil $action pengajuan");
        }
    }

    public function uploadLpj(UploadLpjRequest $request, Submission $submission)
    {
        try {
            $name = now()->timestamp . "." . $request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('lpj', $name, 'public');
            $role = Auth::user()->strictRole;

            DB::transaction(function () use ($submission, $path, $role) {
                $submission->update([
                    'role_id' => 2,
                    'report_file' => $path,
                ]);

                $submission->status()->create([
                    'role_id' => $role->id,
                    'status' => true,
                    'message' => 'LPJ Kegiatan telah diupload',
                ]);
            });

            return redirect()->back()->with('success', 'Berhasil upload pencairan');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Gagal upload LPJ kegiatan file');
        }
    }

    public function adminLpj()
    {
        $keyword = request('keyword', NULL);
        $start = request('start', NULL);
        $end = request('end', NULL);
        $status = request('status', NULL);

        $roleId = Auth::user()->strictRole->id;
        $user = Auth::user();
        $subdivisionIds = collect($user->hasSubDivision())->pluck('id')->toArray();
        $submissions = Submission::with('ppuf')
            ->whereHas('ppuf', function ($query) use ($subdivisionIds) {
                $query->whereIn('role_id', $subdivisionIds);
            })
            ->when($keyword, function (Builder $builder) use ($keyword) {
                $builder->whereHas('ppuf', function (Builder $builder) use ($keyword) {
                    $builder->whereAny([
                        'ppuf_number',
                        'activity_type',
                        'program_name',
                    ], 'LIKE', "%$keyword%");
                })
                    ->orWhereHas('ppuf', function (Builder $builder) use ($keyword) {
                        $builder->whereHas('author', function (Builder $builder) use ($keyword) {
                            $builder->where('role', 'LIKE', "%$keyword%");
                        });
                    });
            })
            ->when($start && !$end, function (Builder $builder) use ($start) {
                $builder->whereDate('created_at', $start);
            })
            ->when($start && $end, function (Builder $builder) use ($start, $end) {
                $builder->whereBetween('created_at', [$start, $end]);
            })
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->when($status == 'need approve', function (Builder $query) use ($roleId) {
                $query->where('role_id', $roleId);
            })
            ->paginate();

        return view('submission.direktur-keuangan-lpj.index', compact('submissions', 'roleId'));
    }

    public function actionLpj(ActionLpjRequest $request, Submission $submission)
    {
        $note = $request->note;
        $action = $request->action;

        $role = Auth::user()->strictRole;
        if ($action == 'revisi') {
            DB::transaction(function () use ($submission, $role, $note) {
                $submission->status()->create([
                    'role_id' => $role->id,
                    'status' => false,
                    'message' => 'Mohon direvisi: ' . $note,
                ]);
            });
            return back()->with('failed', "Berhasil meminta untuk revisi pengajuan");
        } elseif ($action == 'terima') {

            DB::transaction(function () use ($submission,  $role) {
                $submission->update([
                    'role_id' => $role->parent->id,
                    'is_done' => true,
                ]);

                $submission->status()->create([
                    'role_id' => $role->id,
                    'status' => true,
                    'message' => 'LPJ Kegiatan telah disetujui',
                ]);
            });

            return back()->with('success', 'Berhasil terima LPJ kegiatan');
        }
    }

    public function downloadLpj(Submission $submission)
    {
        return response()->download(storage_path('app/public/' . $submission->report_file));
    }
}
