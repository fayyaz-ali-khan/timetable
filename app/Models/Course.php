<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_code', 'name'];

    public static function rules()
    {
        return [
            'course_code' => 'required|unique:courses',
            'name' => 'required|unique:courses'
        ];
    }
    public function classes()
    {
        return $this->belongsToMany(CollegeClass::class, 'courses_classes', 'course_id', 'class_id');
    }
}
