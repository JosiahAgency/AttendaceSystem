<?php

namespace Database\Seeders;

use App\Models\TeacherAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class TeacherAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacherIds = range(2, 11);
        $groupIds = range(1, 5);
        $subjectIds = range(1, 7);

        foreach ($teacherIds as $teacherId) {
            TeacherAssignment::create([
                'teacher_id' => $teacherId,
                'group_id' => Arr::random($groupIds),
                'subject_id' => Arr::random($subjectIds),
            ]);
        }
    }
}
