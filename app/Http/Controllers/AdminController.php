<?php

namespace App\Http\Controllers;

use App\Logging\Logger;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function index(): void
    {
        $this->logger->log("Admin mengakses dashboard.");
    }
}
