

@component('mail::message')

 
Hallo, {{$name}}<br> Ihr Vorschlag wurde von einem Unternehmen angenommen.

@component('mail::button', ['url' => 'https://offerten-365.ch'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
