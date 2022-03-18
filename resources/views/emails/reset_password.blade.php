@component('mail::message')
# Einführung

Hallo!<br>
Sie erhalten diese E-Mail, weil wir eine Anfrage zum Zurücksetzen des Passworts für Ihr Konto erhalten haben.<br>

@component('mail::button', ['url' => $url])
Passwort zurücksetzen
@endcomponent  

Dieser Link zum Zurücksetzen des Passworts wird in 60 Minuten ablaufen.<br>
Wenn Sie keine Rücksetzung des Passworts beantragt haben, sind keine weiteren Schritte erforderlich.<br>

Ihr Offerten 365 Team<br>
@endcomponent
