<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.account.index', [
            'users' => $users
        ]);
    }

    /**
     * @param User $user
     */
    public function show(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('admin.account.edit', [
            'user' => $user
        ]);

    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditUserRequest $request, User $user)
    {
        $user = $user->fill($request->validated())->save();

        if ($user) {
            return redirect()
                ->route('admin.user.index')
                ->with('success', 'User is saved');
        }

        return back()->with('error', 'User is not save');
    }

    public function store(Request $request)
    {
        //
    }
}
