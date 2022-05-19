<?php

namespace App\Http\Controllers;


class LogoutController extends Controller
{

    public function index()
    {

        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

    }

}
