<?php

namespace App\Dependencys;

class PodcastStats
{
    public function generate(AppleMusic $apple)
    {
        $appleData = $apple->getPodcastData();

        return [
            'podcast_name' => $appleData['name'],
            'total_listener' => $appleData['listener']
        ];
    }

}
