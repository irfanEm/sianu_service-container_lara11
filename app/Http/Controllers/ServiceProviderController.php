<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function testRegisterMethod()
    {
        $pesan = app('misal');
        return response()->json([
            'data' => $pesan,
        ]);
    }
}
