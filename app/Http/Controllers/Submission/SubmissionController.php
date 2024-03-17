<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\SubmissionRequest;
use App\Models\Ppuf;
use App\Models\Role;
use App\Models\Submission;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class SubmissionController extends Controller
{
    public function index()
    {
        $keyword = request('keyword', NULL);
        $submissions = Submission::query()
            ->when($keyword, function (Builder $builder) {
                $builder->whereAny(
                    ['id'],
                    ''
                );
            })
            ->paginate();
        return view('submission.index', compact('submissions'));
    }

    public function create()
    {
        $role_id = Auth::id();
        $status = Role::query()->where('user_id', $role_id)->whereHas('parent')->first();
        if (!$status) {
            return redirect()->route('submission.index')->with('failed', 'Anda tidak memiliki struktur organisasi, segera hubungi admin.');
        }
        $ppufs = Ppuf::query()->get(['id', 'program_name', 'ppuf_number', 'budget', 'activity_type']);
        $ikus = Ppuf::iku();
        $activity_dates = Ppuf::$activity_dates;
        return view('submission.create', compact('ppufs', 'ikus', 'activity_dates'));
    }

    public function store(SubmissionRequest $request)
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
            'budget',
            'vendor',
        ]);
        $ppuf = Ppuf::query()->find($request->ppuf_id)->first();
        $form = array_merge($form, ['role_id' => $ppuf->author->parent->id]);
        $submission = Submission::create($form);
        $submission->status()->create([
            'role_id' => $ppuf->role_id,
            'status' => true,
            'message' => 'Telah diajukan',
        ]);
        return redirect()->route('submission.index')->with('success', 'Berhasil menambahkan pengajuan');
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
        return view('submission.detail', compact('submission', 'statuses'));
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
            'budget',
            'vendor',
        ]);
        $submission->update($form);
        return redirect()->route('submission.index')->with('success', 'Berhasil mengubah pengajuan');
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submission.index')->with('success', 'Berhasil menghapus pengajuan');
    }
}
