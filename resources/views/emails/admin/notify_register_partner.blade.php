@component('mail::message')

Neuer Partner, {{$user->name}} <br>
Unternehmen: {{$user->company}}<br> 
E-Mail {{$user->email}}<br> 

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent  

Ihr Offerten 365 Team<br>
@endcomponent