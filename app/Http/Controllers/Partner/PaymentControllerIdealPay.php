<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;
use App\Models\Payment;
use App\Models\PaymentIdeaPay;
use Log;
use Auth;
use  App\Models\User;
class PaymentControllerIdealPay extends Controller
{


    public function index(Request $request){

		$amount = $request->get('amount',null);

		if($amount){

			$refId = (int)PaymentIdeaPay::max('reference_id') + 1;
			$payrexx = new \Payrexx\Payrexx('offerten-365', 'cADNaDY0jPHw2zMaBvhY8u7cICOFey','', 'ideal-pay.ch');

			//$signatureCheck = new \Payrexx\Models\Request\SignatureCheck();
			//$response = $payrexx->getOne($signatureCheck);
			//dd($response);


			$gateway = new \Payrexx\Models\Request\Gateway();

			$gateway->setAmount(str_replace(',','.',$amount) * 100);

			$gateway->setCurrency('CHF');


			$gateway->setSuccessRedirectUrl(route('partner.myInfo'));
			//$gateway->setFailedRedirectUrl('https://www.merchant-website.com/failed');
			//$gateway->setCancelRedirectUrl('https://www.merchant-website.com/cancel');

			$gateway->setPsp([]);

			$gateway->setPreAuthorization(false);

			$gateway->setReservation(false);

			$gateway->setReferenceId($refId);

			$response = $payrexx->create($gateway);


			PaymentIdeaPay::create([
				'reference_id'=>$refId,
				'amount'=>$amount,
				'user_id'=>Auth::ID(),
				'status'=>0,
				'hash'=>$response->getHash(),
			 ]);

			return redirect()->to($response->getLink());

		}

		return view('front.partner.payment',compact(['amount']));

	}

    public function prosessedPayment(Request $request){

		Log::info(request()->all());

		$referenceId = $request->transaction['invoice']['paymentLink']['referenceId'];
		$hash = request()->transaction['invoice']['paymentLink']['hash'];
		$paymentRequestId = request()->transaction['invoice']['paymentRequestId'];
		$transactionId = request()->transaction['id'];
		$transactionUuid = request()->transaction['uuid'];

		$idealPay = PaymentIdeaPay::whereHash($hash)->whereReferenceId($referenceId)->whereStatus(0)->first();

        $idealPay->update(
            [
                'payment_request_id'=> $paymentRequestId,
                'transaction_id'=> $transactionId,
                'transaction_uuid'=> $transactionUuid,
            ]);

		if(!is_null($idealPay) && request()->transaction['status'] == 'confirmed'){
			$user = User::find($idealPay->user_id);
			$user->coins = $user->coins + $idealPay->amount;
			$user->save();

			$idealPay->update(
			[
				'status'=> 1,
			]);
            return response(200);
		}

        return response(404);
	}

}
