<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chambre;


class StripeController extends Controller
{
    

    public function checkout(){

        \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));

        $chambre = Chambre::all();
        
        $session =  \Stripe\checkout\Session::create([
            'line_items'=> [[
                'price_data' => [
                    'currency'=> 'mad',
                    'product_data' => [
                        'name'=> 'chambre1'
                    ],
                    'unit_amount'=> 100 * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url'=> route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url());
    }

    public function success(){

        return views('payment.checkout-success');
    }

    public function cancel(){

    }
}
