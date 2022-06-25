@component('mail::message')
# {{$type}}

Hallo {{$name}}. Sie haben eine neue Anfrage erhalten.

@if($proposal->type_job_id == 1)
<strong>Von</strong> {{__('front.'.$proposal->getRegion->name)}} {{$proposal->additional_info->from->city}}<br />
<strong>Nach</strong> {{__('front.'.$proposal->additional_info->to->region_name)}} {{$proposal->additional_info->to->city}}<br />
<strong>Termine</strong> {{$proposal->date_start->format('d.m.Y')}}<br />
<strong>Zimmeranzahl</strong> {{$proposal->additional_info->from->rooms}}<br />
<strong>Fläche</strong> {{$proposal->additional_info->from->square}}<br />
@endif

@if($proposal->type_job_id == 2)
<strong>Ort</strong> {{__('front.'.$proposal->getRegion->name)}} {{$proposal->additional_info->city}}<br />
<strong>Reinigungstyp</strong> {{$proposal->additional_info->cleaning}}<br />
<strong>Termine</strong> {{$proposal->date_start->format('d.m.Y')}}<br />
<strong>Zimmeranzahl</strong> {{$proposal->additional_info->rooms}}<br />
@endif

@if($proposal->type_job_id == 3)
<strong>Von</strong> {{__('front.'.$proposal->getRegion->name)}} {{$proposal->additional_info->from->city}}<br />
<strong>Nach</strong> {{__('front.'.$proposal->additional_info->to->region_name)}} {{$proposal->additional_info->to->city}}<br />
<strong>Termine</strong> {{$proposal->date_start->format('d.m.Y')}}<br />
<strong>Reinigungstyp</strong> {{$proposal->additional_info->cleaning}}<br />
<strong>Zimmeranzahl</strong> {{$proposal->additional_info->from->rooms}}<br />
@endif

@if($proposal->type_job_id == 4)
<strong>Ort</strong> {{__('front.'.$proposal->getRegion->name)}} {{$proposal->additional_info->city}} <br />
<b>Termine</b> {{$proposal->date_start->format('d.m.Y')}}<br>
@if(isset($proposal->additional_info->worktype))
@php $types = str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->worktype) @endphp
<b>Typ der Arbeit</b> {{$types}}<br>
@endif
@if(isset($proposal->additional_info->painting_work_inside))
    <b>Malerarbeiten innen</b><br> {{ implode(', ', json_decode($proposal->additional_info->painting_work_inside)) }}
@endif
@if(isset($proposal->additional_info->painting_work_outside))
    <b>Malerarbeiten außen</b><br> {{ implode(', ', json_decode($proposal->additional_info->painting_work_outside)) }}
@endif


@endif

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
