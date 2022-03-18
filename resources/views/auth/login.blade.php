@extends('layouts.app')

@section('content')

    <div class="page__content">
        <section class="login">
            <div class="container login__container">
                <div class="login__inner login__inner_login">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5">
                            <h1 class="section-title login__section-title">Loggen Sie sich ein</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-lg-7 col-xl-4">
                            <form class="form-login login__form-login" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-field form-login__form-field">
                                    <p class="form-field__name">E-Mail</p>
                                    <input class="@error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required="required" placeholder="E-Mail">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-field form-login__form-field">
                                    <p class="form-field__name">Passwort</p>
                                    <input class="@error('password') is-invalid @enderror" name="password" type="password" required="required" placeholder="Passwort">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <a class="form-login__forgot-pas" href="{{ route('password.request') }}">Passwort vergessen?</a>
                                <label class="form-login__checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="form-login__checkbox-txt">Daten merken</span>
                                </label>
                                <input class="btn form-login__btn" type="submit" value="Einloggen">
                                <p class="form-login__become-partner">Oder <a href="{{ route('partnerWerden') }}">registrieren</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>







    <!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
