<?php

namespace App\Services;

class EmailNotifier
{
    public function kirimNotif(string $pesan): string
    {
        return "Mengirim notifikasi : " . $pesan;
    }
}
