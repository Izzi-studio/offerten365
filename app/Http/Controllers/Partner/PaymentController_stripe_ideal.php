<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;
use  App\Models\Payment;
use  App\Models\PaymentIntent;
use Log;
use Auth;
class PaymentController extends Controller
{
    public function index(Request $request){
		
		$amount = $request->get('amount',null);
		
		if($amount){
			$stripe = new \Stripe\StripeClient('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');

			$intent = $stripe->paymentIntents->create(
			  ['amount' => $amount*100, 'currency' => 'eur', 'payment_method_types' => ['ideal']]
			);
			$PAYMENT_INTENT_CLIENT_SECRET = $intent->client_secret;

			PaymentIntent::create([
				'payment_intent_id'=>$intent->id,
				'payment_intent_client_secret'=>$intent->client_secret,
				'amount'=>$amount,
				'status'=>'new',
				'user_id'=>Auth::ID()
			]);
			
			
			return view('front.partner.payment',compact(['PAYMENT_INTENT_CLIENT_SECRET','amount']));
		}
		
		return view('front.partner.payment',compact(['amount']));

	}

    public function makePayment(){
		
		if(request()->redirect_status == 'succeeded'){

			$authUser = auth()->user();
			if($authUser->status_pay == 1){
				$intent = PaymentIntent::where('payment_intent_id',request()->payment_intent)->first();

				$intent->update([
					'status' => request()->redirect_status
				]);
				
				$authUser->coins = $authUser->coins + $intent->amount;
				$authUser->save();
			}
		}
		
		return redirect(route('partner.myInfo'));
		
	}
	
} 
