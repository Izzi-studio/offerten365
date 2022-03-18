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
                            @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form enctype="multipart/form-data" class="account-content__inner acc-company-profile" action="{{route('client.updateMyInfo')}}" method="post">
                                @csrf
                                <div class="acc-company-profile__block acc-company-profile__photo">
                                    @if(auth()->user()->avatar)
                                        <img class="acc-company-profile__photo-img js-photo-result"  src="{{env('FRONT_PATH_AVATAR')}}{{auth()->user()->avatar}}" alt="">
                                    @else
                                        <img class="acc-company-profile__photo-img js-photo-result" src="/images/no-avatar.jpeg" alt="">
                                    @endif
                                    <label class="acc-company-profile__change-photo">
                                        <input class="js-input-photo" type="file" name="avatar" accept="image/jpeg, image/png">
                                        <p class="acc-company-profile__txt">Foto ändern</p>
                                    </label>
                                </div>
                                <div class="acc-company-profile__block acc-company-profile__wrap">
                                    <div class="form-field">
                                        <p class="form-field__name">Vorname*</p>
                                        <input value="{{auth()->user()->name}}" type="text" placeholder="Vorname*" name="name" required>
                                    </div>
                                    <div class="form-field">
                                        <p class="form-field__name">Nachname*</p>
                                        <input value="{{auth()->user()->lastname}}" type="text" placeholder="Nachname*" name="lastname" required>
                                    </div>
                                    <div class="form-field">
                                        <p class="form-field__name">Telefon*</p>
                                        <input value="{{auth()->user()->phone}}" type="tel" placeholder="Telefon*" name="phone" required>
                                    </div>
                                    <div class="form-field">
                                        <p class="form-field__name">Erreichbarkeit *</p>
                                        <input value="{{auth()->user()->availability}}" type="text" placeholder="Erreichbarkeit *" name="availability" required>
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
