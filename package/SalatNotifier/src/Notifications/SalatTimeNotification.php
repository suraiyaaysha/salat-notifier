<?php

namespace SalatNotifier\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class SalatTimeNotification extends Notification
{
    private $salatTime;

    public function __construct($salatTime)
    {
        $this->salatTime = $salatTime;
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->content('New Salat Time: ' . $this->salatTime->prayer . ' at ' . $this->salatTime->time);
    }
}
