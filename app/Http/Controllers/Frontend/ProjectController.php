<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // project page
    public function index()
    {
        return view('frontend.project.index');
    }

    // project details page
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('frontend.project.show', compact('project'));
    }
}
