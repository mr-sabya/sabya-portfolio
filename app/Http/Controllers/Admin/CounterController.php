<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    // 
    public function index()
    {
        return view('admin.counters.index');
    }

    // counter section
    public function counterSection()
    {
        return view('admin.counter-section.index');
    }
}
