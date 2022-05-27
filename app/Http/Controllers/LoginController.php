<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::whereEmail($data['email'])->first();

        $token = $user->createToken('myapptoken')->plainTextToken;

        return UserResource::make($user)->additional([
            'token' => $token,
        ]);
    }
}
