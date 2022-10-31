<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(CreateUserRequest $request){

        $user= User::create([
            'lastname' =>$request->input("lastname"),
            'firstname' =>$request->input("firstname"),
            'email'=>$request->input("email"),
            'password'=>bcrypt($request->input("password"))
        ]);
        $user->assignRole("landlord");

        return response()->json(['message'=>"User created"],200);
    }

    public function register(RegisterRequest $request){
        $user= User::create([
            'lastname' =>$request->input("lastname"),
            'firstname' =>$request->input("firstname"),
            'email'=>$request->input("email"),
            'password'=>bcrypt($request->input("password"))
        ]);
        $user->assignRole("landlord");

        return response()->json([
            'message'=>"Account succesfully created",
            'token' => $user->createToken('apitoker')-> accessToken
        ],200);
    }
}
