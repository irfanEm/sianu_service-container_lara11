<?php

namespace App\Services;

class Transistor
{
    protected PodcastParser $parser;

    public function __construct(PodcastParser $parser)
    {
        $this->parser = $parser;
    }

    public function proses(string $data): array
    {
        return $this->parser->parse($data);
    }

}
