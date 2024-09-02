<?php

namespace App\Filter\FilterImpl;

use App\Filter\Filter;

class NullFilter implements Filter
{
    public function apply(string $content): string
    {
        return $content;
    }
}
