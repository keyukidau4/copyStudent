<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'at_room',
        'description',
        'student_count',
        'student_list',
        'day_of_week',
        'begin_time',
        'end_time',
    ];
}
