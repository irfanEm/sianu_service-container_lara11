<?php

namespace App\Filter\FilterImpl;

use App\Filter\Filter;

class ToLoongFilter implements Filter
{
    public function apply(string $content): string
    {
        return strlen($content) > 100 ? substr($content, 0, 100) . '...' : $content;
    }
}
