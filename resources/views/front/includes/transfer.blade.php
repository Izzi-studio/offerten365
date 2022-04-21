<div class="acc-billing-item__top-line">
    @if(auth()->user()->isPartner())
        <h4 class="acc-billing-item__title">Umzug</h4>
    @else
        <h4 class="acc-billing-item__title">{{$from}} > {{__('front.'.$additional_info->to->region_name)}}</h4>
    @endif
    <p class="acc-billing-item__date">{{$date_start->format('d-m-Y')}}</p>
</div>
@if(auth()->user()->isPartner())
    <p class="acc-billing-item__path">{{$from}} > {{__('front.'.$additional_info->to->region_name)}}</p>
@endif
<div class="acc-billing-item__characteristic">
    <p class="acc-billing-item__characteristic-txt">{{$additional_info->from->rooms}} Zimmer, {{$additional_info->from->floor}} Stock</p>
    @if(auth()->user()->isPartner())

        @if($showactionbuttons)
            <div class="acc-billing-item__actions">
                <a class="acc-billing-item__btn-accept" href="{{route('partner.processProposal',[$proposal_id,'accepted'])}}">Annehmen<br> (Für {{ Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_transfer') }} Chf)</a>

                <a class="acc-billing-item__btn-cancel" href="{{route('partner.processProposal',[$proposal_id,'rejected'])}}">Absagen</a>
            </div>
        @endif
		@if($showdownloadbuttons)
                <a class="acc-billing-item__download" href="{{route('partner.downloadProposals',$proposal_id)}}">DOWNLOAD</a>
        @endif
    @endif
</div>
@if(auth()->user()->isClient())
<div class="acc-billing-item__actions2">
    <button class="acc-billing-item__btn-offers-company">Angebote von unternehmen</button>
        <a  href="{{route('deleteRequest',$proposal_id)}}" class="acc-billing-item__btn-cancel2" data-canceled="Abgesagte">ABSAGEN
            <svg class="ico x_v2">
                <use xlink:href="/images/sprite.svg#x_v2"></use>
            </svg>
        </a>
</div>
@endif

@if(isset($add_info) && $add_info)
<div class="acc-billing-item__slide-content">
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Adressen	</p>
        <p class="acc-billing-item__slide-content-r">Von {{$additional_info->from->street}} {{$additional_info->from->number}}, {{$additional_info->from->zip}}, {{$additional_info->from->city}}.<br />
             Nach {{$additional_info->to->street}} {{$additional_info->to->number}}, {{$additional_info->to->zip}}, {{$additional_info->to->city}}.</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Termine 	</p>
        <p class="acc-billing-item__slide-content-r">{{$date_start->format('d.m.Y')}}</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Auszug 	</p>
        <p class="acc-billing-item__slide-content-r">{{$additional_info->from->house_type}}, {{$additional_info->from->square}} m2, {{$additional_info->from->rooms}} Zimmer, {{$additional_info->from->floor}} Stock, {{$additional_info->from->lift}}</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Einzug	 	</p>
        <p class="acc-billing-item__slide-content-r">{{$additional_info->to->house_type}}, {{$additional_info->to->square}} m2, {{$additional_info->to->floor}} Stock, {{$additional_info->to->lift}}</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Flexibel  	</p>
        <p class="acc-billing-item__slide-content-r">{{$additional_info->from->dayrange}}</p>
    </div>
	@if(isset($additional_info->from->other))
		<div class="acc-billing-item__slide-content-row">
			<p class="acc-billing-item__slide-content-l"><span></span>Andere Info 	</p>
			<p class="acc-billing-item__slide-content-r">@foreach(explode(',',str_replace(array('[',']'),array('',''),$additional_info->from->other)) as $other) {{$other}}, @endforeach</p>
		</div>
	@endif
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Bemerkungen 	</p>
        <p class="acc-billing-item__slide-content-r">{{$proposal->description}}</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Kontaktdaten 	</p>
        <p class="acc-billing-item__slide-content-r">{{$client->name}} {{$client->lastname}}, Telefon {{$client->phone}}, {{$client->email}}</p>
    </div>
	@if(isset($client->availability))
		<div class="acc-billing-item__slide-content-row">
			<p class="acc-billing-item__slide-content-l"><span></span>Erreichbarkeit 	</p>
			<p class="acc-billing-item__slide-content-r">{{$client->availability}}</p>
		</div>
	@endif
</div>
@endif

