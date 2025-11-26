<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data to prevent duplicates when re-seeding
        Service::truncate();

        $services = [
            [
                'title'             => 'Web Design',
                'icon_class'        => 'fa-light fa-pen-ruler',
                'short_description' => '120 Projects', // For Top Grid
                'description'       => 'Business consulting consultants provide expert advice and guidance to businesses to help them improve their performance, efficiency, and organizational success.', // For Bottom List
                'details_url'       => 'service-details.html',
                'sort_order'        => 1,
                'status'            => true,
            ],
            [
                'title'             => 'Ui/Ux Design',
                'icon_class'        => 'fa-light fa-bezier-curve',
                'short_description' => '241 Projects',
                'description'       => 'My work is driven by the belief that thoughtful design and strategic planning can empower brands, transform businesses, and inspire people.',
                'details_url'       => 'service-details.html',
                'sort_order'        => 2,
                'status'            => true,
            ],
            [
                'title'             => 'Web Research',
                'icon_class'        => 'fa-light fa-lightbulb',
                'short_description' => '240 Projects',
                'description'       => 'I specialize in creating solutions that are not only visually engaging but also align with business goals. From in-depth research to execution.',
                'details_url'       => 'service-details.html',
                'sort_order'        => 3,
                'status'            => true,
            ],
            [
                'title'             => 'Marketing',
                'icon_class'        => 'fa-light fa-envelope',
                'short_description' => '331 Projects',
                'description'       => 'I’m proud of what I’ve accomplished and excited to share my journey with you. Effective marketing strategies that drive real growth.',
                'details_url'       => 'service-details.html',
                'sort_order'        => 4,
                'status'            => true,
            ],
            [
                'title'             => 'Branding Design',
                'icon_class'        => 'fa-light fa-copyright', // Example icon
                'short_description' => '150 Projects',
                'description'       => 'Interested in working together? Let’s bring your ideas to life! Contact me, and let’s start building something amazing for your brand identity.',
                'details_url'       => 'service-details.html',
                'sort_order'        => 5,
                'status'            => true,
            ],
            [
                'title'             => 'Motion Design',
                'icon_class'        => 'fa-light fa-film', // Example icon
                'short_description' => '90 Projects',
                'description'       => 'Feel free to browse through my recent projects. Each one showcases my approach and dedication to detail, creativity, and motion.',
                'details_url'       => 'service-details.html',
                'sort_order'        => 6,
                'status'            => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
