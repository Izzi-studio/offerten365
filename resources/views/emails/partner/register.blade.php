@component('mail::message')

Hi, {{$user->name}}<br> 
Ihre Anmeldung {{$user->email}}<br> 
Ihr Passwort {{$password}}<br> 

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent  

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent
