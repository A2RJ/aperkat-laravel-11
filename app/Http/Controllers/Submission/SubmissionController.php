<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Models\Ppuf;
use App\Models\Submission;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

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
        $ppufs = Ppuf::query()->get(['id', 'program_name', 'ppuf_number', 'budget', 'activity_type']);
        $ikus = Ppuf::iku();
        $activity_dates = Ppuf::$activity_dates;
        return view('submission.create', compact('ppufs', 'ikus', 'activity_dates'));
    }

    public function store(Request $request)
    {
        $form = $request->safe()->only(['']);
        Submission::create($form);
        return redirect()->route('submission.index')->with('success', 'Berhasil menambahkan pengajuan');
    }

    public function show(Submission $submission)
    {
        return view('submission.detail', compact('submission'));
    }

    public function edit(Submission $submission)
    {
        $ppufs = Ppuf::query()->get(['id', 'program_name']);
        return view('submission.edit', compact('submission', 'ppufs'));
    }

    public function update(Request $request, Submission $submission)
    {
        $form = $request->safe()->only([]);
        $submission->update($form);
        return redirect()->route('submission.index')->with('success', 'Berhasil mengubah pengajuan');
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return redirect()->route('submission.index')->with('success', 'Berhasil menghapus pengajuan');
    }
}
