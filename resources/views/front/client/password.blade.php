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
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form class="account-content__inner acc-change-password" method="post" action="{{route('client.updatePassword')}}">
                                @csrf
                                <div class="form-field acc-change-password__form-field">
                                    <p class="form-field__name">Altes Password</p>
                                    <input class="@error('old_password') is-invalid @enderror" type="password" value="" name="old_password" placeholder="********">
                                    @error('old_password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-field acc-change-password__form-field">
                                    <p class="form-field__name">Neues Password</p>
                                    <input class="@error('password') is-invalid @enderror" type="password" value="" name="password" placeholder="********">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-field acc-change-password__form-field">
                                    <p class="form-field__name">Passwort bestätigen</p>
                                    <input class="@error('password_confirmation') is-invalid @enderror" type="password" value="" name="password_confirmation" placeholder="********">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <input class="btn acc-change-password__btn" type="submit" value="Senden">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
