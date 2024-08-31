<?php

namespace App\Contracts;

interface EventFiler
{
    public function put(string $path, string $content): bool;
}
