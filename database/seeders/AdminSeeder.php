<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],  // unique identifier
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // change later
                'is_admin' => 1,
            ]
        );
    }
}
