<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationExperienceController extends Controller
{
    // education
    public function educationIndex()
    {
        return view('admin.education.index');
    }

    // experience
    public function experienceIndex()
    {
        return view('admin.experience.index');
    }

    // experience section
    public function experienceSectionIndex()
    {
        return view('admin.experience-section.index');
    }
}
