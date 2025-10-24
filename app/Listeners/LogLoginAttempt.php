<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Failed;
use App\Models\LoginLog;
use Illuminate\Http\Request;

class LogLoginAttempt
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    private function getLocation($ip)
    {
        // For local IPs, return 'Local Network'
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return 'Local Network';
        }

        try {
            $url = "http://ip-api.com/json/{$ip}";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data && $data['status'] === 'success') {
                return $data['city'] . ', ' . $data['country'];
            }
        } catch (\Exception $e) {
            // Ignore errors
        }

        return 'Unknown';
    }

    public function handleLogin(Login $event)
    {
        $ip = $this->request->ip();
        LoginLog::create([
            'user_id' => $event->user->id,
            'username' => $event->user->email,
            'ip_address' => $ip,
            'location' => $this->getLocation($ip),
            'status' => 'success',
        ]);
    }

    public function handleFailed(Failed $event)
    {
        $username = $event->credentials['email'] ?? 'unknown';
        $ip = $this->request->ip();

        // Prevent duplicate entries within 5 seconds for the same IP and username
        $existingLog = LoginLog::where('username', $username)
            ->where('ip_address', $ip)
            ->where('status', 'fail')
            ->where('created_at', '>=', now()->subSeconds(5))
            ->exists();

        if (!$existingLog) {
            LoginLog::create([
                'username' => $username,
                'ip_address' => $ip,
                'location' => $this->getLocation($ip),
                'status' => 'fail',
            ]);
        }
    }


}
