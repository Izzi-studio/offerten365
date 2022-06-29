@component('mail::message')

Grüezi {{$proposal->getUser->company}},<br>
<br>
Vielen Dank für Ihre Registrierung!<br> 
Wir bitten Sie um etwas Geduld! Sobald wir Ihre Daten auf Richtigkeit geprüft haben, erhalten Sie eine Bestätigung. Nach erfolgreicher Bestätigung können Sie auf alle Funktionen zugreifen. 

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent