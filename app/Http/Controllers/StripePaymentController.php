<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Stripe\Stripe;
use Exception;

class StripePaymentController extends Controller
{
    /**
     * Affiche la page de paiement.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment_page()
    {
        return view('shop.payment');
    }

    /**
     * Traitement du paiement.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        try {
            //implementer cart plus tard
            //$total = Cart::total() / 100;

            $total = 100;

            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $charge = \Stripe\Charge::create([
                'amount' => $total,
                'currency' => 'CAD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    //'contents' => $contents,
                    //'quantity' => Cart::instance('default')->count(),
                ],
            ]);

            return back()->with('success_message', 'Merci ! Votre paiement a été accepté avec succès !');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors du paiement. Veuillez réessayer.']);
        }
    }
}
