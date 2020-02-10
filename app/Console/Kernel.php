<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        "App\Console\Commands\TestCron",
        "App\Console\Commands\InsertCron",
        "App\Console\Commands\PriceUpdateCron"
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command("Inspire") // primeiro cron job
          ->hourly();

        $schedule->command("insert:cron {pessoa*}") // cron job que insere uma pessoa no banco
          ->daily();

        $schedule->call(function () {
          print("That's me again"); // esse é um cron job de teste
        })->everyFiveMinutes();

        $schedule->command("update:cron")
          ->daily();
    }
}
