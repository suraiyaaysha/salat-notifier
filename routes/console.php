<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\SendSalatNotifications;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('send:salat-notifications', function () {
    $this->call(SendSalatNotifications::class);
})->purpose('Send salat notifications every minute')->everyMinute();
