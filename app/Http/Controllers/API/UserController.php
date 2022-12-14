<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserListRequest;
use App\Http\Requests\UserLoadRequest;
use App\Models\User;
use http\Env\Request;

class UserController extends Controller
{
    public function update(UserEditRequest $request) {
        $user = User::findOrfail($request->input("id"));
        $user->firstname = $request->input("firstname");
        $user->lastname = $request->input("lastname");
        $user->email = $request->input("email");
        $user->save();
        return response()->json(['message'=>"User updated"],200);
    }

    public function delete(UserDeleteRequest $request) {
        User::destroy($request->id);
        return response()->json(['message'=>"User deleted"],200);
    }

    public function load(UserLoadRequest $request) {
        $user = User::findOrFail($request->id);
        $payload = $user->toArray();
        $payload["properties_count"] = $user->count;
        return response()->json($payload,200);
    }

    public function index(UserListRequest $request) {
        $payload = User::all()->toArray();
        return response()->json($payload,200);
    }

}
