<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Sauna extends Model
{

    protected $table = 'saunas';

    use HasFactory;
    use Notifiable;
    public $timestamps = false;

    public const PER_PAGE = 10;

}
