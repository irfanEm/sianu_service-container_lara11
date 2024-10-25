<?php

namespace App\Reports;

interface Notifier
{
    public function send(string $message);
}
