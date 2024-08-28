<?php

namespace Tests\Feature;

use App\Services\Transistor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScopedSingletonTest extends TestCase
{
    public function testScopedSingleton()
    {
        $transistor = $this->app->make(Transistor::class);
        $transistor1 = $this->app->make(Transistor::class);

        self::assertSame($transistor, $transistor1);

        $this->refreshApplication();

        $transistor3 = $this->app->make(Transistor::class);

        self::assertNotSame($transistor, $transistor3);
        self::assertNotSame($transistor1, $transistor3);
    }
}
