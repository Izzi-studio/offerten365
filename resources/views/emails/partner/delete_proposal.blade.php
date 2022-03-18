@component('mail::message')
# Einführung

Hallo {{$name}}, Vorschlag

@if($proposal->type_job_id == 1)
	UMZUG von: {{$proposal->getRegion->name}}  >  {{$proposal->additional_info->to->region_name}}

@endif

@if($proposal->type_job_id == 2)
	REINIGUNG
@endif

@if($proposal->type_job_id == 3)
	UMZUG+REINIGUNG
@endif

@if($proposal->type_job_id == 4)
	MALERARBEITEN 
@endif

wurde geschlossen. 

@component('mail::button', ['url' => 'https://offerten-365.ch'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
