@extends('layouts.app')
@section('content')

@include('front.custom_pages.include_info')
    <section id="section-steps">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="section-title steps-desc__section-title">Offerten für Reinigung</h1>
                    <p class="steps-desc__txt">Sparen Sie Geld und Zeit, meiden Sie unnötige Mühe! Schicken Sie jetzt in
                        nur zwei Minuten Ihre Anfrage und Sie werden in kurzer Zeit die besten Reinigungsofferten
                        erhalten. </p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="steps-indicators steps-indicators_global-steps steps-indicators_margin_top">
        <div class="container">
            <div class="steps-indicators__wrap steps-indicators__wrap_3-steps">
                <div class="steps-indicators__item steps-indicators__item_active">
                    <p class="steps-indicators__counter"></p>
                    <p class="steps-indicators__txt">Reinigung</p>
                </div>
                <div class="steps-indicators__item">
                    <p class="steps-indicators__counter"></p>
                    <p class="steps-indicators__txt">Anzahl</p>
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
            <!--  -->
            <form class="temp-form-steps temp-form-steps_active" data-global-step="1" action="#" style="display: block;">
                @csrf
                <input type="hidden" name="proposal[type_job_id]" value="2" />
                <h3>Reinigung</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Reinigungstyp *</p>
                        <select name="additional_info[cleaning]" required>
                            <option value="Umzugsreinigung">Umzugsreinigung</option>
                            <option value="Fensterreinigung">Fensterreinigung</option>
                            <option value="Bodenreinigung">Bodenreinigung</option>
                            <option value="Baureinigung">Baureinigung</option>
                            <option value="Büroreinigung">Büroreinigung</option>
                            <option value="Unterhaltsreinigung">Unterhaltsreinigung</option>
                        </select>
                    </div>
                </div>
                <input class="btn formBtnMarginTop" type="submit" value="Weiter">
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Region*</p>
                        <select name="proposal[region_id]" required>
                            @foreach($regions as $region)
                            <option value="{{$region->id}}">{{__('front.'.$region->name)}}</option>
                            @endforeach
                        </select>
                    </div>  
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">PLZ*</p>
                        <input type="text" placeholder="PLZ*" name="additional_info[zip]" value="{{$zip}}" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Ort*</p>
                        <input type="text" placeholder="Ort*" name="additional_info[city]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Strasse*</p>
                        <input type="text" placeholder="Strasse*" name="additional_info[street]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Nr*</p>
                        <input type="text" placeholder="Nr" name="additional_info[number]">
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field form-field_date">
                        <p class="form-field__name">Auftragsdatum *</p>
                        <input type="text" placeholder="Auftragsdatum *" name="proposal[date_start]"
                            data-toggle="datepicker" autocomplete="off" required>
                        <svg class="ico calendar">
                            <use xlink:href="/images/sprite.svg#calendar"></use>
                        </svg>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Ich wünsche Anfragen für folgende Arbeiten:</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input checked type="radio" name="additional_info[dayrange]"
                                            value="Nicht Flexibel"><span class="custom-checkbox__txt">Nicht
                                            Flexibel</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[dayrange]" value="+/- 1 Tag"><span
                                            class="custom-checkbox__txt">+/- 1 Tag</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[dayrange]" value="+/- 2 Tagen"><span
                                            class="custom-checkbox__txt">+/- 2 Tagen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[dayrange]" value="+/- 3 Tagen"><span
                                            class="custom-checkbox__txt">+/- 3 Tagen</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Haustyp</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input checked type="radio" name="additional_info[house_type]"
                                            value="Mehrfamilienhaus"><span
                                            class="custom-checkbox__txt">Mehrfamilienhaus</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="radio" name="additional_info[house_type]"
                                            value="Einfamilienhaus"><span
                                            class="custom-checkbox__txt">Einfamilienhaus</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Lift</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-radio">
                                        <input checked type="radio" name="additional_info[lift]" value="Kein Lift"><span
                                            class="custom-radio__txt">Kein Lift</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-radio">
                                        <input type="radio" name="additional_info[lift]" value="Mit Lift"><span
                                            class="custom-radio__txt">Mit Lift</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Stock*</p>
                        <input type="text" placeholder="Stock*" name="additional_info[floor]" required>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Anzahl der Zimmer*</p>
                        <input type="text" placeholder="z.B. “1 - 1,5 - 2 - 2,5 - 3 - 3,5 - 4 - 4,5 - mehr’’"
                            name="additional_info[rooms]" required>
                    </div>
                    <div 
                        class="form-field" 
                        oninput="this.querySelector('.range-value').textContent = event.target.value"
                    >
                        <p class="form-field__name">Fläche in <span class="range-value">5</span> m<sup>2</sup>*</p>
                        <div class="wrap-range">
                            <input 
                                type="range" 
                                name="additional_info[square]"
                                step="1"
                                value="5"
                                min="5" 
                                max="500"
                                required
                            >
                        </div>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Andere Info</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-sm-10 col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[other][]" value="Keller"><span
                                            class="custom-checkbox__txt">Keller</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[other][]" value="Klavier"><span
                                            class="custom-checkbox__txt">Klavier</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[other][]" value="Estrich"><span
                                            class="custom-checkbox__txt">Estrich</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[other][]" value="Garage"><span
                                            class="custom-checkbox__txt">Garage</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[other][]" value="Flügel"><span
                                            class="custom-checkbox__txt">Flügel </span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[other][]" value="Lagerung"><span
                                            class="custom-checkbox__txt">Lagerung</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[other][]"
                                            value="Demontage / Montage"><span class="custom-checkbox__txt">Demontage /
                                            Montage</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Reinigung</h3>
                <div class="steps-forms__block">
                    <div class="form-field form-field_full">
                        <p class="form-field__name">Bemerkungen</p>
                        <textarea placeholder="Bemerkungen" name="proposal[description]"></textarea>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>
            <!--  -->
            <!--  -->
            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Anzahl</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Fenster</p>
                        <select name="additional_info[windows]">
                            <option value="">-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5-7">5-7</option>
                            <option value="8-10">8-10</option>
                            <option value="11-15">11-15</option>
                            <option value="16-20">16-20</option>
                            <option value="21-30">21-30</option>
                            <option value="31-50">31-50</option>
                            <option value="50+">mehr als 50</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Bodentyp*</p>
                        <select name="additional_info[soil_type]">
                            <option value="">-</option>
                            <option value="Parkett">Parkett</option>
                            <option value="Laminat">Laminat</option>
                            <option value="Linoleum">Linoleum</option>
                            <option value="Teppich">Teppich</option>
                            <option value="Plättli">Plättli</option>
                            <option value="Diverse">Diverse</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">Fenstergrösse *</p>
                        <select name="additional_info[window_size]">
                            <option value="">-</option>
                            <option value="Höhe 120cm Breite 60cm">Höhe 120cm Breite 60cm</option>
                            <option value="Höhe 120cm Breite 100cm">Höhe 120cm Breite 100cm</option>
                            <option value="Höhe 200cm Breite 60cm">Höhe 200cm Breite 60cm</option>
                            <option value="Höhe 200cm Breite 100cm">Höhe 200cm Breite 100cm</option>
                            <option value="Höhe 200cm Breite 180cm">Höhe 200cm Breite 180cm</option>
                        </select>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="2" action="#" data-url="{{ $action }}" style="display: none;">
                <h3>Anzahl</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Dusche /WC </p>
                        <select name="additional_info[shower_wc]">
                            <option value="">-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">BAD / WC *</p>
                        <select name="additional_info[bath_wc]">
                            <option value="">-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <p class="form-field__name">WC * </p>
                        <select name="additional_info[wc]">
                            <option value="">-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>
            <!--  -->
            <!--  -->
            @guest
            <form class="temp-form-steps" data-global-step="3" action="#" style="display: none;">
                <h3>Kontakt</h3>
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
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>
            <form class="temp-form-steps" data-global-step="3" data-email-check="{{route('checkEmail')}}" data-url="{{ $action }}" style="display: none;">
                <h3>Kontakt</h3>
                <div class="steps-forms__block steps-forms__wrap">
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
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>
            @endguest
            <!--  -->
        </div>

    </section>

</div>

@endsection