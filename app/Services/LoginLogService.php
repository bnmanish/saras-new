<?php

namespace App\Services;

use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginLogService
{
    public function logLoginAttempt($username, $status, $userId = null, $ipAddress = null)
    {
        $ipAddress = $ipAddress ?? request()->ip();
        $location = $this->getLocationFromIp($ipAddress);

        LoginLog::create([
            'user_id' => $userId,
            'username' => $username,
            'ip_address' => $ipAddress,
            'location' => $location,
            'status' => $status,
        ]);
    }

    private function getLocationFromIp($ip)
    {
        try {
            // Skip localhost IPs
            if (in_array($ip, ['127.0.0.1', '::1', 'localhost'])) {
                return 'Localhost';
            }

            // Use ipinfo.io for location data (free tier: 50,000 requests/month)
            $response = Http::timeout(5)->get("http://ipinfo.io/{$ip}/json");
            
            if ($response->successful()) {
                $data = $response->json();
                $city = $data['city'] ?? '';
                $region = $data['region'] ?? '';
                $country = $data['country'] ?? '';
                
                return trim(implode(', ', array_filter([$city, $region, $country])));
            }
        } catch (\Exception $e) {
            // If API fails, return unknown
            return 'Unknown';
        }

        return 'Unknown';
    }

    public function logSuccessfulLogin($user, $ipAddress = null)
    {
        $this->logLoginAttempt(
            $user->email ?? $user->user_name,
            'success',
            $user->id,
            $ipAddress
        );
    }

    public function logFailedLogin($username, $ipAddress = null)
    {
        $this->logLoginAttempt($username, 'fail', null, $ipAddress);
    }
}