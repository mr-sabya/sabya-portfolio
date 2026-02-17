<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // blog page
    public function blog()
    {
        return view('frontend.blog.index');
    }

    // show
    public function show($slug)
    {
        $blog = Post::where('slug', $slug)->firstOrFail();
        return view('frontend.blog.show', compact('blog'));
    }
}
