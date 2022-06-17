@component('mail::message')
Hallo {{$name}},

Anfrage

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

wurde geschlossen. 

@component('mail::button', ['url' => 'https://offerten-365.ch'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
