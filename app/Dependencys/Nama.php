<?php

namespace App\Dependencys;

class Nama
{
    private Sapa $sapa;

    public function __construct(Sapa $sapa)
    {
        $this->sapa = $sapa;
    }

    public function namaOrang(string $nama): string
    {
        return $this->sapa->katakanHai() . $nama;
    }
}
