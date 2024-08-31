<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\EventFiler;
use Illuminate\Http\Response;

class VideoController extends Controller
{
    protected EventFiler $filesystem;

    public function __construct(EventFiler $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function index(): Response
    {
        $this->filesystem->put("upload/test.jpg", "content test upload");
        return response("upload file berhasil", 200);
    }
}
