<?php

namespace App\Services;

use App\Contracts\EventFiler;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\FileSystem;

class LocalFilesystem implements EventFiler
{
    public function put(string $path, string $content): bool
    {
        return Storage::disk('local')->put($path, $content);
    }
}
