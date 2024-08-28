<?php

namespace App\Services;

class PaymentService
{
    public function prossesPayment(int $amount): string
    {
        return "memproses pembayaran sebesar: $amount";
    }
}
