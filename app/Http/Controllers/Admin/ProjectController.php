<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        return view('admin.projects.index');
    }

    // create
    public function create()
    {
        return view('admin.projects.create');
    }

    // edit
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', ['project' => $project]);
    }
}
