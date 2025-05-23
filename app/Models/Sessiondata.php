<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessiondata extends Model
{
    protected $table = "session_data";

    protected $fillable = [
        'teacher_assignment_id',
        'scheduled_date',
        'start_time',
        'end_time',
    ];

    public function teacherAssignment()
    {
        return $this->belongsTo(TeacherAssignment::class, 'teacher_assignment_id');
    }
}
