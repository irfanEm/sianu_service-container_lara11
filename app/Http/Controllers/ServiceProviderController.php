<?php

namespace App\Http\Controllers;

use App\Reports\Impl\SmsNotifier;
use App\Reports\Notifier;
use App\Services\EmailNotifier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    protected $notifier;
    protected $smsNotifier;
    protected $emailNotifier;

    public function __construct(Notifier $notifier, SmsNotifier $smsNotifier, EmailNotifier $emailNotifier)
    {
        $this->notifier = $notifier;
        $this->smsNotifier = $smsNotifier;
        $this->emailNotifier = $emailNotifier;
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

    public function testBootMethodDepInject(): JsonResponse
    {
        $data = [
            'id' => 'im2711',
            'name' => 'Produk Test 2711',
            'price' => 2711000
        ];

        return response()->standardJson('success', $data);
    }

    public function testDefferProvider(): JsonResponse
    {
        $notifikasi = $this->emailNotifier->kirimNotif("Notifikasi test untuk DefferableProvider");
        return response()->standardJson('sukses', $notifikasi);
    }
}
