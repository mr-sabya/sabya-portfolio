<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillCategory;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Design Skills Category
        $design = SkillCategory::create(['title' => 'Design Skill', 'sort_order' => 1]);

        $design->skills()->createMany([
            ['name' => 'PHOTOSHOT', 'percent' => 100, 'sort_order' => 1],
            ['name' => 'FIGMA', 'percent' => 95, 'sort_order' => 2],
            ['name' => 'ADOBE XD', 'percent' => 60, 'sort_order' => 3],
            ['name' => 'ADOBE ILLUSTRATOR', 'percent' => 70, 'sort_order' => 4],
        ]);

        // 2. Development Skills Category
        $dev = SkillCategory::create(['title' => 'Development Skill', 'sort_order' => 2]);

        $dev->skills()->createMany([
            ['name' => 'HTML', 'percent' => 100, 'sort_order' => 1],
            ['name' => 'CSS', 'percent' => 95, 'sort_order' => 2],
            ['name' => 'Javascript', 'percent' => 60, 'sort_order' => 3],
            ['name' => 'Php/Wordpress', 'percent' => 70, 'sort_order' => 4],
        ]);
    }
}
