<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;


class StripePaymentController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }

    public function payment_page()
    {
        return view('shop.payment');
    }

    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required'
        ]);



        $carts = Carts::where('user_id', auth()->user()->id)->get();
        $AMOUNT = 0;
        foreach($carts as $cart) {
            $AMOUNT += $cart->articles->prix;
        }



        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors()->first());
            return response()->redirectTo('/pay')->with('message', 'Payment failed. Pas validé');
        }

        $token = $this->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->redirectTo('/pay')->with('message', 'Payment failed.'.$token['error']);
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->redirectTo('/pay')->with('message', 'Payment failed.Token ID vide');
        }

        $charge = $this->createCharge($token['id'], $AMOUNT*100);
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $request->session()->flash('success', 'Payment completed.');
        } else {
            $request->session()->flash('danger', 'Payment failed : create charge.');
        }


        foreach($carts as $cart) {
            $cart->delete();
        }

        return view('shop.success')->with('charge', $charge);
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'My first payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }




}
