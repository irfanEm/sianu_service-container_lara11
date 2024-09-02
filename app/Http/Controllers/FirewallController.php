<?php

namespace App\Http\Controllers;

use App\Services\Firewall;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FirewallController extends Controller
{
    protected Firewall $firewal;

    public function __construct(Firewall $firewal)
    {
        $this->firewal = $firewal;
    }

    public function filter(): JsonResponse
    {
        $content = "Dengan contoh ini, Anda dapat melihat bagaimana Binding Variadic yang Tipe-Terkenal diterapkan kassar proyek Laravel nyata. Kelas Firewallmenerima beberapa instance Filteryang disuntikkan menggunakan kasar variadic, dan Loggerdigunakan untuk mencatat hasil akhir. Binding ini diatur kassar AppServiceProvider, sehingga semua dependensi secara otomatis di-resolve oleh Laravel saat kelas tersebut digunakan.";
        $filteredContent = $this->firewal->filterContent($content);

        return response()->json(["filtered content" => $filteredContent]);
    }
}
