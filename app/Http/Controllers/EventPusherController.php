<?php

namespace App\Http\Controllers;

use App\Contracts\EventPusher;
use Illuminate\Http\Request;

class EventPusherController extends Controller
{
    private EventPusher $eventPusher;

    public function __construct(EventPusher $eventPusher)
    {
        $this->eventPusher = $eventPusher;
    }

    public function index(Request $request)
    {
        $event = $request->input('event');
        $data = $request->input('data');

        if($this->eventPusher->push($event, $data)){
            return response(200)->json(['message' => 'event push berhasil.']);
        }

        return response(500)->json(['message' => 'event push gagal.']);
    }
}
