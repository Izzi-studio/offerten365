@component('mail::message')
# {{$type}}

Hallo {{$name}}. Sie haben neue Vorschläge erhalten.

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
    @php $types = str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->worktype) @endphp

<strong>Ort</strong> {{__('front.'.$proposal->getRegion->name)}} {{$proposal->additional_info->city}} <br />
<b>Termine</b> {{$proposal->date_start->format('d.m.Y')}}<br>
<b>Typ der Arbeit</b> {{$types}}<br>


@endif

@component('mail::button', ['url' => 'https://offerten-365.ch/info'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
