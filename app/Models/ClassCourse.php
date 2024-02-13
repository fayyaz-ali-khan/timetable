<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;
    protected $table = 'courses_classes';
    protected $fillable = ['class_id', 'meetings', 'academic_period_id', 'course_id'];
}
