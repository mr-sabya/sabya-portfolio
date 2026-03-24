<?php

namespace App\Livewire\Frontend\Component;

use App\Models\Project;
use Livewire\Component;

class PortfolioCard extends Component
{
    public $project;
    public $index;

    public function mount($id, $index = 1)
    {
        // Fetch the project by ID
        $this->project = Project::findOrFail($id);

        // Index is used for the animation-order class
        $this->index = $index;
    }

    public function render()
    {
        return view('livewire.frontend.component.portfolio-card');
    }
}
