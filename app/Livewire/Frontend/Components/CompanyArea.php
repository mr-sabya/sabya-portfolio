<?php

namespace App\Livewire\Frontend\Components;

use App\Models\Partner;
use Livewire\Component;

class CompanyArea extends Component
{
    public function render()
    {
        // Fetch active partners ordered by sort_order
        $partners = Partner::where('status', 1) // Assuming 1 means active
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('livewire.frontend.components.company-area', [
            'partners' => $partners
        ]);
    }
}
