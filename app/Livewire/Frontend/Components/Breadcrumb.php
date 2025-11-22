<?php

namespace App\Livewire\Frontend\Components;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $pageTitle;
    public $pageSubTitle;

    public function mount($pageTitle = '', $pageSubTitle = '')
    {
        $this->pageTitle = $pageTitle;
        $this->pageSubTitle = $pageSubTitle;
    }
    
    public function render()
    {
        return view('livewire.frontend.components.breadcrumb');
    }
}
