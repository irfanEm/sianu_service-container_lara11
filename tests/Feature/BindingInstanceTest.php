<?php

namespace Tests\Feature;

use App\Services\PodcastParser;
use Tests\TestCase;
use App\Services\Transistor;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Psy\Readline\Transient;

class BindingInstanceTest extends TestCase
{
    public function testBindingInstance()
    {
        $podcastParser = new PodcastParser();
        $transistorIns = new Transistor($podcastParser);
        
        $this->app->instance(Transistor::class, $transistorIns);
        $transistorContainer = $this->app->make(Transistor::class);

        assert($transistorContainer === $transistorIns);
    }
}
