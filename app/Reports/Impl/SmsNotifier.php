<?php

namespace App\Reports\Impl;

use App\Reports\Notifier;

class SmsNotifier implements Notifier
{
    public function send(string $message): string
    {
        return "Notifikasi SMS : " . $message;
    }
}
