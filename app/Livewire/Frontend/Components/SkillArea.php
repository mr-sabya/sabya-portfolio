<?php

namespace App\Livewire\Frontend\Components;

use App\Models\SkillCategory;
use Livewire\Component;

class SkillArea extends Component
{
    public $className;

    public function mount($className = '')
    {
        $this->className = $className;
    }


    public function render()
    {
        // Fetch categories that are active, and eagerly load their active skills
        $skillCategories = SkillCategory::where('status', true)
            ->with(['skills' => function ($query) {
                $query->where('status', true)->orderBy('sort_order', 'asc');
            }])
            ->orderBy('sort_order', 'asc')
            ->get();
        return view('livewire.frontend.components.skill-area', compact('skillCategories'));
    }
}
