@component('mail::message')
# {{$type}}

<!-- transfer START -->
@if($proposal->type_job_id == 1)
<p>
    <strong>Adressen</strong><br>
    Von {{__('front.'.$proposal->getRegion->name)}}, {{$proposal->additional_info->from->street}} {{$proposal->additional_info->from->number}}, {{$proposal->additional_info->from->zip}}, {{$proposal->additional_info->from->city}}.<br />
    Nach {{__('front.'.$proposal->additional_info->to->region_name)}}, {{$proposal->additional_info->to->street}} {{$proposal->additional_info->to->number}}, {{$proposal->additional_info->to->zip}}, {{$proposal->additional_info->to->city}}.
</p>
<p>
    <strong>Termine</strong><br>
    {{$proposal->date_start->format('d.m.Y')}}
</p>
<p>
    <strong>Auszug</strong><br>
    {{$proposal->additional_info->from->house_type}}, {{$proposal->additional_info->from->square}} m2, {{$proposal->additional_info->from->rooms}} Zimmer, {{$proposal->additional_info->from->floor}} Stock, {{$proposal->additional_info->from->lift}}
</p>
<p>
    <strong>Einzug</strong><br>
    {{$proposal->additional_info->to->house_type}}, {{$proposal->additional_info->to->square}} m2, {{$proposal->additional_info->to->floor}} Stock, {{$proposal->additional_info->to->lift}}
</p>
<p>
    <strong>Flexibel</strong><br>
    {{$proposal->additional_info->from->dayrange}}
</p>
@if(isset($proposal->additional_info->from->other))
<p>
    <strong>Andere Info</strong><br>
    @foreach(explode(',',str_replace(array('[',']'),array('',''),$proposal->additional_info->from->other)) as $other) {{$other}}, @endforeach
</p>
@endif
<p>
    <strong>Bemerkungen</strong><br>
    {{$proposal->description}}
</p>
<p>
    <strong>Kontaktdaten</strong><br>
    {{$proposal->getUser->name}} {{$proposal->getUser->lastname}}, Telefon {{$proposal->getUser->phone}}, {{$proposal->getUser->email}}
</p>
@if(isset($proposal->getUser->availability))
<p>
    <strong>Erreichbarkeit</strong><br>
    {{$proposal->getUser->availability}}
</p>
@endif
@endif
<!-- transfer END -->

<!-- cleaning START -->
@if($proposal->type_job_id == 2)
<p>
    <strong>Adressen</strong><br>
    {{__('front.'.$proposal->getRegion->name)}}, {{$proposal->additional_info->street}} {{$proposal->additional_info->number}}, {{$proposal->additional_info->zip}}, {{$proposal->additional_info->city}}.
</p>
<p>
    <strong>Termine</strong><br>
    {{$proposal->date_start->format('d.m.Y')}}
</p>
<p>
    <strong>Flexibel</strong><br>
    {{$proposal->additional_info->dayrange}}
</p>
<p>
    <strong>Haus</strong><br>
    {{$proposal->additional_info->cleaning}}, {{$proposal->additional_info->windows}} Fenster, {{$proposal->additional_info->shower_wc}}, {{$proposal->additional_info->bath_wc}}, {{$proposal->additional_info->wc}}<br>
    {{$proposal->additional_info->house_type}}, {{$proposal->additional_info->square}} m2, {{$proposal->additional_info->rooms}} Zimmer, {{$proposal->additional_info->floor}} Stock, {{$proposal->additional_info->lift}}
</p>
<p>
    <strong>Bodentyp</strong><br>
    {{$proposal->additional_info->soil_type}}
</p>
<p>
    <strong>Fenstergröße</strong><br>
    {{$proposal->additional_info->window_size}}
</p>
@if(isset($proposal->additional_info->other))
<p>
    <strong>Andere Info</strong><br>
    @foreach(explode(',',str_replace(array('[',']'),array('',''),$proposal->additional_info->other)) as $other) {{$other}}, @endforeach
</p>
@endif
<p>
    <strong>Bemerkungen</strong><br>
    {{$proposal->description}}
</p>
<p>
    <strong>Kontaktdaten</strong><br>
    {{$proposal->getUser->name}} {{$proposal->getUser->lastname}}, Telefon {{$proposal->getUser->phone}}, {{$proposal->getUser->email}}
</p>
@if(isset($proposal->getUser->availability))
<p>
    <strong>Erreichbarkeit</strong><br>
    {{$proposal->getUser->availability}}
