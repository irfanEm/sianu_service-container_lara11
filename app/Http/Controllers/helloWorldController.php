<?php

namespace App\Http\Controllers;

use App\Dependencys\Hello;
use App\Dependencys\World;
use Illuminate\Http\Request;

class helloWorldController extends Controller
{
    private World $world;

    public function __construct()
    {
        $hello = new Hello;
        $this->world = new World($hello);
    }

    public function test()
    {
        return $this->world->helloWorld();
    }
}
