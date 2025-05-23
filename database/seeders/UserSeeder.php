<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@admin.com',
        //     'role' => 'admin',
        //     'password' => Hash::make('pass'),
        // ]);

        // User::create([
        //     'name' => 'Teacher User',
        //     'email' => 'teacher@school.com',
        //     'role' => 'teacher',
        //     'password' => Hash::make('pass'),
        // ]);

        // $studentsPerGroup = 10;

        // foreach (range(1, 5) as $groupId) {
        //     User::factory()->count($studentsPerGroup)->create([
        //         'role' => 'student',
        //         'group_id' => $groupId,
        //     ]);
        // }

        // User::factory()
        //     ->count(10)
        //     ->create([
        //         'role' => 'teacher',
        //         'password' => Hash::make('password'),
        //     ]);
    }
}
