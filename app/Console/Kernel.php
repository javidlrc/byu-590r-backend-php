<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\ArtistReport; // ← Import your custom command

class Kernel extends ConsoleKernel
{
   

    /**
     * Define the application's command schedule.
     * 
     * @param \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('report:artist-report {--email=javidlrc@gmail.com}');
    }

}
