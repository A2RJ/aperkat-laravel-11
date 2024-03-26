<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\SubmissionRequest;
use App\Models\Ppuf;
use App\Models\Role;
use App\Models\Submission;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;

class SubmissionController extends Controller
{
    public function index()
    {
        $keyword = request('keyword', NULL);
        $start = request('start', NULL);
        $end = request('end', NULL);
        $status = request('status', NULL);

        $roleId = Auth::user()->strictRole->id;
        
        $submissions = Submission::query()
            ->whereHas('ppuf', function ($query) use ($roleId) {
                $query->where('role_id', $roleId);
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
                $query->whereNot('role_id',  $roleId)->where('is_done', 0);
            })
            ->paginate();
        return view('submission.index', compact('submissions'));
    }

    public function create()
    {
        $user = Auth::user()->strictRole;
        if (!$user->parent) {
            return redirect()
                ->route('submission.index')
                ->with('failed', 'Anda tidak memiliki struktur organisasi, segera hubungi admin');
        }
        $ppufs = Ppuf::query()
            ->where('role_id', $user->id)
            ->select(['id', 'program_name', 'ppuf_number', 'budget', 'activity_type'])
            ->get();
        $ikus = Ppuf::iku();
        $activity_dates = Ppuf::$activity_dates;
        return view('submission.create', compact('ppufs', 'ikus', 'activity_dates'));
    }

    public function store(SubmissionRequest $request)
    {
        try {
            $form = $request->safe()->only([
                'ppuf_id',
                'iku1_id',
                'iku2_id',
                'iku3_id',
                'background',
                'speaker',
                'participant',
                'rundown',
                'place',
                'date',
                'vendor',
            ]);
            $ppuf = Ppuf::query()->where('id', $request->ppuf_id)->first();
            $total = collect($request->rab)->sum(function ($item) {
                return $item['qty'] * $item['harga_satuan'];
            });
            $form = array_merge(
                $form,
                [
                    'budget' => $total,
                    'budget_detail' => $request->rab,
                    'role_id' => $ppuf->author->parent->id,
                ]
            );
            DB::transaction(function () use ($form, $ppuf) {
                $submission = Submission::create($form);
                $submission->status()->create([
                    'role_id' => $ppuf->role_id,
                    'status' => true,
                    'message' => 'Telah diajukan',
                ]);
            });
            return redirect()->route('submission.index')->with('success', 'Berhasil menambahkan pengajuan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Submission $submission)
    {
        $role_id = $submission->ppuf->role_id;
        $statuses = $submission->status;
        $status = Role::flattenAllParents(function (Builder $builder) use ($role_id) {
            $builder->where('id', $role_id)->get();
        });
        $statuses = collect($status)->filter(fn ($item) => $item['id'] != 1)->map(function ($status) use ($statuses) {
            $item = collect($statuses)->filter(function ($item) use ($status) {
                return $item['role_id'] == $status['id'];
            })->last();
            $status['status'] = $item;
            return $status;
        });

        $approve = false;

        $user = Auth::user();
        $author = $role_id == $user->strictRole->id;
        $statusesCount = count($statuses);

        if ($user && $statusesCount > 0) {
            $filteredIndex = $statuses->search(function ($item) use ($user) {
                return isset($item['user_id']) && $item['user_id'] === $user->id;
            });

            if ($filteredIndex !== false) {
                $currentStatusExists = $filteredIndex >= 0 && isset($statuses[$filteredIndex]['status']);
                $currentStatusFalse = !$currentStatusExists || !$statuses[$filteredIndex]['status']['status'];

                if ($currentStatusFalse) {
                    if ($user->strictRole && $user->strictRole->children->isNotEmpty()) {
                        $previousStatusIndex = $filteredIndex - 1;

                        $previousStatusValid = $previousStatusIndex >= 0 &&
                            isset($statuses[$previousStatusIndex]['status']['status']) &&
                            $statuses[$previousStatusIndex]['status']['status'];

                        if (
                            !$user->dirKeuangan() &&
                            !$user->wr2() &&
                            !$user->dirKeuanganLpj() &&
                            !$user->dirKeuanganPencairan() &&
                            $previousStatusValid
                        ) {
                            $approve = true;
                        }
                    }
                }
            }
        }

        return view('submission.detail', compact('submission', 'statuses', 'approve', 'author'));
    }

    public function edit(Submission $submission)
    {
        $ppufs = Ppuf::query()->get(['id', 'program_name', 'ppuf_number', 'budget', 'activity_type']);
        $ikus = Ppuf::iku();
        $activity_dates = Ppuf::$activity_dates;
        return view('submission.edit', compact('submission', 'ppufs', 'ikus', 'activity_dates'));
    }

    public function update(SubmissionRequest $request, Submission $submission)
    {
        $form = $request->safe()->only([
            'ppuf_id',
            'iku1_id',
            'iku2_id',
            'iku3_id',
            'background',
            'speaker',
            'participant',
            'rundown',
            'place',
            'date',
            'vendor',
        ]);
        $total = collect($request->rab)->sum(function ($item) {
            return $item['qty'] * $item['harga_satuan'];
        });
        $submission->update(
            array_merge($form, ['budget' => $total, 'budget_detail' => $request->rab])
        );
        return redirect()->route('submission.index')->with('success', 'Berhasil mengubah pengajuan');
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submission.index')->with('success', 'Berhasil menghapus pengajuan');
    }
}
