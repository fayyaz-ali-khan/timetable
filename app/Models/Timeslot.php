<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;
    protected $table = 'table_timeslots';

    protected $fillable = [
        'time',
        'rank',
    ];
}
