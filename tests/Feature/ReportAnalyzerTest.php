<?php

// tests/Unit/ReportAnalyzerTest.php
namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ReportAnalyzer;
use App\Reports\CpuReport;
use App\Reports\MemoryReport;
use App\Reports\DiskReport;

class ReportAnalyzerTest extends TestCase
{
    public function test_analyze_reports()
    {
        // Kita akan menggunakan container untuk resolve ReportAnalyzer
        $analyzer = $this->app->make(ReportAnalyzer::class);

        $result = $analyzer->analyze();

        // Memastikan bahwa hasil analisis sesuai dengan implementasi laporan
        $this->assertContains('CPU Report', $result);
        $this->assertContains('Memory Report', $result);
        $this->assertContains('Disk Report', $result);
        $this->assertCount(3, $result);
    }
}
