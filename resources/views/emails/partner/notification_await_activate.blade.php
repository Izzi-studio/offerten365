@component('mail::message')
# Einführung

Hi, {{$user->name}}<br>
Vielen Dank für Ihre Registrierung!<br>
Sobald der Administrator Ihre Registrierung bestätigt hat, können Sie auf alle Funktionen zugreifen. 

@component('mail::button', ['url' => 'https://offerten-365.ch'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent