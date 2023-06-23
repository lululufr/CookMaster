<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return view('plan.show_plan');
    }


    public function purchase_plan(string $plan)
    {
        switch ($plan){

            case 'free':
                $prix = 0;
                break;

                case 'starter':
                    $prix = 9;
                    break;

            case 'master':
                $prix = 19;
                break;

                default:
                    return redirect('/plan')->with('message', 'ERREUR');

        }


        //StripePaymentController::class->pay($prix);

        return view('plan.payment-plan-page')->with('plan', $plan)->with('prix', $prix);
    }



    public function pay_plan(Request $request ,string $plan)
    {

        $payment = new StripePaymentController();

        switch ($plan){

            case 'free':
                $prix = 0;
                break;

            case 'starter':
                $prix = 9;
                break;

            case 'master':
                $prix = 19;
                break;

            default:
                return redirect('/plan')->with('message', 'ERREUR');

        }


        $charge = $payment->payment($request, $prix);

        $user = User::where('id', auth()->user()->id)->firstOrFail();

        $user->update(['buying_plan' => $plan]);

        $user->save();

        

        return view('shop.success')->with('charge',  $charge);
    }


}
