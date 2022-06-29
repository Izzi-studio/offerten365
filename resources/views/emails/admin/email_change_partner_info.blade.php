@component('mail::message')

Die Firma {{ $partner->company }} hat eine Anfrage zur Änderung ihrer Daten eingereicht.<br>

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent  

Ihr Offerten 365 Team<br>
@endcomponent
