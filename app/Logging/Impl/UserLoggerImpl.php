<?php

namespace App\Logging\Impl;
use App\Logging\Logger;

class UserLoggerImpl implements Logger
{
    public function log(string $message): void
    {
        echo "User log : " . $message . PHP_EOL;
    }
}
