<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\SubmissionRequest;
use App\Mail\SendStatus;
use App\Models\Ppuf;
use App\Models\Role;
use App\Models\Submission;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Mail;

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
                        'date',
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
                $query->whereNot('role_id', $roleId)->where('is_done', 0);
            })
            ->orderByRaw("CASE 
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'januari' THEN 1
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'februari' THEN 2
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'maret' THEN 3
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'april' THEN 4
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'mei' THEN 5
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'juni' THEN 6
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'juli' THEN 7
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'agustus' THEN 8
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'september' THEN 9
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'oktober' THEN 10
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'november' THEN 11
                WHEN (SELECT date FROM ppufs WHERE ppufs.id = submissions.ppuf_id) = 'desember' THEN 12
                ELSE 99
            END")
            ->paginate();

        return view('submission.index', compact('submissions'));
    }

    public function create()
    {
        $role = Auth::user()->strictRole;
        if (!$role->parent) {
            return redirect()
                ->route('submission.index')
                ->with('failed', 'Anda tidak memiliki struktur organisasi, segera hubungi admin');
        }
        $count = Submission::query()
            ->whereHas('ppuf', function (Builder $query) use ($role) {
                $query->where('role_id', $role->id);
            })
            ->whereNotNull('is_disbursement_complete')
            ->whereNull('is_done')
            ->whereDoesntHave('status', function (Builder $query) {
                $query->where('message', 'LPJ telah disetujui');
            })
            ->count();
        if ($count >= 5) {
            return redirect()
                ->route('submission.index')
                ->with('failed', 'Anda telah meng-upload 5 pengajuan, mohon segera lengkapi LPJ terlebih dahulu');
        }
        $ppufs = Ppuf::query()
            ->where('role_id', $role->id)
            ->whereDoesntHave('submissions')
            ->get();
        $ikus = Ppuf::iku();
        $activity_dates = Ppuf::$activity_dates;
        return view('submission.create', compact('ppufs', 'ikus', 'activity_dates'));
    }

    public function store(SubmissionRequest $request)
    {
        try {
            $role = Auth::user()->strictRole;
            $count = Submission::query()
                ->whereHas('ppuf', function (Builder $query) use ($role) {
                    $query->where('role_id', $role->id);
                })
                ->whereNotNull('is_disbursement_complete')
                ->whereNull('is_done')
                ->whereDoesntHave('status', function (Builder $query) {
                    $query->where('message', 'LPJ telah disetujui');
                })
                ->count();
            if ($count >= 5) {
                return redirect()
                    ->route('submission.index')
                    ->with('failed', 'Anda telah meng-upload 5 pengajuan, mohon segera lengkapi LPJ terlebih dahulu');
            }

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
                'vendor',
            ]);
            $monthMap = [
                'januari' => '01',
                'februari' => '02',
                'maret' => '03',
                'april' => '04',
                'mei' => '05',
                'juni' => '06',
                'juli' => '07',
                'agustus' => '08',
                'september' => '09',
                'oktober' => '10',
                'november' => '11',
                'desember' => '12',
            ];

            $ppuf = Ppuf::query()->where('id', $request->ppuf_id)->first();
            $currentMonth = now()->format('m');
            $ppufMonth = $monthMap[strtolower($ppuf->date)];
            $ppufMonth = Carbon::createFromFormat('m', $ppufMonth)->format('m');

            if ($currentMonth !== $ppufMonth) {
                return redirect()
                    ->route('submission.create')
                    ->with('failed', 'Pengajuan tidak dapat dilakukan karena telah melewati waktu pelaksanaan')
                    ->withInput();
            }

            $total = collect($request->rab)->sum(function ($item) {
                return $item['qty'] * $item['harga_satuan'];
            });
            $total = preg_replace("/[^0-9]/", "", $total);
            $rab = preg_replace("/[^0-9]/", "", $ppuf->budget);

            if ($total > $rab) {
                return redirect()
                    ->route('submission.create')
                    ->with('failed', 'Jumlah RAB melebihi RAB pada PPUF ' . $ppuf->ppuf_number . ' yakni ' . $ppuf->budget_idr)
                    ->withInput();
            }

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
                $message = 'Telah diajukan';
                $submission->status()->create([
                    'role_id' => $ppuf->role_id,
                    'status' => true,
                    'message' => $message,
                ]);

                $ppuf = $submission->ppuf;
                if ($ppuf->author->user) {
                    $message = $ppuf->author->role . ": $message";
                    $role = $ppuf->author->role;
                    $subject = "Pengajuan $role dengan nomor RKAT $ppuf->ppuf_number";
                    // Mail::to($ppuf->author->user->email)->send(new SendStatus($subject, $message));
                }
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
        $statuses = collect($status)->filter(fn($item) => $item['id'] != 1)->map(function ($status) use ($statuses) {
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

        if ($statusesCount > 0) {
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
        $ikus = Ppuf::iku();
        $activity_dates = Ppuf::$activity_dates;
        return view('submission.edit', compact('submission', 'ikus', 'activity_dates'));
    }

    public function update(SubmissionRequest $request, Submission $submission)
    {
        $form = $request->safe()->only([
            'iku1_id',
            'iku2_id',
            'iku3_id',
            'background',
            'speaker',
            'participant',
            'rundown',
            'place',
            'vendor',
        ]);
        $total = collect($request->rab)->sum(function ($item) {
            return $item['qty'] * $item['harga_satuan'];
        });
        $total = preg_replace("/[^0-9]/", "", $total);
        $rab = preg_replace("/[^0-9]/", "", $submission->ppuf->budget);

        if ($total > $rab) {
            return redirect()
                ->route('submission.edit', ['submission' => $submission->id])
                ->with('failed', 'Jumlah RAB melebihi RAB pada PPUF ' . $submission->ppuf->ppuf_number . ' sebesar ' . $submission->ppuf->budget)
                ->withInput();
        }

        DB::transaction(function () use ($submission, $total, $request, $form) {
            $submission->update(
                array_merge(
                    $form,
                    ['budget' => $total, 'budget_detail' => $request->rab]
                )
            );
            $message = 'Telah direvisi';
            $submission->status()->create([
                'role_id' => $submission->ppuf->role_id,
                'status' => true,
                'message' => $message,
            ]);

            $ppuf = $submission->ppuf;
            if ($ppuf->author->user) {
                $message = $ppuf->author->role . ": $message";
                $role = $ppuf->author->role;
                $subject = "Pengajuan $role dengan nomor RKAT $ppuf->ppuf_number";
                // Mail::to($ppuf->author->user->email)->send(new SendStatus($subject, $message));
            }
        });
        return redirect()->route('submission.index')->with('success', 'Berhasil mengubah pengajuan');
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submission.index')->with('success', 'Berhasil menghapus pengajuan');
    }
}
