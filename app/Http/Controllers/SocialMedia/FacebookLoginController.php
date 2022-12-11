<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class FacebookLoginController extends Controller
{
    //

    public function facebook(){
        //Send user request to facebook
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect(){
        //Get oauth request back from facebook to authenticate user
        $user = Socialite::driver('facebook')->user();

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
