<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class level_track extends Model
{
    //
    protected $fillable = [
        'user_id',
        'lesson_id'
    ];
}
