<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $table = 'booking';
    public $timestamps = false;

    protected $fillable = [
        'sauna_id',
        'user_id',
        'start_time',
        'end_time',
        'blocked',
        'paid',
        'lowPrice',
        'highPrice',
        'size',
    ];

    public function sauna(): BelongsTo
    {
        return $this->belongsTo(Sauna::class, 'sauna_id');
    }
}

