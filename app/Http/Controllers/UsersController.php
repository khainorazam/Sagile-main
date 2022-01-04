<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            //After successful authentication, notice how I return json parameters
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user
            ]);
        } else{
            //if authentication is unsuccessful, notice how I return json parameters
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.',
            ],401);
        }
    }
}
