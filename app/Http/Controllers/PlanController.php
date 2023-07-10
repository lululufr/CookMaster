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


    public function purchase_plan(string $plan, string $time)
    {
        switch ($plan){

            case 'free':
                $prix = 0;
                break;

                case 'starter':
                    $prix = 9.90;
                    if($time == 'year')
                        $prix = 113;
                    break;

            case 'master':
                $prix = 19;
                if($time == 'year')
                    $prix = 220;
                    if(auth()->user()->buying_plan == "master" )
                        $prix *=.9;
                break;

                default:
                    return redirect('/plan')->with('message', 'ERREUR');

        }


        //StripePaymentController::class->pay($prix);
        return view('plan.payment-plan-page')->with('plan', $plan)->with('prix', $prix)->with('time', $time);
    }



    public function pay_plan(Request $request ,string $plan, string $time)
    {
        $payment = new StripePaymentController();

        switch ($plan){

            case 'free':
                $prix = 0;
                break;

            case 'starter':
                $prix = 9.90;
                if($time == 'year')
                    $prix = 113;
                break;

            case 'master':
                $prix = 19;
                if($time == 'year')
                    $prix = 220;
                    if(auth()->user()->buying_plan == "master" )
                        $prix *=.9;
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

        if($request->input('duration') == 'year'){
            $user->buying_plan_end_date = date('Y-m-d H:i:s', strtotime('+1 year'));
        }else{
            $user->buying_plan_end_date = date('Y-m-d H:i:s', strtotime('+1 month'));
        }

        if($user->buying_plan != "free" && $cooptation = Cooptation::where('coopter_id', $user->id)->first()){
            $cooptation->hasPaid = 1;
            $cooptation->save();
            $coopter = User::where('id', $cooptation->coopter_id)->first();
            $coopter->cooptation_count++;
            if($coopter->cooptation_count % 3 && $coopter->buying_plan == "starter"){
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
