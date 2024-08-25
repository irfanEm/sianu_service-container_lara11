<?php

namespace App\Logging\Impl;
use App\Logging\Logger;

class AdminLoggerImpl implements Logger
{
    public function log(string $message): void
    {
        echo "Admin log : " . $message. PHP_EOL;
    }
}
