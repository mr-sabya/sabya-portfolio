<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            HeroBannerSeeder::class,
            AdminSeeder::class,
            ServiceSectionSeeder::class,
            ServiceSeeder::class,
            SkillSeeder::class,
            EducationExperienceSeeder::class,
            CounterSeeder::class,
        ]);
    }
}
