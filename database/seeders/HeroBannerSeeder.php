<?php

namespace Database\Seeders;

use App\Models\HeroBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // We truncate to prevent duplicate entries if you run seed multiple times
        HeroBanner::truncate();

        HeroBanner::create([
            'greeting'          => "Hello i’m",
            'name'              => 'Sabya Roy',
            'designation'       => 'Professional Web Developer',
            'button_text'       => 'View Portfolio',
            'button_url'        => 'portfolio-details.html',
            'about_title'       => 'About Me',
            // We include the HTML spans here so they render correctly with {!! !!} in the view
            'about_description' => 'A personal <span>portfolio</span> is a collection of to your work, that is achievements, and a skills that <span>web design</span> highlights in your',
            'hero_image'        => null, // Null will trigger the default image in your View logic
            'bg_text_1'         => 'WEB DESIGN',
            'bg_text_2'         => 'WEB DESIGN',
        ]);
    }
}
