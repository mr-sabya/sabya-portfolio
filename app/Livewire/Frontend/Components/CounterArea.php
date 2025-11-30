<?php

namespace App\Livewire\Frontend\Components;

use Livewire\Component;
use App\Models\CounterSection;
use App\Models\Counter;

class CounterArea extends Component
{
    public function render()
    {
        // Fetch Section Info
        $section = CounterSection::first();

        // Fetch Counters
        $counters = Counter::where('status', true)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        return view('livewire.frontend.components.counter-area', [
            'section' => $section,
            'counters' => $counters
        ]);
    }
}