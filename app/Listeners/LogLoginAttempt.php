<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\LoginLog;

class LogLoginAttempt
{
    public function handleLogin(Login $event)
    {
        LoginLog::create([
            'username' => $event->user->name ?? $event->user->user_name ?? $event->user->email,
            'email' => $event->user->email,
        ]);
    }
}
