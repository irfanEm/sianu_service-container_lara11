<?php

namespace App\Http\Controllers;

use App\Services\ReportAnalyzer;
use Illuminate\Http\Request;

class ReportAnalyzerController extends Controller
{
    protected ReportAnalyzer $reportAnalyzer;

    public function __construct(ReportAnalyzer $reportAnalyzer)
    {
        $this->reportAnalyzer = $reportAnalyzer;
    }

    public function index()
    {
        $result = $this->reportAnalyzer->analyze();
        return response($result);
    }
}
