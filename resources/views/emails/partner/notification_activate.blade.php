@component('mail::message')
# Einführung

Hi, {{$user->name}}<br>
Ihre Registrierung wurde erfolgreich bestätigt!<br>
Jetzt haben Sie Zugriff auf alle Funktionen. 

@component('mail::button', ['url' => 'https://offerten-365.ch'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