</p>
@endif
@endif
<!-- cleaning END -->

<!-- transfer+cleaning START -->
@if($proposal->type_job_id == 3)
<p>
    <strong>Adressen</strong><br>
    Von {{__('front.'.$proposal->getRegion->name)}}, {{$proposal->additional_info->from->street}} {{$proposal->additional_info->from->number}}, {{$proposal->additional_info->from->zip}}, {{$proposal->additional_info->from->city}}.<br />
    Nach {{__('front.'.$proposal->additional_info->to->region_name)}}, {{$proposal->additional_info->to->street}} {{$proposal->additional_info->to->number}}, {{$proposal->additional_info->to->zip}}, {{$proposal->additional_info->to->city}}.
</p>
<p>
    <strong>Termine</strong><br>
    {{$proposal->date_start->format('d.m.Y')}}
</p>
<p>
    <strong>Flexibel</strong><br>
    {{$proposal->additional_info->from->dayrange}}
</p>
<p>
    <strong>Auszug</strong><br>
    {{$proposal->additional_info->from->house_type}}, {{$proposal->additional_info->from->square}} m2, {{$proposal->additional_info->from->rooms}} Zimmer, {{$proposal->additional_info->from->floor}} Stock, {{$proposal->additional_info->from->lift}}
</p>
<p>
    <strong>Einzug</strong><br>
    {{$proposal->additional_info->to->house_type}}, {{$proposal->additional_info->to->square}} m2, {{$proposal->additional_info->to->floor}} Stock, {{$proposal->additional_info->to->lift}}
</p>
<p>
    <strong>Bodentyp</strong><br>
    {{$proposal->additional_info->soil_type}}
</p>
<p>
    <strong>Fenstergröße</strong><br>
    {{$proposal->additional_info->window_size}}
</p>
<p>
    <strong>Bodentyp</strong><br>
    {{$proposal->additional_info->soil_type}}
</p>
<p>
    <strong>Fenstergröße</strong><br>
    {{$proposal->additional_info->window_size}}
</p>
@if(isset($proposal->additional_info->from->other))
<p>
    <strong>Andere Info</strong><br>
    @foreach(explode(',',str_replace(array('[',']'),array('',''),$proposal->additional_info->from->other)) as $other) {{$other}}, @endforeach
</p>
@endif
<p>
    <strong>Bemerkungen</strong><br>
    {{$proposal->description}}
</p>
<p>
    <strong>Kontaktdaten</strong><br>
    {{$proposal->getUser->name}} {{$proposal->getUser->lastname}}, Telefon {{$proposal->getUser->phone}}, {{$proposal->getUser->email}}
</p>
@if(isset($proposal->getUser->availability))
<p>
    <strong>Erreichbarkeit</strong><br>
    {{$proposal->getUser->availability}}
</p>
@endif
@endif
<!-- transfer+cleaning END -->

<!-- painting START -->
@if($proposal->type_job_id == 4)
<p>
    <strong>Adressen</strong><br>
    {{__('front.'.$proposal->getRegion->name)}}, {{$proposal->additional_info->street}} {{$proposal->additional_info->number}}, {{$proposal->additional_info->zip}}, {{$proposal->additional_info->city}}.
</p>
<p>
    <strong>Termine</strong><br>
    {{$proposal->date_start->format('d.m.Y')}}
</p>
<p>
    <strong>Flexibel</strong><br>
    {{$proposal->additional_info->dayrange}}
</p>
<p>
    <strong>Malerarbeiten innen</strong><br>
    {{ implode(', ', json_decode($proposal->additional_info->painting_work_inside)) }}
</p>
<p>
    <strong>Malerarbeiten außen</strong><br>
    {{ implode(', ', json_decode($proposal->additional_info->painting_work_outside)) }}
</p>
<p>
    <strong>Bemerkungen</strong><br>
    {{$proposal->description}}
</p>
<p>
    <strong>Kontaktdaten</strong><br>
    {{$proposal->getUser->name}} {{$proposal->getUser->lastname}}, Telefon {{$proposal->getUser->phone}}, {{$proposal->getUser->email}}
</p>
@if(isset($proposal->getUser->availability))
<p>
    <strong>Erreichbarkeit</strong><br>
    {{$proposal->getUser->availability}}
</p>
@endif
@endif
<!-- painting END -->

@component('mail::button', ['url' => 'https://offerten-365.ch/info'])
Zur Website
@endcomponent

Ihr Offerten 365 Team<br>
@endcomponent
