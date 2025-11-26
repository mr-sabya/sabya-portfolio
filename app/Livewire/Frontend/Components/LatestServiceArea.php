<?php

namespace App\Livewire\Frontend\Components;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceSection;

class LatestServiceArea extends Component
{
    public $pageName;

    public function mount($pageName = '')
    {
        $this->pageName = $pageName;
    }

    public function render()
    {
        // 1. Fetch Section Header Info (Title, Description, Big Image)
        $sectionInfo = ServiceSection::first();

        // 2. Prepare Service Query
        $query = Service::where('status', true)->orderBy('sort_order', 'asc');

        // 3. Conditional Fetching
        if ($this->pageName === 'home') {
            // On Home page, we only show the top 3 items
            $services = $query->take(3)->get();
        } else {
            // On Service page, we show all items (or you could paginate)
            $services = $query->get();
        }

        return view('livewire.frontend.components.latest-service-area', [
            'sectionInfo' => $sectionInfo,
            'services'    => $services
        ]);
    }
}
