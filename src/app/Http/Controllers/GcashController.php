<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PayMongo\PayMongo;
use PayMongo\Webhook;

class GcashController extends Controller
{
    public function webhook(Request $request)
    {
        $client = new PayMongo(config('services.paymongo.secret_key'));

        try {
            $webhook = Webhook::build($request->getContent(), $request->header('Paymongo-Signature'));

            if ($webhook->type === 'source.chargeable') {
                $payment = $client->payments->create([
                    'source' => [
                        'id' => $webhook->data['id'],
                        'type' => 'source',
                    ],
                    'amount' => $webhook->data['attributes']['amount'],
                    'currency' => $webhook->data['attributes']['currency'],
                ]);

                Log::info('Payment successful: ' . $payment->id);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Invalid webhook signature: ' . $e->getMessage());

            return response()->json(['success' => false], 400);
        }
    }
}
