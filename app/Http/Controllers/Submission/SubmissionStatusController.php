<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Models\SubmissionStatus;
use Illuminate\Http\Request;

class SubmissionStatusController extends Controller
{
    public function store(Request $request)
    {
        //
    }

    public function destroy(SubmissionStatus $submissionStatus)
    {
        // undo last change status
    }
}
