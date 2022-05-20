<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\IncorrectPasswordException;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = User::whereEmail($credentials['email'])->first();

        if (!Hash::check($credentials['password'], $user->password)) {
            throw new IncorrectPasswordException();
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return LoginResource::make($user)->additional([
            'token' => $token,
        ]);
    }
}
