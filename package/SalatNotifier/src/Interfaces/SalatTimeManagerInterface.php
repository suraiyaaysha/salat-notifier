<?php

namespace SalatNotifier\Interfaces;

interface SalatTimeManagerInterface
{
    public function getAllTimes();

    public function getTime(string $prayer);

    public function setTime(string $prayer, string $time);

    public function deleteTime(string $prayer);

    public function notifyUpcomingPrayers();
}
