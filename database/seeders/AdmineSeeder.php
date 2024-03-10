<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Admin::create([
            'name' => 'Aymen',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin2024'),
        ]);

        // Create multiple users using factory
        User::factory()->count(10)->create();
    }
}
