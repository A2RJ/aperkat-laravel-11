<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\DisbursementRequest;
use App\Models\DisbursementPeriod;

class DisbursementPeriodController extends Controller
{
    public function index()
    {
        $periods = DisbursementPeriod::query()->paginate();
        return view('submission.disbursement-period.index', compact('periods'));
    }

    public function store(DisbursementRequest $request)
    {
        DisbursementPeriod::create($request->safe()->only('period'));
        return redirect()->route('disbursement-period.index')->with('success', 'Berhasil menambahkan periode');
    }

    public function update(DisbursementRequest $request, DisbursementPeriod $disbursementPeriod)
    {
        $disbursementPeriod->update($request->safe()->only('period'));
        return redirect()->route('disbursement-period.index')->with('success', 'Berhasil mengubah periode');
    }

    public function destroy(DisbursementPeriod $disbursementPeriod)
    {
        $disbursementPeriod->delete();
        return redirect()->route('disbursement-period.index')->with('success', 'Berhasil menghapus periode');
    }
}
