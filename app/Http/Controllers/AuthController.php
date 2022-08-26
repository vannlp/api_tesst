<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        if(empty($email) || empty($password)) {
            return response()->json(['status' => 'error', 'messages' => 'You must fill all fields']);
        }

        if(!$token = auth()->attempt(['email' => $email, 'password' => $password])) {
            return response()->json('Login erro', 200);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
        
    }
}