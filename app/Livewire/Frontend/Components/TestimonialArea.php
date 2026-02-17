<?php

namespace App\Livewire\Frontend\Components;

use App\Models\Testimonial;
use Livewire\Component;

class TestimonialArea extends Component
{
    public function render()
    {
        $testimonials = Testimonial::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('livewire.frontend.components.testimonial-area', [
            'testimonials' => $testimonials
        ]);
    }
}
