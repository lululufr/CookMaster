<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Cooptation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index()
    {
        return view('plan.show_plan');
    }


    public static function plan_count_classes(View $v) : View
    {

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

        if($user->buying_plan != "free" && $cooptation = Cooptation::where('coopted_id', $user->id)->first()){
            $cooptation->hasPaid = 1;
            $cooptation->save();
            $user->cooptation_count += 1;
            if($user->cooptation_count % 3 && $user->buying_plan == "starter"){
                $cooptation->createCoupon();
            }
        }
        //email
        $data = [
            'name' => auth()->user()->firstname . ' ' . auth()->user()->lastname,
            'message' => 'Merci de votre achat. Vous avez payé'.$prix. '€.'.'Vous avez acheté le plan '.$plan.'.',
        ];

        $mail = new MailNotify($data);

        Mail::to(auth()->user()->email)->send($mail);



        $user->save();
        return view('shop.success')->with('charge',  $charge);
    }


}
