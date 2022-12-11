<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
    //

    public function google(){
        //Send user request to google
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(){
        //Get oauth request back from google to authenticate user
        $user = Socialite::driver('google')->user();
        // dd($user);

        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);

        $name = $user->name;
        return view('dashboard')->with('message', $name);
    }

}