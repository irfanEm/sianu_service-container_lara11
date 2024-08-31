<?php

namespace App\Http\Controllers;

use App\Contracts\EventFiler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhotoController extends Controller
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
