<?php

namespace App\Http\Controllers;

use App\Reports\Impl\SmsNotifier;
use App\Reports\Notifier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    protected $notifier;
    protected $smsNotifier;

    public function __construct(Notifier $notifier, SmsNotifier $smsNotifier)
    {
        $this->notifier = $notifier;
        $this->smsNotifier = $smsNotifier;
    }

    public function testRegisterMethod()
    {
        $pesan = app('misal');
        return response()->json([
            'data' => $pesan,
        ]);
    }

    public function testPropertySingletonsAndBindings(): JsonResponse
    {
        $notifEmail = $this->notifier->send("Assalamualaikum, email ini cuma tes.");
        $notifSMS = $this->smsNotifier->send("Assalamualaikum, SMS ini cuma tes.");

        return response()->json([
            'email' => $notifEmail,
            'sms' => $notifSMS,
        ]);
    }
}
