<?php

namespace App\Console;

use App\Http\Controllers\EmailController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // vdrWaitingPets
        $schedule->call(function () {
            $emailController = new EmailController();
            $emailController->approvalVdrPetMorning('07:00');
            Log::info('test pet 07:00');
        })->dailyAt('07:00');

        $schedule->call(function () {
            $emailController = new EmailController();
            $emailController->approvalVdrPetMorning('19:00');
            Log::info('test pet 19:00');
        })->dailyAt('19:00');

        $schedule->call(function () {
            $emailController = new EmailController();
            $emailController->summaryVdrMarine('08:00');
            Log::info('test marine 08:00');
        })->dailyAt('08:00');

        $schedule->call(function () {
            $emailController = new EmailController();
            $emailController->summaryVdrMarine('20:00');
            Log::info('test marine 20:00');
        })->dailyAt('20:00');

        $schedule->call(function () {
            $emailController = new EmailController();
            $emailController->summaryVdrSuptent('09:00');
            Log::info('test marine 09:00');
        })->dailyAt('09:00');

        $schedule->call(function () {
            $emailController = new EmailController();
            $emailController->summaryVdrSuptent('21:00');
            Log::info('test marine 21:00');
        })->dailyAt('21:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
