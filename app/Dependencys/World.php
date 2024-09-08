<?php

namespace App\Dependencys;

class World
{
    private Hello $hello;
    public function __construct()
    {
        $this->hello = new Hello;
    }

    public function helloWorld(): string
    {
        return $this->hello->hello() . " World.";
    }
}
