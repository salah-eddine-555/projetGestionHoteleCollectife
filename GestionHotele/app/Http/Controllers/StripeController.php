<?php

namespace App\Http\Controllers;
use Stripe;
use Illuminate\Http\Request;
use App\Models\Chambre;



class StripeController extends Controller
{
    

    public function checkout(){

       
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $chambre = Chambre::all();
        
        $session =  \Stripe\Checkout\Session::create([
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

        return redirect($session->url);
    }

    public function success(){

        return view('payment.checkoutSuccess');
    }

    public function cancel(){

    }
}
