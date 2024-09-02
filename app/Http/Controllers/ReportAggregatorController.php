<?php

namespace App\Http\Controllers;

use App\Services\ReportAggregator;
use Illuminate\Http\Request;

class ReportAggregatorController extends Controller
{
    protected ReportAggregator $reportAggregator;

    public function __construct(ReportAggregator $reportAggregator)
    {
        $this->reportAggregator = $reportAggregator;
    }

    public function generateReports()
    {
        $reports = $this->reportAggregator->getAllReports();

        return response()->json(["reports :" => $reports]);
    }
}
