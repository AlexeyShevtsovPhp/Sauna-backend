<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'booking';
    public $timestamps = false;

    protected $fillable = [
        'sauna_id',
        'user_id',
        'start_time',
        'end_time',
    ];
}
