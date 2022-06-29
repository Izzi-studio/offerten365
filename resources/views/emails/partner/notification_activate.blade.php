@component('mail::message')

Grüezi {{$proposal->getUser->company}},<br>
<br>
Ihre Registrierung wurde erfolgreich bestätigt!<br> 
Jetzt haben Sie Zugriff auf alle Funktionen. Wir wünschen Ihnen viel Erfolg.

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent
