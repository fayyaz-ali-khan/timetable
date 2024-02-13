<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnavailableRoom extends Model
{
    use HasFactory;

    protected $table = 'unavailable_rooms';
    protected $fillable = ['room_id', 'class_id'];
}
