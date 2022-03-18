@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="account headerHeightMarginTop">
            <div class="container">
                @include('front.partner.top')
                <div class="row">
                    <div class="col-lg-4">
                        @include('front.partner.leftmenu')
                        @include('front.partner.prices')
                    </div>
                    <div class="col-lg-8">
						<div class="account-content" id="section-account">
							<div class="account-content__inner acc-billing">
@if($amount)
								
								<form id="payment-form" method="POST" action="{{route('partner.payment.make-payment')}}">
								<label for="accountholder-name" class="form-field">
									<p class="form-field__name">Name</p>
									<input id="accountholder-name"  name="accountholder-name" value="{{Auth::user()->name.' '.Auth::user()->lastname}}" type="text">
								</label>

								  <div class="form-field mt-3">
									<label for="ideal-bank-element" class="form-field__name">
									  iDEAL Bank
									</label>
									<div id="ideal-bank-element" class="mt-2">
									  <!-- A Stripe Element will be inserted here. -->
									</div>
									<style>
										#ideal-bank-element {
											background: #EFEFEF;
											border-radius: 6px;
										}
									</style>
								  </div>

								  <button class="btn acc-change-password__btn">Zahlung senden</button>

								  <div id="error-message" role="alert"></div>
								</form>								
								
@else
	<form id="payment-form" method="POST" action="{{route('partner.payment-post')}}">
@csrf
		<label class="form-field" for="accountholder-name">
		  <p class="form-field__name">Betrag</p>
		  <input id="accountholder-name" name="amount" type="text" />
		</label>
		<input class="btn acc-change-password__btn" type="submit" value="Senden" />
	</form>
@endif
							</div>
						</div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
	@if($amount)
			<!-- Stripe JS -->
		<script src="https://js.stripe.com/v3/"></script>
		<script>
		// Stripe API Key
		var stripe = Stripe('pk_live_51JZEfaFnVJuGIOlSWckvE6FlyAowJ7rdosRswVBghEmusRmLdGrxr8DAe8RCCWWk0szIkcUitT0b74FFjmOGWwdy001vRrryN0');
		var elements = stripe.elements();

		var options = {
		  // Custom styling can be passed to options when creating an Element
		  style: {
			base: {
			  padding: '16px 28px',
			  color: '#32325d',
			  fontSize: '16px',
			  '::placeholder': {
				color: '#aab7c4'
			  },
			},
		  },
		};

		// Create an instance of the idealBank Element
		var idealBank = elements.create('idealBank', options);

		// Add an instance of the idealBank Element into
		// the `ideal-bank-element` <div>
		idealBank.mount('#ideal-bank-element');


		var form = document.getElementById('payment-form');
		var accountholderName = document.getElementById('accountholder-name');

		form.addEventListener('submit', function(event) {
		  event.preventDefault();

		  // Redirects away from the client
		  stripe.confirmIdealPayment(
			'{{$PAYMENT_INTENT_CLIENT_SECRET}}',
			{
			  payment_method: {
				ideal: idealBank,
				billing_details: {
				  name: accountholderName.value,
				},
				metadata:{
					user_id: '{{base64_encode(Auth::ID().':'.$amount)}}'
				}
			  },

			  return_url: '{{route('partner.payment.make-payment')}}',
			}
		  );
		});

		</script>
@endif
@endsection
