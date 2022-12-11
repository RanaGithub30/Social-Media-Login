<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginApiController extends Controller
{
    //

    public function user_login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        $user_check = User::whereEmail($request->email)->first();

        if($user_check != null){
            $accessToken = $user_check->createToken('authToken')->accessToken;
            return response(['user' => $user_check, 'access_token' => $accessToken]);
        }else{
            return response(['message' => 'Invalid Credentials']);
        }
        
    }
}