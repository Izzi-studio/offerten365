<div class="acc-billing-item__top-line">
    @if(auth()->user()->isPartner())
        <h4 class="acc-billing-item__title">Malerarbeiten</h4>
    @else
        <h4 class="acc-billing-item__title">{{$region}}</h4>
    @endif
    <p class="acc-billing-item__date">{{$date_start->format('d-m-Y')}}</p>
</div>
@if(auth()->user()->isPartner())
    <p class="acc-billing-item__path">{{$region}}</p>
@endif
<div class="acc-billing-item__characteristic">
    <p class="acc-billing-item__characteristic-txt">
        @if(isset($additional_info->worktype))
            {{ implode(', ', json_decode($additional_info->worktype)) }}
        @endif
    </p>
    @if(auth()->user()->isPartner())
        @if($showactionbuttons)
            <div class="acc-billing-item__actions">
                <a class="acc-billing-item__btn-accept" href="{{route('partner.processProposal',[$proposal_id,'accepted'])}}">Annehmen<br> (Für {{ Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_paint_work') }} Chf)</a>
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

@if(isset($add_info))
<div class="acc-billing-item__slide-content">
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Adresse	</p>
        <p class="acc-billing-item__slide-content-r">{{$additional_info->street}} {{$additional_info->number}}, {{$additional_info->zip}}, {{$additional_info->city}}</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Termine 	</p>
        <p class="acc-billing-item__slide-content-r">{{$date_start->format('d.m.Y')}}</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Flexibel 	</p>
        <p class="acc-billing-item__slide-content-r">{{$additional_info->dayrange}}</p>
    </div>
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Flexibel 	</p>
        <p class="acc-billing-item__slide-content-r">{{$additional_info->dayrange}}</p>
    </div>
    @if(isset($additional_info->painting_work_inside))
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Malerarbeiten innen</p>
        <p class="acc-billing-item__slide-content-r">{{ implode(', ', json_decode($additional_info->painting_work_inside)) }}</p>
    </div>
    @endif
    @if(isset($additional_info->painting_work_outside))
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Malerarbeiten außen</p>
        <p class="acc-billing-item__slide-content-r">{{ implode(', ', json_decode($additional_info->painting_work_outside)) }}</p>
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
    <div class="acc-billing-item__slide-content-row">
        <p class="acc-billing-item__slide-content-l"><span></span>Erreichbarkeit 	</p>
        <p class="acc-billing-item__slide-content-r">{{$client->availability}}</p>
    </div>
</div>
@endif

