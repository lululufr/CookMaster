<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index()
    {
        return view('plan.show_plan');
    }


    public function which_plan(User $user) : string
    {
        switch ($user->buying_plan){

            case 'free':
                return 'free';

            case 'starter':
                return 'starter';

            case 'master':
                return 'master';

            default:
                return 'free';
        }

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

        $user = auth()->user();

        DB::table('users')
            ->where('id', $user->id)
            ->update(['buying_plan' => $plan]);

        $user->buying_plan = $plan;


        return view('shop.success')->with('charge',  $charge);
    }


}
