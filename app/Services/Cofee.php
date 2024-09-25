<?php

namespace App\Services;

class Cofee
{
    public string $nama;

    public function __construct(string $nama)
    {
        $this->nama = $nama;
    }

    public function minumKopi(): string
    {
        return "{$this->nama} sedang meminum kopi hitam kupu kupu, hehe";
    }
}
