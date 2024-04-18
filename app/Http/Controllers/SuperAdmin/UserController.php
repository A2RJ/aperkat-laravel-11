<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $keyword = request('keyword');
        $users = User::query()
            ->when($keyword, function (Builder $query) use ($keyword) {
                $query->whereAny([
                    'name',
                    'email',
                    'whatsapp',
                ], 'LIKE', "%$keyword%");
            })
            ->paginate();
        return view('user.index', compact('users'));
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
