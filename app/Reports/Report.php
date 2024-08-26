<?php

namespace App\Reports;

interface Report
{
    public function generate(): string;
}
