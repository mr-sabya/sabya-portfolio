<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;
use App\Models\Experience;
use App\Models\ExperienceSection;

class EducationExperienceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Education
        Education::truncate();
        $educations = [
            [
                'designation' => 'Trainer Marketing',
                'duration' => '2005-2009',
                'description' => "A personal portfolio is a curated collection of an individual's professional work, showcasing their skills.",
                'sort_order' => 1
            ],
            [
                'designation' => 'Assistant Director',
                'duration' => '2010-2014',
                'description' => 'Each project here showcases my commitment to excellence and adaptability, tailored to meet each client’s unique needs.',
                'sort_order' => 2
            ],
            [
                'designation' => 'Design Assistant',
                'duration' => '2008-2012',
                'description' => 'I’ve had the privilege of working with various clients, from startups to established companies, helping bring their visions to life.',
                'sort_order' => 3
            ],
            [
                'designation' => 'Design Assistant',
                'duration' => '2008-2012',
                'description' => 'Each project here showcases my commitment to excellence and adaptability, tailored to meet each client’s unique needs a personal.',
                'sort_order' => 4
            ],
        ];
        foreach ($educations as $edu) {
            Education::create($edu);
        }

        // 2. Seed Experience
        Experience::truncate();
        $experiences = [
            [
                'subtitle'    => 'experience',
                'name'        => 'Fatima Asrafy',
                'designation' => 'UI/UX Designer',
                'duration'    => '2015-2018', // <--- Added data
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum...',
                'sort_order'  => 1
            ],
            [
                'subtitle'    => 'experience',
                'name'        => 'Tech Solution',
                'designation' => 'Senior Developer',
                'duration'    => '2019-2023', // <--- Added data
                'description' => 'Interested in working together? Let’s bring your ideas to life...',
                'sort_order'  => 2
            ],
        ];
        foreach ($experiences as $exp) {
            Experience::create($exp);
        }

        // 3. Seed Section Image
        ExperienceSection::truncate();
        ExperienceSection::create(['experience_image' => null]); // Will use default in view
    }
}
