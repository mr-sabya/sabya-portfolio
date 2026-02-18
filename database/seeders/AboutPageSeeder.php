<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. About Info
        \App\Models\AboutInfo::create([
            'title' => 'Who I Am',
            'description_one' => 'I am Sabyasachi Rakshit, a dedicated Full-Stack Developer with a profound focus on the Laravel ecosystem. My approach to development goes beyond just writing code—I am committed to building scalable, high-performance web applications that transform complex business logic into elegant, user-friendly digital experiences. I thrive on solving intricate problems and maintaining the highest standards of software craftsmanship.',
            'description_two' => 'Specializing in the TALL stack (Tailwind, Alpine.js, Laravel, Livewire) and Vue.js, I bridge the gap between robust backend architecture and reactive, intuitive frontend interfaces. By adhering to SOLID principles and modern PSR standards, I ensure every project is not only functional but also maintainable and future-proof. I don’t just build websites; I engineer digital solutions that scale.',
            'image' => 'about/about-main.jpg', // Ensure this file exists in storage/app/public/about/
        ]);

        // 2. Mission & Vision
        \App\Models\MissionVision::create([
            'subtitle' => 'The Goal',
            'title' => 'My Mission',
            'description' => 'To empower businesses and individuals by creating robust, secure, and scalable web applications...'
        ]);
        \App\Models\MissionVision::create([
            'subtitle' => 'The Future',
            'title' => 'My Vision',
            'description' => 'To be a leading contributor to the Laravel community and push the boundaries of what\'s possible...'
        ]);

        // 3. Core Values
        $values = [
            ['title' => 'Clean Code', 'description' => 'I follow SOLID principles and PSR standards...'],
            ['title' => 'Performance', 'description' => 'Efficiency matters. From database query optimization to lightning-fast UI...'],
            ['title' => 'Continuous Learning', 'description' => 'In the ever-changing tech landscape, I stay ahead by constantly experimenting...'],
        ];

        foreach ($values as $index => $val) {
            \App\Models\CoreValue::create([
                'title' => $val['title'],
                'description' => $val['description'],
                'order' => $index
            ]);
        }
    }
}
