<?php

namespace App\Services;

use App\Models\LoginLog;

class LoginLogService
{
    public function logSuccessfulLogin($user)
    {
        LoginLog::create([
            'username' => $user->name ?? $user->user_name ?? $user->email,
            'email' => $user->email,
        ]);
    }
}