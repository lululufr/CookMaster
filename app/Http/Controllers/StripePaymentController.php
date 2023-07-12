<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Carts;
use App\Models\Coupon;
use App\Models\Hasclasses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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




    public function payment(Request $request, int $AMOUNT)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required'
        ]);


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


        return $charge;


    }




    public function carts_payment(Request $request){
        $carts = Carts::where('user_id', auth()->id())->get();
        $AMOUNT = 0;
        foreach($carts as $cart) {
            $AMOUNT += $cart->articles->prix;
            $cart->nb--;
        }



        if(auth()->user()->buying_plan == 'master'){
            $AMOUNT = $AMOUNT * 0.9;
        }

        $coupons = Coupon::where('user_id', auth()->id())->get();
        foreach($coupons as $coupon){
            if($coupon->amount < $AMOUNT) {
                $AMOUNT = $AMOUNT - $coupon->amount;
                $coupon->delete();
            } else {
                $coupon->amount = $coupon->amount - $AMOUNT;
                $coupon->save();
                $AMOUNT = 0;
            }
        }

        //livraison
        if(auth()->user()->buying_plan == 'free'){
            $AMOUNT = $AMOUNT + 10;
        }


        if($AMOUNT == 0){

            $data = [
                'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,
                'message' => "Vous n'avez pas été facturé car votre panier etait vide"
            ];

            $mail = new MailNotify($data);

            Mail::to(auth()->user()->email)->send($mail);

            return view('shop.success')->with('charge', 'Coupon');

            //envoyer un mail hihi
        }


        $charge = $this->payment($request, $AMOUNT);


        $hasclass = new Hasclasses();
        $hasclass->user_id = auth()->user()->id;
        $hasclass->classes_id = $cart->articles->id;
        $hasclass->save();

        $facture =" ";
        foreach ($carts as $cart) {
            $facture = $cart->articles->titre."/".$cart->articles->prix." €. ";
            $temp = $facture;
            $res = $temp."\n".$facture;
        }

        $message = "Vous avez payé".$AMOUNT.'€';



        //email
        $data = [
            'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,
            'message' => 'Merci de votre achat. '.$res."\n".$message
        ];

        $mail = new MailNotify($data);

        Mail::to(auth()->user()->email)->send($mail);
        //return $AMOUNT;

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
