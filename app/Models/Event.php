<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'program',
        'start_time',
        'end_time',
        'location',
        'charges',
        'is_one_time',
        'date',
        'day',
    ];

}
