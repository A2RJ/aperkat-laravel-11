<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\PeriodRequest;
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
        $roleId = Auth::user()->allRoleId();
        $user = Auth::user();
        $subdivisionIds = collect($user->hasSubDivision())->pluck('id')->toArray();
        $status = request('status', NULL);
        $submissions = Submission::with('ppuf')
            ->whereHas('ppuf', function ($query) use ($subdivisionIds) {
                $query->whereIn('role_id', $subdivisionIds);
            })
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->when($status == 'need approve', function (Builder $query) use ($roleId) {
                $query->whereIn('role_id', $roleId);
            })
            ->paginate();
        return view('submission.sub-divison.index', compact('submissions'));
    }

    public function dirKeuangan()
    {
        $roleId = Auth::user()->allRoleId();
        $status = request('status', NULL);
        // return [$status == 'need approve', $status];
        $submissions = Submission::with('ppuf')
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->when($status == 'need approve', function (Builder $query) use ($roleId) {
                $query->whereIn('role_id', $roleId)
                    ->whereNull('disbursement_period_id')
                    ->orWhere('role_id', 5)
                    ->whereNull('disbursement_period_id');
            })
            ->paginate();
        $periods = DisbursementPeriod::query()->get(['id', 'period']);
        return view('submission.direktur-keuangan.index', compact('submissions', 'periods'));
    }

    public function period(PeriodRequest $request, Submission $submission)
    {
        try {
            $approvalBudget = preg_replace('/[^0-9]/', '', $request->approved_budget);
            $budget = preg_replace('/[^0-9]/', '', $submission->budget);
            if ($approvalBudget > $budget) {
                return redirect()
                    ->route('submission.dir-keuangan')
                    ->with('failed', 'RAB disetujui tidak boleh lebih besar dari RAB diajukan');
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
        $roleId = Auth::user()->allRoleId();
        $status = request('status', NULL);
        $period = request('period', NULL);
        $submissions = Submission::with('ppuf')
            ->when($status == 'done', function (Builder $query) {
                $query->where('is_done', 1);
            })
            ->when($status == 'progress', function (Builder $query) {
                $query->where('is_done', 0);
            })
            ->when($status == 'need approve', function (Builder $query) use ($roleId) {
                $query->whereIn('role_id', $roleId)
                    ->whereNotNull('disbursement_period_id');
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
                $period->submissions()->each(function ($submission) use ($period, $role) {
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

    public function action(Request $request, Submission $submission)
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
}
