<?php

namespace App\Http\Controllers\Submission;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Submission;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class SubDivisionController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $role_id = $role->pluck('id');
        $subdivision = Role::flattenAllChildren(function (Builder $builder) use ($role_id) {
            $builder->whereIn('id', $role_id)->get();
        });
        $subdivisionIds = collect($subdivision)->pluck('id')->unique();

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
            ->when($status == 'need approve', function (Builder $query) use ($role_id) {
                $query->whereIn('role_id', $role_id);
            })
            ->paginate();
        return view('submission.sub-divison.index', compact('submissions'));
    }
}
