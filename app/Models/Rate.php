<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rate extends Model
{
    protected $table = 'ratings';
    public $timestamps = false;

    protected $fillable = [
        'sauna_id',
        'user_id',
        'rating',
    ];
}

