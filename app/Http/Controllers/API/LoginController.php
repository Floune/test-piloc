<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiUserLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(ApiUserLoginRequest $request) {
        if(Auth::attempt(['email' => $request->input("email"), 'password' => $request->input("password")])){
            $user = Auth::user();
            $payload['token'] =  $user->createToken('apitoker')-> accessToken;
            return response()->json([$payload],200);
        }
        else {
            return response()->json(["message" => "unauthorized"],200);
        }
    }
}
