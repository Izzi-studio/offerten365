@extends('layouts.app')

@section('content')


<section class="login">
    <div class="container login__container">
        <div class="login__inner login__inner_forgot-password">
    <div class="row">
        <div class="col-lg-6 col-xl-5">
            
                <h1 class="section-title login__section-title">{{ __('Reset Password') }}</h1>
            <p class="login__txt"></p>
        </div>
    </div>
            <div class="row">
                <div class="col-md-10 col-lg-7 col-xl-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-field form-forgot-password__form-field">
                            <p class="form-field__name">{{ __('E-Mail Address') }}</p>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <p class="login__txt"></p>
                        <div class="form-field form-forgot-password__form-field">
                            <p class="form-field__name">{{ __('Password') }}</p>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <p class="login__txt"></p>
                        <div class="form-field form-forgot-password__form-field">
                            <p class="form-field__name">{{ __('Confirm Password') }}</p>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>

                                <input type="submit" class="btn form-forgot-password__btn" value="{{ __('Reset Password') }}">


                    </form>
        </div>
    </div>
</div>
    </div>
</section>
@endsection
