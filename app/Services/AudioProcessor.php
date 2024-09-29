<?php

namespace App\Services;

class AudioProcessor
{
    public $sampleRate;
    public function setSampleRate($rate): void
    {
        $this->sampleRate = $rate;
    }
}

class Equalizer
{
    public $frequency;
    public function setFrequency($frequency): void
    {
        $this->frequency = $frequency;
    }
}
