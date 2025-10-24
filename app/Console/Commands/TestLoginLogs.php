<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Failed;
use App\Models\User;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Event;

class TestLoginLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:login-logs {--scenario= : The scenario to test (success, fail_password, fail_user, all)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Login Logs module with different scenarios';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scenario = $this->option('scenario') ?: 'all';

        $this->info("Testing Login Logs Module - Scenario: {$scenario}");

        // Get or create a test user
        $user = User::first() ?: User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->info("Using test user: {$user->email}");

        switch ($scenario) {
            case 'success':
                $this->testSuccessfulLogin($user);
                break;
            case 'fail_password':
                $this->testFailedLoginPassword($user);
                break;
            case 'fail_user':
                $this->testFailedLoginUser();
                break;
            case 'all':
            default:
                $this->testSuccessfulLogin($user);
                $this->testFailedLoginPassword($user);
                $this->testFailedLoginUser();
                break;
        }

        $this->displayLogs();
    }

    private function testSuccessfulLogin($user)
    {
        $this->info("Testing successful login...");

        // Simulate successful login event
        Event::dispatch(new Login('web', $user, false));

        $this->info("✓ Successful login event dispatched");
    }

    private function testFailedLoginPassword($user)
    {
        $this->info("Testing failed login (wrong password)...");

        // Simulate failed login event
        Event::dispatch(new Failed('web', $user, ['email' => $user->email, 'password' => 'wrongpassword']));

        $this->info("✓ Failed login event dispatched (wrong password)");
    }

    private function testFailedLoginUser()
    {
        $this->info("Testing failed login (non-existent user)...");

        // Simulate failed login event for non-existent user
        Event::dispatch(new Failed('web', null, ['email' => 'nonexistent@example.com', 'password' => 'password']));

        $this->info("✓ Failed login event dispatched (non-existent user)");
    }

    private function displayLogs()
    {
        $this->info("\nRecent Login Logs:");
        $logs = LoginLog::latest()->take(10)->get();

        if ($logs->isEmpty()) {
            $this->warn("No login logs found.");
            return;
        }

        foreach ($logs as $log) {
            $status = $log->status == 'success' ? 'SUCCESS' : 'FAIL';
            $this->line("{$log->created_at->format('Y-m-d H:i:s')} | {$status} | {$log->username} | {$log->ip_address} | {$log->location}");
        }

        $this->info("\nTotal logs: " . LoginLog::count());
        $this->info("Success logs: " . LoginLog::where('status', 'success')->count());
        $this->info("Fail logs: " . LoginLog::where('status', 'fail')->count());
    }
}
