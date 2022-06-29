@component('mail::message')
Grüezi {{$proposal->getUser->company}},<br>
<br>
Folgende Anfrage wurde aus Ihrem Konto gelöscht. Für diese Anfrage entstehen keine Kosten.<br>
<br>
@if($proposal->type_job_id == 1)
{{$proposal->date_start->format('d.m.Y')}}

UMZUG von: {{$proposal->getRegion->name}}, PLZ {{$proposal->additional_info->from->zip}}  >  {{__('front.'.$proposal->additional_info->to->region_name)}}, PLZ {{$proposal->additional_info->to->zip}}
@endif

@if($proposal->type_job_id == 2)
{{$proposal->date_start->format('d.m.Y')}}

REINIGUNG, {{$proposal->getRegion->name}}, PLZ {{$proposal->additional_info->zip}}
@endif

@if($proposal->type_job_id == 3)
{{$proposal->date_start->format('d.m.Y')}}

UMZUG+REINIGUNG von: {{$proposal->getRegion->name}}, PLZ {{$proposal->additional_info->from->zip}}  >  {{__('front.'.$proposal->additional_info->to->region_name)}}, PLZ {{$proposal->additional_info->to->zip}}
@endif

@if($proposal->type_job_id == 4)
{{$proposal->date_start->format('d.m.Y')}}

MALERARBEITEN, {{$proposal->getRegion->name}}, PLZ {{$proposal->additional_info->zip}}
@endif
<br>
Zur Ihrer Info: Die Löschung der Anfrage ist bereits vollzogen. Sie müssen nichts weiter beachten.

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zum Partnerbereich
@endcomponent

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent
