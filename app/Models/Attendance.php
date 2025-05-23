<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance";

    protected $fillable = [
        'session_id',
        'student_id',
        'status',
        'marked_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function session()
    {
        return $this->belongsTo(Sessiondata::class, 'session_id');
    }
}
