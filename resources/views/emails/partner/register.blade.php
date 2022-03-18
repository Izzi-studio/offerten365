@component('mail::message')
# Einführung

Hi, {{$user->name}}<br> 
Ihre Anmeldung {{$user->email}}<br> 
Ihr Passwort {{$password}}<br> 

@component('mail::button', ['url' => 'https://offerten-365.ch/info'])
Zur Website
@endcomponent  

Ihr Offerten 365 Team<br>
@endcomponent
