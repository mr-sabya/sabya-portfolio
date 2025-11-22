<?php

namespace App\Livewire\Frontend\Components;

use Livewire\Component;

class PricingPlan extends Component
{
    public $className;

    public function mount($className = '')
    {
        $this->className = $className;
    }

    public function render()
    {
        return view('livewire.frontend.components.pricing-plan');
    }
}
