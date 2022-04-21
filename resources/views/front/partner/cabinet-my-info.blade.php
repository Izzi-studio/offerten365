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
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    Success!
                                </div>
                            @endif
                            <form enctype="multipart/form-data" class="account-content__inner acc-company-profile" action="{{route('partner.updateMyInfo')}}" method="post" id="partner-info-form">
                                @csrf
                                <input type="hidden" name="new_request_update" value="false">
                                <h4>Firmen-ID: {{auth()->user()->id}}</h4>
                                <div class="acc-company-profile__block acc-company-profile__photo">
                                    @if(auth()->user()->avatar)
                                        <img class="acc-company-profile__photo-img js-photo-result"  src="{{env('FRONT_PATH_AVATAR')}}{{auth()->user()->avatar}}" alt="">
                                    @else
                                        <img class="acc-company-profile__photo-img js-photo-result" src="/images/no-avatar.webp" alt="">
                                    @endif
                                    <label class="acc-company-profile__change-photo">
                                        <input class="js-input-photo" type="file" name="avatar" accept="image/jpeg, image/png">
                                        <p class="acc-company-profile__txt">Foto ändern</p>
                                    </label>
                                </div>
                                <div class="acc-company-profile__block acc-company-profile__wrap">
                                    <div class="form-field">
                                        <p class="form-field__name">Firma</p>
                                        <input 
                                            value="{{auth()->user()->company}}" 
                                            type="text" 
                                            name="company" 
                                            placeholder="Formula 1" 
                                            required 
                                            data-initial-value="{{auth()->user()->company}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('company')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <p class="form-field__name">Telefon</p>
                                        <input 
                                            value="{{auth()->user()->phone}}" 
                                            type="tel" 
                                            placeholder="044 325 786 22" 
                                            name="phone" 
                                            required 
                                            data-initial-value="{{auth()->user()->phone}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('phone')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <p class="form-field__name">Vorname*</p>
                                        <input 
                                            value="{{auth()->user()->name}}" 
                                            type="text" 
                                            placeholder="Vorname*" 
                                            name="name" 
                                            required 
                                            data-initial-value="{{auth()->user()->name}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <p class="form-field__name">Nachname</p>
                                        <input 
                                            value="{{auth()->user()->lastname}}" 
                                            type="text" 
                                            placeholder="Formula 1" 
                                            name="lastname" 
                                            required 
                                            data-initial-value="{{auth()->user()->lastname}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('lastname')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-field">
                                        <p class="form-field__name">PLZ</p>
                                        <input 
                                            value="{{auth()->user()->postcode}}" 
                                            type="number" 
                                            placeholder="PLZ" 
                                            name="postcode" 
                                            required 
                                            data-initial-value="{{auth()->user()->postcode}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('postcode')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-field">
                                        <p class="form-field__name">Ort</p>
                                        <input 
                                            value="{{auth()->user()->city}}" 
                                            type="text" 
                                            placeholder="Ort" 
                                            name="city" 
                                            required 
                                            data-initial-value="{{auth()->user()->city}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('city')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-field">
                                        <p class="form-field__name">Strasse</p>
                                        <input 
                                            value="{{auth()->user()->street}}" 
                                            type="text" 
                                            placeholder="Strasse" 
                                            name="street" 
                                            required 
                                            data-initial-value="{{auth()->user()->street}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('street')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-field">
                                        <p class="form-field__name">Hausnummer</p>
                                        <input 
                                            value="{{auth()->user()->house}}" 
                                            type="text" 
                                            placeholder="Hausnummer" 
                                            name="house" 
                                            required 
                                            data-initial-value="{{auth()->user()->house}}" 
                                            class="js-partner-info-check-field"
                                        >
                                        @error('house')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="acc-company-profile__block row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            @foreach($typesofjobs as $jobtype)
                                                <div class="col-sm-6">
                                                    <label class="custom-checkbox">
                                                        <input name="types_of_jobs[]" value="{{$jobtype->id}}" @if($jobtype->checked) checked @endif type="checkbox" />
                                                        <span class="custom-checkbox__txt">{{__('front.'.$jobtype->name)}}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('types_of_jobs')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="acc-company-profile__block">
                                    <h3 class="acc-company-profile__title">Wählen Sie Ihre Gebiete</h3>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row align-items-center">
                                                @foreach($regions as $region)
                                                <div class="col-sm-6">
                                                    <label class="custom-checkbox">
                                                        <input name="region_ids[]" type="checkbox" @if($region->checked) checked @endif value="{{$region->id}}">
                                                        <span class="custom-checkbox__txt">{{__('front.'.$region->name)}}</span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                            @error('region_ids')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="acc-company-profile__block">
                                    <input class="btn" type="submit" value="Speichern">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
