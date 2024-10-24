<?php

namespace App\Http\Controllers;

use App\Services\Cofee;
use App\Dependencys\Nama;
use App\Dependencys\PodcastStats;
use App\Services\AudioProcessor;
use App\Services\Equalizer;
use Illuminate\Container\Container;
use Illuminate\Http\JsonResponse;
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

    public function metodeInjectionInvocation(PodcastStats $podcastStats)
    {
        $podcastData = App::call([new PodcastStats, 'generate']);
        return response()->json($podcastData);
    }

    public function containerEvents(AudioProcessor $audioProcessor, Equalizer $equalizer): JsonResponse
    {
        return response()->json([
            'simple_rate' => $audioProcessor->sampleRate,
            'equalizer_frequency' => $equalizer->frequency
        ]);
    }

}

