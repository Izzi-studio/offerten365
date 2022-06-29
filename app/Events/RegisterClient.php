<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;


class RegisterClient
{
    use SerializesModels;

    public $user;
    public $password;
    public $subject;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }
}
