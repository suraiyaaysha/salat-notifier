<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalatTimeController;

use SalatNotifier\Notifications\SalatTimeNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\SalatTime;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('salat-times', SalatTimeController::class);

Route::get('/test-notification', function () {
    $salatTime = new SalatTime([
        'prayer' => 'Dhuhr',
        'time' => '11:44',
    ]);

    Notification::route('slack', config('salat.slack_webhook_url'))
                ->notify(new SalatTimeNotification($salatTime));

    return 'Notification sent!';
});
