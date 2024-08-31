<?php

namespace App\Services;

use App\Contracts\EventFiler;
use Illuminate\Support\Facades\Storage;

class S3Filesystem implements EventFiler
{
    public function put(string $path, string $content): bool
    {
        return Storage::disk('s3')->put($path, $content);
    }
}
