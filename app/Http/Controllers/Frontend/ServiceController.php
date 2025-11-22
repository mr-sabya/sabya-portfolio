<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // service page
    public function index()
    {
        return view('frontend.service.index');
    }
}
