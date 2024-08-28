<?php

namespace Tests\Feature;

use App\Services\Transistor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransistorTest extends TestCase
{
    public function test_is_transistor_singleton()
    {
        $transistor1 = $this->app->make(Transistor::class);
        $transistor2 = $this->app->make(Transistor::class);

        self::assertSame($transistor1, $transistor2);
    }

    public function test_proses_method_transistor()
    {
        $data = "test data";
        $transistor = $this->app->make(Transistor::class);
        $result = $transistor->proses($data);

        self::assertIsArray($result);
        self::assertArrayHasKey('parse_data', $result);
        self::assertEquals('test data', $result['parse_data']);
    }
}
