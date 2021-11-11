<?php

namespace App\Service;

use App\Contracts\Social;
use App\Http\Controllers\SocialController;
use App\Jobs\SendEmailWithPassword;
use App\Models\User as Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
    use DispatchesJobs;

    public function loginUser(User $user): string
    {
        $auth = Model::where('email', $user->getEmail())->first();
        if ($auth) {
            $auth->name = $user->getName();
            $auth->avatar = $user->getAvatar();
            if ($auth->save()) {
                \Auth::loginUsingId($auth->id);
                return route('account');
            }
        } else {
            $user = \App\Models\User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getNickname()),
            ]);
            $this->dispatch(new SendEmailWithPassword($user));

            return route('account');
        }

        throw new \Exception("User not found");
    }

}