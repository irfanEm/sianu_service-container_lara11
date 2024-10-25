<?php

namespace App\Reports\Impl;

use App\Reports\Notifier;

class EmailNotifier implements Notifier
{
    public function send(string $message): string
    {
        return "Notifikasi Email : " . $message;
    }
}
