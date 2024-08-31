<?php

namespace App\Contracts;

interface EventPusher
{
    public function push(string $event, array $data): bool;
}
