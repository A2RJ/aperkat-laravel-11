<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\UploadDisbursementRequest;
use App\Models\Disbursement;
use App\Models\Submission;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;

class DisbursementController extends Controller
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
        return view('submission.direktur-keuangan-pencairan.index', compact('submissions', 'roleId'));
    }

    public function show(Disbursement $pencairan)
    {
        return response()->download(storage_path('app/public/' . $pencairan->filename));
    }
    public function store(UploadDisbursementRequest $request)
    {
        try {
            $name = now()->timestamp . "." . $request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('files', $name, 'public');
            $role = Auth::user()->strictRole;
            $submission = Submission::query()->where('id', $request->submission_id)->first();

            DB::transaction(function () use ($submission, $request, $path, $role) {
                $submission->disbursements()->create([
                    'budget' => $request->budget,
                    'filename' => $path
                ]);

                $submission->status()->create([
                    'role_id' => $role->id,
                    'status' => false,
                    'message' => 'Telah dilakukan pencairan dengan nominal ' . $request->budget,
                ]);
            });

            return redirect()->back()->with('success', 'Berhasil upload pencairan');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Gagal upload pencairan file!');
        }
    }

    public function update(Disbursement $pencairan)
    {
        try {
            $role = Auth::user()->strictRole;
            $submission = Submission::query()->where('id', $pencairan->submission_id)->first();

            DB::transaction(function () use ($submission, $role) {
                $submission->update([
                    'role_id' => $role->parent->id,
                    'is_disbursement_complete' => true
                ]);

                $submission->status()->create([
                    'role_id' => $role->id,
                    'status' => true,
                    'message' => 'Pencairan selesai, mohon segera upload LPJ kegiatan pada form aksi',
                ]);
            });

            return redirect()->back()->with('success', 'Berhasil upload pencairan');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Gagal upload pencairan file!');
        }
    }

    public function destroy(Disbursement $pencairan)
    {
        $pencairan->delete();
        return redirect()->back()->with('success', 'Berhasil hapus file pencairan');
    }
}
