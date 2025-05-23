<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Sessiondata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessionIds = Sessiondata::pluck('id')->toArray();

        // Define student IDs (range 12 to 61)
        foreach (range(12, 61) as $studentId) {
            Attendance::create([
                'session_id' => Arr::random($sessionIds), // Random session
                'student_id' => $studentId,
                'status' => Arr::random(['present', 'absent']),
            ]);
        }
    }
}
