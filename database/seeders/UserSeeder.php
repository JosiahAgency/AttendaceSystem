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
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('pass'),
        ]);

        User::factory()
            ->count(10)
            ->create([
                'role' => 'teacher',
                'password' => Hash::make('password'),
            ]);

        $studentsPerGroup = 10;

        foreach (range(1, 5) as $groupId) {
            User::factory()->count($studentsPerGroup)->create([
                'role' => 'student',
                'group_id' => $groupId,
            ]);
        }

    }
}
