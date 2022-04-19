@component('mail::message')
# Einführung

Hi, {{$user->name}}<br>
Ihr Konto wurde gesperrt.<br>
Bitte bezahlen Sie die Rechnung. 

@component('mail::button', ['url' => 'https://offerten-365.ch'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
