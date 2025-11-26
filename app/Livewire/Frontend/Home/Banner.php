<?php

namespace App\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\HeroBanner;

class Banner extends Component
{
    public function render()
    {
        // Fetch only the hero section data
        $hero = HeroBanner::first();

        return view('livewire.frontend.home.banner', [
            'hero' => $hero
        ]);
    }
}
