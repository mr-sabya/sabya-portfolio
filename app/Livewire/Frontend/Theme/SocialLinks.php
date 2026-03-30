<?php

namespace App\Livewire\Frontend\Theme;

use Livewire\Component;

class SocialLinks extends Component
{
    public $className;

    public function mount($className = '')
    {
        $this->className = $className;
    }

    public function render()
    {
        return view('livewire.frontend.theme.social-links');
    }
}
