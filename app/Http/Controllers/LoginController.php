<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = User::whereEmail($credentials->email)->first();

        if (!Hash::check($credentials->password, $user->password)) {
            return response([
                'message' => 'Invalid password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return LoginResource::make($user, $token);
    }
}
