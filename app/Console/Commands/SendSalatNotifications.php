<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SalatTime;
use Carbon\Carbon;
use App\Notifications\SalatTimeNotification;
use Illuminate\Support\Facades\Notification;

class SendSalatNotifications extends Command
{
    protected $signature = 'salat:notify';
    protected $description = 'Send Slack notifications for Salat times';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        $salatTimes = SalatTime::all();

        foreach ($salatTimes as $salatTime) {
            $salatCarbonTime = Carbon::parse($salatTime->time);

            // Check if the current time is within 10 minutes before the Salat time
            if ($now->diffInMinutes($salatCarbonTime, false) === 10) {
                Notification::route('slack', config('salat.slack_webhook_url'))
                    ->notify(new SalatTimeNotification($salatTime));
            }
        }

        return 0;
    }
}
