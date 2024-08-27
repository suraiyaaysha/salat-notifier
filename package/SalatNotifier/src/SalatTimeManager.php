<?php

namespace SalatNotifier;

use SalatNotifier\Interfaces\SalatTimeManagerInterface;
use SalatNotifier\Notifications\SalatTimeNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SalatTimeManager implements SalatTimeManagerInterface
{
    protected $table = 'salat_times';

    public function getAllTimes()
    {
        return DB::table($this->table)->get();
    }

    public function getTime(string $prayer)
    {
        return DB::table($this->table)->where('prayer', $prayer)->first();
    }

    public function setTime(string $prayer, string $time)
    {
        DB::table($this->table)->updateOrInsert(['prayer' => $prayer], ['time' => $time]);
    }

    public function deleteTime(string $prayer)
    {
        DB::table($this->table)->where('prayer', $prayer)->delete();
    }

    public function notifyUpcomingPrayers()
    {
        $prayers = $this->getAllTimes();
        $currentTime = now();

        foreach ($prayers as $prayer) {
            $prayerTime = \Carbon\Carbon::parse($prayer->time);
            $diff = $prayerTime->diffInMinutes($currentTime, false);

            if ($diff == 10) { // 10 minutes before the prayer time
                Notification::route('slack', config('salat.slack_webhook_url'))
                    ->notify(new SalatTimeNotification($prayer->prayer, $prayer->time));
            }
        }
    }
}
