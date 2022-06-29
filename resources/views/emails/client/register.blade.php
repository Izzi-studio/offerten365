

@component('mail::message')
# Vielen Danke für Ihre Anfrage

Grüezi, {{$user->name}} {{$user->lastname}}<br> 
<br>
Hier finden Sie Ihren Anmeldenamen sowie ein automatisch generiertes Passwort. Auf unserer Webseite können Sie Ihre Anfrage verwalten, Ihr Passwort ändern, Aufträge annehmen und vieles mehr.<br>
<br>
Bitte speichern Sie sich Ihre Daten auch für zukünftige Anfragen:<br>
Ihre Anmeldung {{$user->email}}<br> 
Ihr Passwort {{$password}}<br> 
<br>
Ihre Suche hat ein Ende! Sie erhalten innert kürzester Zeit <strong>auf Basis Ihrer Angaben</strong> mehrere Offerten von lokalen Unternehmen. Vergleichen Sie eingehende Offerten und wählen Sie dann Ihren Favoriten aus.<br>
<br>
Hier können Sie sich anmelden und Ihre Anfrage verwalten:<br>

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info/login'])
Zur Anmeldung
@endcomponent  

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent 