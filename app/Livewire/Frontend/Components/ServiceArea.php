<?php

namespace App\Livewire\Frontend\Components;

use Livewire\Component;
use App\Models\Service;

class ServiceArea extends Component
{
    public function render()
    {
        // Fetch active services, sorted by your custom order.
        // We assume you want to show the top 4 services here to match the design.
        $services = Service::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

        return view('livewire.frontend.components.service-area', [
            'services' => $services
        ]);
    }
}
