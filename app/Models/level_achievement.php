<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class level_achievement extends Model
{
    //
    protected $fillable = [
        'user_id',
        'level_id',
       'wpm',
       'duration',
        'accuracy',
        'typos',
        'total_words'
    ];
}
