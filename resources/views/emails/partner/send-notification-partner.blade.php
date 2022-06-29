@component('mail::message')

{{$text}}

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent