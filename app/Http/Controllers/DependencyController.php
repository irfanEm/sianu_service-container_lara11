<?php

namespace App\Http\Controllers;

use App\Dependencys\Nama;
use Illuminate\Http\Request;

class DependencyController extends Controller
{
    private Nama $nama;

    public function __construct(Nama $nama)
    {
        $this->nama = $nama;
    }

    public function sayHello(Request $request)
    {
        $nama = $request->input('nama', 'kamu'); // Tambahkan default value 'kamu' jika nama tidak diberikan
        return response()->json([
            'message' => $this->nama->namaOrang($nama)
        ]);
    }
}

