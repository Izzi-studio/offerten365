@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="account headerHeightMarginTop">
            <div class="container">
                @include('front.partner.top')
                <div class="row">
                    <div class="col-lg-4">
                        @include('front.partner.leftmenu')
                        @include('front.partner.prices')
                    </div>
                    <div class="col-lg-8">
                        <div class="account-content" id="section-account">
                            <div class="account-content__inner acc-billing">
                                <form class="acc-billing__form" action="#">
                                    <input class="acc-billing__form-field" type="text" placeholder="Suchen">
                                    <button class="acc-billing__form-btn" type="submit">
                                        <svg class="ico search">
                                            <use xlink:href="/images/sprite.svg#search"></use>
                                        </svg>
                                    </button>
                                </form>
                                <div class="acc-billing__inner">
                                    @foreach($reviews as $review)
                                        <div class="acc-billing-item acc-billing__acc-billing-item">
                                            @if($review->getProposal->type_job_id == 1)
                                                @include('front.includes.transfer',[
                                                    'date_start'=> $review->getProposal->date_start,
                                                    'additional_info'=> $review->getProposal->additional_info,
                                                    'from'=>$review->getProposal->getRegion->name,
                                                    'showbuttons'=>$showactionbuttons
                                                ])
                                            @endif
                                            @if($review->getProposal->type_job_id == 2)
                                                @include('front.includes.cleaning',[
                                                'additional_info'=> $review->getProposal->additional_info,
                                                'region'=>$review->getProposal->getRegion->name,
                                                'date_start'=> $review->getProposal->date_start,
                                                'showbuttons'=>$showactionbuttons
                                                    ])
                                            @endif
                                            @if($review->getProposal->type_job_id == 3)
                                                @include('front.includes.transfer-cleaning',[
                                                    'date_start'=> $review->getProposal->date_start,
                                                    'additional_info'=> $review->getProposal->additional_info,
                                                    'from'=>$review->getProposal->getRegion->name,
                                                    'showbuttons'=>$showactionbuttons
                                                ])
                                            @endif
                                            @if($review->getProposal->type_job_id == 4)
                                                @include('front.includes.painting-work',[
                                                'additional_info'=> $review->getProposal->additional_info,
                                                'region'=>$review->getProposal->getRegion->name,
                                                'date_start'=> $review->getProposal->date_start,
                                                'showbuttons'=>$showactionbuttons
                                                ])
                                            @endif
                                        </div>
                                        <div class="review acc-billing__acc-billing-item">
                                            <img class="review__img"
                                                 src="{{env('FRONT_PATH_AVATAR')}}{{$review->getPostedUser->avatar}}"
                                                 alt="">
                                            <div class="review__info">
                                                <h3 class="review__name">{{$review->getPostedUser->name}}
                                                    , {{$review->created_at->format('Y-m-d')}}</h3>
                                                <div
                                                    class="stars-rating stars-rating_fullness_{{$review->rating}} review__stars-rating"></div>
                                                <p class="review__txt">{{$review->message}}</p>
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

@endsection
