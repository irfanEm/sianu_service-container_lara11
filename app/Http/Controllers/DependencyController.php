<?php

namespace App\Http\Controllers;

use App\Services\Cofee;
use App\Dependencys\Nama;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DependencyController extends Controller
{
    private Nama $nama;
    private Container $container;

    public function __construct(Nama $nama, Container $container)
    {
        $this->nama = $nama;
        $this->container = $container;
    }

    public function sayHello(Request $request)
    {
        $nama = $request->input('nama', 'kamu'); // Tambahkan default value 'kamu' jika nama tidak diberikan
        return response()->json([
            'message' => $this->nama->namaOrang($nama)
        ]);
    }

    public function makeWith(string $jeneng)
    {
        $kopi = $this->container->makeWith(Cofee::class, ['nama' => $jeneng]);
        return $kopi->minumKopi();
    }
}

