<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class GithubLoginController extends Controller
{
    //

    public function github(){
        //Send user request to github
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(){
        //Get oauth request back from github to authenticate user
        $user = Socialite::driver('github')->user();

         if($user->name != null){
            $name = $user->name;
         }else{
            $name = $user->nickname;
         }

        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $name,
            'password' => Hash::make(Str::random(24))
        ]);

        $name = $user->name;
        return view('dashboard')->with('message', $name);
    }

}