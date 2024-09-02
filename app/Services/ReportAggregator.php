<?php

namespace App\Services;

use App\Reports\Report;

class ReportAggregator
{
    protected $reports;

    public function __construct(Report ...$reports)
    {
        $this->reports = $reports;
    }

    public function getAllReports(): array
    {
        $results = [];

        foreach($this->reports as $report)
        {
            $results[] = $report->generate();
        }

        return $results;
    }

}
