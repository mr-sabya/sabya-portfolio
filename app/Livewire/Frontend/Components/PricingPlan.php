<?php

namespace App\Livewire\Frontend\Components;

use App\Models\PricingPlan as ModelsPricingPlan;
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
        return view('livewire.frontend.components.pricing-plan', [
            'plans' => ModelsPricingPlan::where('status', true)
                ->orderBy('sort_order', 'asc')
                ->get()
        ]);
    }
}
