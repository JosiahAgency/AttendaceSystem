<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Grade 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('studentgroups')->insert($groups);
    }
}
