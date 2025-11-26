<?php

namespace Database\Seeders;

use App\Models\ServiceSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceSection::truncate();

        ServiceSection::create([
            'sub_title'      => 'Latest Service',
            'title'          => 'Inspiring The World One Project',
            'description'    => 'Business consulting consultants provide expert advice and guidance to businesses to help them improve their performance, efficiency, and organizational success.',
            'featured_image' => null, // Will use default in view
        ]);
    }
}
