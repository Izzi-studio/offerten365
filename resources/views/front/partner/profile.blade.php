@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="company-info headerHeightMarginTop defaultPaddings">
            <div class="container company-info__container">
                <a class="go-back-btn go-back-btn_margin_bottom" href="#" onclick="window.history.go(-1); return false;"></a>
                <h1 class="section-title company-info__section-title">{{$user->company}}</h1>
                <img class="company-info__logo" src="{{env('FRONT_PATH_AVATAR')}}{{$user->avatar}}" alt="">
                <div class="company-info__contact">
                    <a class="company-info__contact-item company-info__contact-item_tel" href="tel:{{$user->phone}}">{{$user->phone}}</a>
                    <a class="company-info__contact-item company-info__contact-item_email" href="mailto:{{$user->email}}">{{$user->email}}</a>
                </div>
                <div class="company-info__block">
                    <h2 class="company-info__block-title">Arbeiten</h2>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row company-info__items">
                                @foreach($typesofjobs as $typeofjob)
                                    @if($typeofjob->checked)
                                        <div class="col-md-4">
                                            <div class="company-info__item">{{__('front.'.$typeofjob->name)}}</div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="company-info__block">
                    <h2 class="company-info__block-title">Gebiete</h2>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row company-info__items">
                                @foreach($regions as $region)
                                    @if($region->checked)
                                        <div class="col-md-4">
                                            <div class="company-info__item">{{__('front.'.$region->name)}}</div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="company-info__block">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="company-info__reviews" data-simplebar data-simplebar-auto-hide="false">
                                @foreach($reviews as $review)
                                    <div class="review company-info__review">
                                        @if($review->getPostedUser->avatar)
                                            <img class="review__img" src="{{env('FRONT_PATH_AVATAR')}}{{$review->getPostedUser->avatar}}" alt="">
                                        @else
                                            <img style="width: 128px" class="review__img" src="/images/no-avatar.jpeg" alt="">
                                        @endif
                                        <div class="review__info">
                                            <h3 class="review__name">{{$review->getPostedUser->name}}, {{$review->created_at->format('d.m.Y')}}</h3>
                                            <div class="stars-rating stars-rating_fullness_{{$review->rating}} review__stars-rating"></div>
                                            <p class="review__txt">{{$review->message}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="company-info__block">
                    <h2 class="company-info__block-title">Eine Bewertung schreiben</h2>
                    <form class="feedback-form company-info__feedback-form" method="post" action="{{route('writeReview',[$user->profile_slug, $proposal->id])}}">
                        @csrf
                        <div class="feedback-form__rating">
                            <input @if(old('rating')=='5') checked @endif type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
                            <input @if(old('rating')=='4') checked @endif type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
                            <input @if(old('rating')=='3') checked @endif type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
                            <input @if(old('rating')=='2') checked @endif type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
                            <input @if(old('rating')=='1') checked @endif type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
                        </div>
                        @error('rating')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="form-field feedback-form__form-field">
                            <p class="form-field__name">Bewertung*</p>
                            <textarea class="@error('message') is-invalid @enderror" name="message" placeholder="Bewertung">{{old('message')}}</textarea>
                            @error('message')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <input class="btn feedback-form__btn" type="submit" value="Bewertung lassen">
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection
