<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class RegisterPartner
{
    use SerializesModels;

   // public $request;
    public $user;
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
