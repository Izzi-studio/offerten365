@component('mail::message')
# {{$type}}

Grüezi {{$proposal->getUser->company}},<br>
<br>
Sie haben eine neue Anfrage erhalten.<br>
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
<br>
<strong>Ist die Anfrage Interessant? Loggen Sie sich ein, um die Anfrage annehmen zu können:</strong>

@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zum Login
@endcomponent

Unsere Empfehlung:<br>
Kontaktieren Sie schnellstmöglich den Kunden. Führen Sie eine kundenorientierte Beratung durch. Beziehen Sie sich im Kundengespräch auf Offerten 365 als Vermittler der Kontaktangaben. Erstellen Sie zeitnah eine passende Offerte für den Kunden.<br>

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent
