<?php

namespace App\Reports\Impl;

use App\Reports\Report;

class CpuReport implements Report
{
    public function generate(): string
    {
        return "CPU Report";
    }
}