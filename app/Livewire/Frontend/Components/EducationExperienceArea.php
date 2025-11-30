<?php

namespace App\Livewire\Frontend\Components;

use App\Models\Education;
use App\Models\Experience;
use App\Models\ExperienceSection;
use Livewire\Component;

class EducationExperienceArea extends Component
{
    public function render()
    {
        return view('livewire.frontend.components.education-experience-area', [
            'educations' => Education::where('status', true)->orderBy('sort_order')->get(),
            'experiences' => Experience::where('status', true)->orderBy('sort_order')->get(),
            'sectionInfo' => ExperienceSection::first()
        ]);
    }
}
