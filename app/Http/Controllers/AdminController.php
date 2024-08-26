<?php

namespace App\Http\Controllers;

use App\Logging\Logger;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $logger;
    protected $nameApp;

    public function __construct(Logger $logger, string $nameApp)
    {
        $this->logger = $logger;
        $this->nameApp = $nameApp;
    }

    public function index(): void
    {
        $this->logger->log("Admin mengakses dashboard - $this->nameApp.");
    }
}
