<?php

namespace App\Http\Controllers;
use Stripe;
use Illuminate\Http\Request;
use App\Models\Chambre;



class StripeController extends Controller
{
    

    public function checkout(Chambre $chambre){

    //   dd($chambre->hotel->name);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        
        
        $session = \Stripe\Checkout\Session::create([
            'line_items'=> [[
                'price_data' => [
                    'currency'=> 'mad',
                    'product_data' => [
                        'name'=> $chambre->hotel->name,
                        'description' => $chambre->category->name,
                    ],
                    'unit_amount'=> $chambre->price_per_night * 100, 
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
