<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // profile management page
    public function manage()
    {
        return view('admin.profile.manage');
    }

    // update-password
    public function updatePassword()
    {
        return view('admin.profile.update-password');
    }
}
