<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

    public function index()
    {

        Auth::user()->tokens()->delete();

    }

}
