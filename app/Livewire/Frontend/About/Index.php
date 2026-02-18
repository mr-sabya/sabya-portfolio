<?php

namespace App\Livewire\Frontend\About;

use App\Models\AboutInfo;
use App\Models\MissionVision;
use App\Models\CoreValue;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.frontend.about.index', [
            'about' => AboutInfo::first(),
            'missionVisions' => MissionVision::all(),
            'values' => CoreValue::orderBy('order')->get(),
        ]);
    }
}
