<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // about page
    public function index()
    {
        return view('frontend.about.index');
    }
}
