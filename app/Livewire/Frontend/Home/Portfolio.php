<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Project;
use Livewire\Component;

class Portfolio extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.portfolio', [
            'projects' => Project::with('client')
                ->where('status', true) // Only show active projects
                ->orderBy('sort_order', 'asc')
                ->latest()
                ->take(4)
                ->get()
        ]);
    }
}
