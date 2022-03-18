@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="account headerHeightMarginTop">
            <div class="container">
                <div class="account__top-line">
                    <h1 class="section-title account__section-title">Mein Konto</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        @include('front.client.leftmenu')
                    </div>
                    <div class="col-lg-8">
                        <div class="account-content">
                            <div class="account-content__inner acc-billing">
                                <form class="acc-billing__form" action="#">
                                    <input class="acc-billing__form-field" type="text" id="minisearch" placeholder="Suche nach Region">
                                    <button class="acc-billing__form-btn" type="submit">
                                        <svg class="ico search">
                                            <use xlink:href="/images/sprite.svg#search"></use>
                                        </svg>
                                    </button>
                                </form>
                                <div class="acc-billing__inner">
                                    @foreach($proposals as $proposal)
                                        <div class="acc-billing-item acc-billing__acc-billing-item">
                                        <button class="acc-billing-item__btn-info">Anfrage Details</button>
                                        <a class="editbut" href="{{route('client.editProposals',$proposal->id)}}">Bearbeiten</a>
                                            @if($proposal->type_job_id == 1)
                                                @include('front.includes.transfer',[
											        'proposal_id'=> $proposal->id,
                                                    'date_start'=> $proposal->date_start,
                                                    'additional_info'=> $proposal->additional_info,
                                                    'from'=>__('front.'.$proposal->getRegion->name),
                                                    'client'=> $proposal->getUser,
                                                    'comments'=>$proposal->description,
                                                    'add_info'=>true
                                                ])
                                            @endif
                                            @if($proposal->type_job_id == 2)
                                                @include('front.includes.cleaning',[
											    'proposal_id'=> $proposal->id,
                                                'additional_info'=> $proposal->additional_info,
                                                'region'=>__('front.'.$proposal->getRegion->name),
                                                'date_start'=> $proposal->date_start,
                                                'comments'=>$proposal->description,
                                                    'client'=> $proposal->getUser,
                                                    'add_info'=>true
                                                    ])
                                            @endif
                                            @if($proposal->type_job_id == 3)
                                                @include('front.includes.transfer-cleaning',[
											        'proposal_id'=> $proposal->id,
                                                    'date_start'=> $proposal->date_start,
                                                    'additional_info'=> $proposal->additional_info,
                                                    'from'=>__('front.'.$proposal->getRegion->name),
                                                    'comments'=>$proposal->description,
                                                    'client'=> $proposal->getUser,
                                                    'add_info'=>true
                                                ])
                                            @endif
                                            @if($proposal->type_job_id == 4)
                                                @include('front.includes.painting-work',[
											    'proposal_id'=> $proposal->id,
                                                'additional_info'=> $proposal->additional_info,
                                                'region'=>__('front.'.$proposal->getRegion->name),
                                                'date_start'=> $proposal->date_start,
                                                'comments'=>$proposal->description,
                                                    'client'=> $proposal->getUser,
                                                    'add_info'=>true
                                                    ])
                                            @endif
                                        <div class="acc-billing-item__slide-content2 acc-offers-company">
                                            @foreach($proposal->getResponded as $partner)
                                                <div class="acc-offers-company__item">
                                                    <div class="acc-offers-company__row">
                                                        <div class="acc-offers-company__l"><img class="acc-offers-company__img" width="128" src="{{env('FRONT_PATH_AVATAR')}}{{$partner->getPartner->avatar}}" alt=""></div>
                                                        <div class="acc-offers-company__r acc-offers-company__r_right"><a class="acc-offers-company__link-profile" href="{{route('showProfilePartner',[$partner->getPartner->profile_slug,$proposal->id])}}">PROFIL ANZEIGEN</a></div>
                                                    </div>
                                                    <div class="acc-offers-company__row">
                                                        <div class="acc-offers-company__l">
                                                            <p class="acc-offers-company__title">{{$partner->getPartner->company}}</p>
                                                            <p class="acc-offers-company__location">{{$partner->getPartner->name}}</p>
                                                            @if($partner->getReviewsCount() > 0)
                                                                <div class="acc-offers-company__stars-rating">
                                                                    <div class="stars-rating stars-rating_fullness_{{strtok($partner->getRatingAVG(),'.')}}"></div>
                                                                    <a class="acc-offers-company__stars-rating-txt" href="#">{{$partner->getReviewsCount()}} Bewertungen</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="acc-offers-company__r">
                                                            <a class="acc-offers-company__contact-item acc-offers-company__contact-item_tel" href="tel:{{$partner->getPartner->phone}}">{{$partner->getPartner->phone}}</a>
                                                            <a class="acc-offers-company__contact-item acc-offers-company__contact-item_tel_email" href="mailto:{{$partner->getPartner->email}}">{{$partner->getPartner->email}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<style>
    .editbut{
        background: #D32F2F;
        padding:5px 15px;
        color:#fff;
        text-decoration:none;
        border-radius:10px;
        display: inline-block;
        margin-bottom:10px;
    }
</style>
@endsection
