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
        $submissions = Submission::with('ppuf')
            ->whereHas('ppuf', function ($query) use ($subdivisionIds) {
                $query->whereIn('role_id', $subdivisionIds);
            })
            ->paginate();
        return view('submission.sub-divison.index', compact('submissions'));
    }

    public function filter()
    {
    }

    // filter by done, on proccess, waiting for approve
    // bisa dengan cara check semua status pada statuses
    // upload lpj
    // upload pencairan
    // terima lpj
    // terima banyak data pada wr 2
    // memasukkan nominal yang disetujui oleh wr 2
    // memasukkan pengajuan ke periode pencairan
}
