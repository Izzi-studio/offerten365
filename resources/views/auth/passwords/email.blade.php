@extends('layouts.app')
@section('content')
<div class="page__content">
    <section class="login">
        <div class="container login__container">
            <div class="login__inner login__inner_forgot-password">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <a class="login__go-back" onclick="window.history.go(-1);"></a>
                        <h1 class="section-title login__section-title">Passwort vergessen?</h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <p class="login__txt">{{ session('status') }}</p>
                            </div>
                        @else
                            <p class="login__txt">Geben Sie Ihre E-Mail Adresse ein und wir senden Ihnen eine E-Mail zum Zurücksetzen des Passwortes.</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-lg-7 col-xl-4">
                        <form class="form-forgot-password login__form-forgot-password" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-field form-forgot-password__form-field">
                                <p class="form-field__name">E-Mail</p>
                                <input name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="@error('email') is-invalid @enderror" type="email" placeholder="E-Mail">
                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <input class="btn form-forgot-password__btn" type="submit" value="Passwort zurücksetzen">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
