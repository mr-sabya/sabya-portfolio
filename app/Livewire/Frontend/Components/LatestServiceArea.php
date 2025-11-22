<?php

namespace App\Livewire\Frontend\Components;

use Livewire\Component;

class LatestServiceArea extends Component
{
    public $pageName;


    public function mount($pageName = '')
    {
        $this->pageName = $pageName;
    }

    public function render()
    {
        return view('livewire.frontend.components.latest-service-area');
    }
}
