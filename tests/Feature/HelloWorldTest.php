<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloWorldTest extends TestCase
{
    public function testDependencys()
    {
        $this->get('/test-dependencys')
            ->assertSeeText('hello World.');
    }
}
