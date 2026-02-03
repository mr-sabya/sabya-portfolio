<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            Partner::create([
                'name' => "Company $i",
                'logo' => "partners/company-logo-$i.svg", // Ensure these exist in storage or public
                'sort_order' => $i,
                'status' => true,
            ]);
        }
    }
}
