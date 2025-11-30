<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CounterSection;
use App\Models\Counter;

class CounterSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Left Side Section Data
        CounterSection::truncate();
        CounterSection::create([
            'exp_number'      => 25,
            'exp_title'       => "Years Of \nexperience", // \n for line break
            'exp_description' => 'Business consulting consultants provide expert advice and guidance to businesses to help them improve their performance efficiency',
        ]);

        // 2. Seed Right Side Counters
        Counter::truncate();
        $counters = [
            [
                'number' => 20,
                'suffix' => 'k+',
                'title'  => 'Our Project Complete',
                'sort_order' => 1
            ],
            [
                'number' => 10,
                'suffix' => 'k+',
                'title'  => 'Our Natural Products',
                'sort_order' => 2
            ],
            [
                'number' => 200,
                'suffix' => '+',
                'title'  => 'Clients Reviews',
                'sort_order' => 3
            ],
            [
                'number' => 1000,
                'suffix' => '+',
                'title'  => 'Our Satisfied Clients',
                'sort_order' => 4
            ],
        ];

        foreach ($counters as $counter) {
            Counter::create($counter);
        }
    }
}
