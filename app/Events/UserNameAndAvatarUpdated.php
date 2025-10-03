<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserNameAndAvatarUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $userId;
    public $name;
    public $avatar;

    /**
     * Создание нового события.
     *
     * @param  int  $userId
     * @param  string  $name
     * @param  string  $avatar
     * @return void
     */
    public function __construct(int $userId, string $name, string $avatar)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->avatar = $avatar;
    }

    /**
     * Канал, на который будет транслироваться событие.
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('user.' . $this->userId);
    }

    /**
     * Название события.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'user.nameAndAvatarUpdated';
    }
}
