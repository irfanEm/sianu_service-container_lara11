<?php

namespace App\Reports\Impl;

use App\Reports\Report;

class MemoryReport implements Report
{
    public function generate(): string
    {
        return "Memory Report";
    }
}
