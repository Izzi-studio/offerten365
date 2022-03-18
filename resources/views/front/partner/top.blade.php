<div class="account__top-line">
    <h1 class="section-title account__section-title">Mein Konto</h1>
	@if(auth()->user()->status_pay == 1)
		<p class="account__balance">CHF: {{auth()->user()->coins}}</p>
	@endif
</div>
 