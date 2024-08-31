<?php

namespace App\Contracts\ContractsImpl;
use App\Contracts\EventPusher;
use Illuminate\Support\Facades\Log;

class RedistEventPusher implements EventPusher
{
    public function push(string $event, array $data): bool
    {
        $result = [
            $event => $data,
        ];

        Log::info(json_encode($result));
        return true;
    }
}
