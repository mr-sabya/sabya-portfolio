<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // blog page
    public function blog()
    {
        return view('frontend.blog.index');
    }
}
