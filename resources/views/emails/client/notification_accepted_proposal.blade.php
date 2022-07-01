

@component('mail::message')
 
Grüezi {{$user->name}} {{$user->lastname}}<br>,
<br>
Ihre Anfrage wurde von einem Unternehmen angenommen. Sie erhalten demnächst eine Kontaktaufnahme.<br>
<br>
Unsere Empfehlung<br>
Vereinbaren Sie mit dem Unternehmen eine Besichtigung. Nach der Begutachtung Ihrer Unterkunft können Sie im besten Fall mit dem Unternehmen einen Festpreis vereinbaren. So gibt es keine bösen Überraschungen auf beiden Seiten.<br>

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zum Login
@endcomponent

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent
