<?php

namespace Database\Seeders;

use App\Models\Sessiondata;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::create(2025, 5, 26);
        $endDate = Carbon::create(2025, 5, 30);
        $daysDiff = $startDate->diffInDays($endDate);

        foreach (range(1, 10) as $teacherAssignmentId) {

            $randomDays = rand(0, $daysDiff);
            $scheduledDate = $startDate->copy()->addDays($randomDays)->format('Y-m-d');

            $minSeconds = 8 * 3600;
            $maxSeconds = 15 * 3600;
            $randomStartSec = rand($minSeconds, $maxSeconds);
            $startTime = gmdate('H:i:s', $randomStartSec);

            $endTime = gmdate('H:i:s', $randomStartSec + 3600);

            Sessiondata::create([
                'teacher_assignment_id' => $teacherAssignmentId,
                'scheduled_date' => $scheduledDate,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ]);
        }
    }
}
