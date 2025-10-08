<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

#[\AllowDynamicProperties]
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    // ...

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'name',
        'lastName',
        'middleName',
        'email',
        'role',
        'password',
        'avatar',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function updateAvatar($file): void
    {
        /** @var self $user */
        $user = Auth::user();

        $extension = $file->getClientOriginalExtension();
        $fileHash = md5(file_get_contents($file->getRealPath()));
        $filePath = public_path('images/avatars/' . $fileHash . '.' . $extension);

        if (!file_exists($filePath)) {
            $file->move(public_path('images/avatars'), $fileHash . '.' . $extension);
        }
        $user->avatar = url("images/avatars/{$fileHash}.{$extension}");

        $user->save();
    }
}
