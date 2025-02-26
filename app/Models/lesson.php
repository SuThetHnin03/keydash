<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lesson extends Model
{
    //
    protected $fillable = [
        'level_id',
        'lesson'
    ];

    use HasFactory;
}
