<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studentgroups extends Model
{
    protected $table = "studentgroups";

    protected $fillable = [
        'name',
    ];
}
