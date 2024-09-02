<?php

namespace App\Filter\FilterImpl;

use App\Filter\Filter;

class ProfanityFilter implements Filter
{
    public function apply(string $content): string
    {
        return str_replace('kasar', '*****', $content);
    }
}
