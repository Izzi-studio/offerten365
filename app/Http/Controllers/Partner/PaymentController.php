<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;
use  App\Models\Payment;
use  App\Models\PaymentIdeaPay;
use Log;
use Auth;

class PaymentController2 extends Controller
{

		
    public function index(Request $request){
dd($request); 
		$amount = $request->get('amount',null);
		
		if($amount){
			$payrexx = new \Payrexx\Payrexx('offerten-365', 'UpLbfbsipKPy2UyjR1zjXu2vXaVqkW');
			 
			$gateway = new \Payrexx\Models\Request\Gateway();

			$gateway->setAmount(15 * 100);

			$gateway->setCurrency('CHF');


			$gateway->setSuccessRedirectUrl('https://www.merchant-website.com/success');
			$gateway->setFailedRedirectUrl('https://www.merchant-website.com/failed');
			$gateway->setCancelRedirectUrl('https://www.merchant-website.com/cancel');

			$gateway->setPsp([]);

			$gateway->setPreAuthorization(false);

			$gateway->setReservation(false);

			$gateway->setReferenceId(975382);

			try {
				$response = $payrexx->create($gateway);
				var_dump($response);
			} catch (\Payrexx\PayrexxException $e) {
				print $e->getMessage();
			}		
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*
		
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
		*/

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
