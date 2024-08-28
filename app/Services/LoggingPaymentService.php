<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class LoggingPaymentService
{
    protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function prossesPayment(int $amount): void
    {
        Log::info("memproses pembayaran sebesar: $amount");

        $this->paymentService->prossesPayment($amount);
    }

}
