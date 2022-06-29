@component('mail::message')

Grüezi {{$proposal->getUser->company}},<br>
<br>
Ihr Konto wurde wegen ausstehender Rechnung gesperrt.<br>
Bitte bezahlen Sie die offene Rechnung. 
<br>
Sobald Ihre Rechnung bezahlt wurde, aktivieren wir umgehend Ihr Konto.

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent
