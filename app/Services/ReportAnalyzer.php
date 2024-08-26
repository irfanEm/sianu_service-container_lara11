<?php

namespace App\Services;

class ReportAnalyzer
{
    protected $reports;

    public function __construct(array $reports)
    {
        $this->reports = $reports;
    }

    public function analyze(): array
    {
        $result = [];
        foreach ($this->reports as $report) {
            $result[] = $report->generate();
        }
        return $result;
    }
}
