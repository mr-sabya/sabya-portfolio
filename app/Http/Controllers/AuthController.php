<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
