

@component('mail::message')
# Vielen Danke für Ihre Anfrage

Gruezi, {{$user->name}}<br> 
Hier finden Sie Ihren Anmeldenamen sowie ein automatisch generiertes Passwort. Auf unserer Webseite können Sie Ihre Anfrage verwalten, Ihr Passwort ändern, Aufträge annehmen und vieles mehr.<br>

Ihre Anmeldung {{$user->email}}<br> 
Ihr Passwort {{$password}}<br> 

@component('mail::button', ['url' => 'https://offerten-365.ch/login'])
Zur Website
@endcomponent  

Ihr Offerten 365 Team<br>
@endcomponent 