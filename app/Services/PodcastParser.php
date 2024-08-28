<?php

namespace App\Services;

class PodcastParser
{
    public function parse(string $data): array
    {
        return ['parse_data' => $data];
    }
}
