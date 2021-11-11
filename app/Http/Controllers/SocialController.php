<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function link()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback(Social $social)
    {
        try {
            return redirect(

                $social->loginUser(
                    Socialite::driver('github')->user()
                )
            );
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());
            dd($e->getMessage());
        }
    }

    public function createUser(User $user)
    {
        dd($user);
        return view('auth.github', [
            'name' => $user->name,
        ]);
    }

}
