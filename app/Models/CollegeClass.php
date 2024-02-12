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
}
