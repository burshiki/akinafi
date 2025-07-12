<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use PayMongo\PayMongo;

class Gcash extends Component
{
    public $checkoutUrl;

    public function pay()
    {
        $client = new PayMongo(config('services.paymongo.secret_key'));

        $source = $client->sources->create([
            'type' => 'gcash',
            'amount' => 10000, // 100.00 PHP
            'currency' => 'PHP',
            'redirect' => [
                'success' => route('client.dashboard'),
                'failed' => route('client.gcash'),
            ],
        ]);

        $this->checkoutUrl = $source->redirect['checkout_url'];
    }

    public function render()
    {
        return view('livewire.client.gcash');
    }
}
