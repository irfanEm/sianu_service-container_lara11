<?php

namespace App\Filter;

interface Filter
{
    public function apply(string $content): string;
}
