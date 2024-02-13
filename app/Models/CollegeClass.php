<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeClass extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = ['name', 'size'];

    public static function rules()
    {
        return [
            'name' => 'required|unique:classes',
            'size' => 'required|integer'
        ];
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_classes', 'class_id', 'course_id')
            ->withPivot(['meetings', 'academic_period_id']);
    }

}
