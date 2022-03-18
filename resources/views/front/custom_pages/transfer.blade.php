@extends('layouts.app')
@section('content')

@include('front.custom_pages.include_info')
    <section id="section-steps">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="section-title steps-desc__section-title">Offerten für Umzug</h1>
                    <p class="steps-desc__txt">Sparen Sie Geld und Zeit, meiden Sie unnötige Mühe! Schicken Sie
                        jetzt in nur zwei Minuten Ihre Anfrage und Sie werden in kurzer Zeit die besten
                        Umzugsofferten erhalten. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="steps-indicators steps-indicators_margin_top">
        <div class="container">
            <div class="steps-indicators__wrap steps-indicators__wrap_3-steps">
                <div class="steps-indicators__item steps-indicators__item_active">
                    <p class="steps-indicators__counter"></p>
                    <p class="steps-indicators__txt">Von</p>
                </div>
                <div class="steps-indicators__item">
                    <p class="steps-indicators__counter"></p>
                    <p class="steps-indicators__txt">Nach</p>
                </div>
                @guest
                <div class="steps-indicators__item">
                    <p class="steps-indicators__counter"></p>
                    <p class="steps-indicators__txt">Kontakt</p>
                </div>
                @endguest
            </div>
        </div>
    </section>
    <section class="steps-forms steps-forms_margin_top steps-forms_margin_bottom">
        <div class="container">
            <form class="temp-form-steps temp-form-steps temp-form-steps_active" action="#" style="display: block;">
                <input type="hidden" name="proposal[type_job_id]" value="1" />
                @csrf
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Region*</p>
                        <select name="proposal[region_id]" required>
                            @foreach($regions as $region)
                            <option value="{{$region->id}}">{{__('front.'.$region->name)}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">PLZ*</p>
                        <input type="text" placeholder="PLZ*" name="additional_info[from][zip]" value="{{$zip}}"
                            required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Ort*</p>
                        <input type="text" placeholder="Ort*" name="additional_info[from][city]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Strasse*</p>
                        <input type="text" placeholder="Strasse*" name="additional_info[from][street]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Nr*</p>
                        <input type="text" placeholder="Nr" name="additional_info[from][number]">
                    </div>
                    <div class="form-field form-field_date">
                        <p class="form-field__name">Auftragsdatum *</p>
                        <input type="text" placeholder="Auftragsdatum *" name="proposal[date_start]"
                            data-toggle="datepicker" autocomplete="off" required>
                        <svg class="ico calendar">
                            <use xlink:href="/images/sprite.svg#calendar"></use>
                        </svg>
                    </div>
                </div>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Ich wünsche Anfragen für folgende Arbeiten:</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input checked type="radio" name="additional_info[from][dayrange]"
                                            value="Nicht Flexibel">
                                        <span class="custom-checkbox__txt">Nicht Flexibel</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[from][dayrange]"
                                            value="+/- 1 Tag"><span class="custom-checkbox__txt">+/- 1 Tag</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[from][dayrange]"
                                            value="+/- 2 Tagen"><span class="custom-checkbox__txt">+/- 2 Tagen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[from][dayrange]"
                                            value="+/- 3 Tagen"><span class="custom-checkbox__txt">+/- 3 Tagen</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Haustyp</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input checked type="radio" name="additional_info[from][house_type]"
                                            value="Mehrfamilienhaus">
                                        <span class="custom-checkbox__txt">Mehrfamilienhaus</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[from][house_type]"
                                            value="Einfamilienhaus">
                                        <span class="custom-checkbox__txt">Einfamilienhaus</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Lift</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input checked type="radio" name="additional_info[from][lift]"
                                            value="Kein Lift"><span class="custom-checkbox__txt">Kein Lift</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[from][lift]" value="Mit Lift"><span
                                            class="custom-checkbox__txt">Mit Lift</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Stock*</p>
                        <input type="text" placeholder="Stock*" name="additional_info[from][floor]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Anzahl der Zimmer*</p>
                        <input type="text" placeholder="z.B. “1 - 1,5 - 2 - 2,5 - 3 - 3,5 - 4 - 4,5 - mehr’’"
                            name="additional_info[from][rooms]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Fläche in m<sup>2</sup>*</p>
                        <input type="text" placeholder="Stock" name="additional_info[from][square]" required>
                    </div>
                </div>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Andere Info</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[from][other][]"
                                            value="Keller"><span class="custom-checkbox__txt">Keller</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[from][other][]"
                                            value="Klavier"><span class="custom-checkbox__txt">Klavier</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[from][other][]"
                                            value="Estrich"><span class="custom-checkbox__txt">Estrich</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[from][other][]"
                                            value="Garage"><span class="custom-checkbox__txt">Garage</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[from][other][]"
                                            value="Flügel"><span class="custom-checkbox__txt">Flügel </span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[from][other][]"
                                            value="Lagerung"><span class="custom-checkbox__txt">Lagerung</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[from][other][]"
                                            value="Demontage / Montage"><span class="custom-checkbox__txt">Demontage /
                                            Montage</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-forms__block">
                    <div class="form-field form-field_full">
                        <p class="form-field__name">Bemerkungen</p>
                        <textarea placeholder="Bemerkungen" name="proposal[description]"></textarea>
                    </div>
                </div>
                <input class="btn formBtnMarginTop" type="submit" value="Weiter">
            </form>
            <form class="temp-form-steps" action="#" style="display: none;" data-url="{{ $action }}">
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Region*</p>
                        <select name="additional_info[to][region_name]" required>
                            @foreach($regions as $region)
                            <option value="{{ $region->name}}">{{__('front.'.$region->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">PLZ*</p>
                        <input type="text" placeholder="PLZ*" name="additional_info[to][zip]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Ort*</p>
                        <input type="text" placeholder="Ort*" name="additional_info[to][city]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Strasse*</p>
                        <input type="text" placeholder="Strasse*" name="additional_info[to][street]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Nr*</p>
                        <input type="text" placeholder="Nr" name="additional_info[to][number]" required>
                    </div>
                </div>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Haustyp</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input checked type="radio" name="additional_info[to][house_type]"
                                            value="Mehrfamilienhaus"><span
                                            class="custom-checkbox__txt">Mehrfamilienhaus</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[to][house_type]"
                                            value="Einfamilienhaus"><span
                                            class="custom-checkbox__txt">Einfamilienhaus</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Lift</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input checked type="radio" name="additional_info[to][lift]"
                                            value="Kein Lift"><span class="custom-checkbox__txt">Kein Lift</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[to][lift]" value="Mit Lift"><span
                                            class="custom-checkbox__txt">Mit Lift</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Stock*</p>
                        <input type="text" placeholder="Stock*" name="additional_info[to][floor]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Fläche in m<sup>2</sup>*</p>
                        <input type="text" placeholder="Stock" name="additional_info[to][square]" required>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>
            @guest
            <form email-check="{{route('checkEmail')}}" class="temp-form-steps" action="#" style="display: none;"
                data-url="{{ $action }}" data-name="mailcheck">
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Anrede*</p>
                        <select name="client[gender]" required>
                            <option value="Herr">Herr</option>
                            <option value="Frau">Frau</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Vorname*</p>
                        <input type="text" placeholder="Vorname*" name="client[name]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Nachname*</p>
                        <input type="text" placeholder="Nachname*" name="client[lastname]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Telefon*</p>
                        <input type="number" placeholder="Telefon*" name="client[phone]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">E-Mail</p>
                        <input type="email" placeholder="E-Mail" name="client[email]">
                        <div style="display: none" class="invalid-feedback" role="alert">
                            <strong>E-Mail existiert bereits!</strong>
                        </div>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Erreichbarkeit *</p>
                        <input type="text" placeholder="Erreichbarkeit *" name="client[availability]" required>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn formBtnMarginTop" type="submit" value="Offerte anforden">
                </div>
            </form>
            @endguest
        </div>
    </section>
</div>

@endsection