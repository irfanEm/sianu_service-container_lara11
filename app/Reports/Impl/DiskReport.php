<?php

namespace App\Reports\Impl;

use App\Reports\Report;

class DiskReport implements Report
{
    public function generate(): string
    {
        return "Disk Report";
    }
}
