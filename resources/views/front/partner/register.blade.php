@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="steps-desc headerHeightMarginTop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8"><a class="go-back-btn" href="#" onclick="window.history.go(-1); return false;"> </a>
                        <h1 class="section-title steps-desc__section-title">Werden Sie Partner von Offerten-365</h1>
                        <p class="steps-desc__subtitle">Der clevere Weg, um die Kontrolle über Ihr Geschäftswachstum zu übernehmen</p>
                        <p class="steps-desc__txt">Unsere flexible Plattform unterstützt Umzugsunternehmen bei der Realisierung ihres&nbsp;Geschäftspotenzials.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps-indicators steps-indicators_margin_top">
            <div class="container">
                <div class="steps-indicators__wrap steps-indicators__wrap_3-steps">
                    <div class="steps-indicators__item steps-indicators__item_active">
                        <p class="steps-indicators__counter"></p>
                        <p class="steps-indicators__txt">Allgemeine Daten</p>
                    </div>
                    <div class="steps-indicators__item">
                        <p class="steps-indicators__counter"></p>
                        <p class="steps-indicators__txt">Profil</p>
                    </div>
                    <div class="steps-indicators__item">
                        <p class="steps-indicators__counter"></p>
                        <p class="steps-indicators__txt">Region</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps-forms steps-forms_margin_top steps-forms_margin_bottom">
            <div class="container">
                <form data-email-check="{{route('checkEmail')}}" class="temp-form-steps temp-form-steps_active steps-forms__become-partner_1" action="#" style="display: block;" data-name="general-data">
                    @csrf
                    <div class="steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Vorname*</p>
                            <input type="text" placeholder="Vorname*" name="name" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Nachname*</p>
                            <input type="text" placeholder="Nachname" name="lastname" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">PLZ*</p>
                            <input type="number" placeholder="PLZ*" name="postcode" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Ort*</p>
                            <input type="text" placeholder="Ort" name="city" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Strasse*</p>
                            <input type="text" placeholder="Strasse*" name="street" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Hausnummer*</p>
                            <input type="text" placeholder="Hausnummer" name="house" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">E-Mail*</p>
                            <input type="email" placeholder="E-Mail" name="email" required>
                            <div style="display: none" class="invalid-feedback" role="alert">
                                <strong>E-Mail existiert bereits!</strong>
                            </div>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Telefon*</p>
                            <input type="number" placeholder="Telefon" name="phone" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Unternehmen*</p>
                            <input type="text" placeholder="Unternehmen" name="company" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Handelsregister</p>
                            <label class="form-field__file js-wrap-input-file">
                                <input type="file" name="upload_file">
                                <span class="js-txt-input-file">Upload file</span>
                            </label>
                        </div>
                        <div class="form-field">
                            <input class="btn" type="submit" value="Starten Sie Ihre Probemitgliedschaft">
                        </div>
                    </div>
                </form>
                <form class="temp-form-steps steps-forms__become-partner_2" action="#" style="display: none;" data-name="profile">
                    <div class="steps-forms__block"><a class="prev-step" href="#">Zurück</a></div>
                    <div class="steps-forms__block">
                        <div class="steps-forms__wrap">
                            <div class="form-field">
                                <p class="form-field__name">Password*</p>
                                <input type="password" name="password" placeholder="Password" required>
                                <p class="form-field__error-message"></p>
                            </div>
                            <div class="form-field">
                                <p class="form-field__name">Passwort bestätigen*</p>
                                <input type="password" name="password_confirmation" placeholder="Passwort bestätigen" required>
                                <p class="form-field__error-message"></p>
                            </div>
                        </div>
                    </div>
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Ich wünsche Anfragen für folgende Arbeiten*:</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-lg-10 col-xl-8">
                                <div class="row">
                                    @foreach ($typesOfJobs as $typeOfJob)
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="types_of_jobs[]" value="{{$typeOfJob->id}}">
                                            <span class="custom-checkbox__txt">{{__('front.'.$typeOfJob->name)}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div style="display: none" class="invalid-feedback" role="alert">
                                    <strong>Bitte wählen Sie etwas aus der Liste aus!</strong>
                                </div>
                            </div>

                        </div>
                    </div>
                    <input class="btn formBtnMarginTop" type="submit" value="Ausgefüllt">
                </form>
                <form class="temp-form-steps steps-forms__become-partner_3" action="#" style="display: none;" data-name="region" data-url="{{route('registerPartner')}}" enctype="multipart/form-data">
                    <div class="steps-forms__block"><a class="prev-step" href="#">Zurück</a></div>
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Wählen Sie Ihre Gebiete*</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-lg-10 col-xl-9">
                                <div class="row">
                                    @foreach ($regions as $region)
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="regions_ids[]" value="{{$region->id}}">
                                            <span class="custom-checkbox__txt">{{__('front.'.$region->name)}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div style="display: none" class="invalid-feedback" role="alert">
                                    <strong>Bitte wählen Sie etwas aus der Liste aus!</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <a style="margin-right:15px;margin-top:48px;" class="btn allecheck">Alle wählen</a>
                        <input class="btn js-submit-form formBtnMarginTop" type="submit" value="Bereit!">
                    </div>
                </form>
            </div>
        </section>
    </div>




    <!--
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerPartner') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus>

                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
