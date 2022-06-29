@extends('layouts.app')
@section('content')


@include('front.custom_pages.include_info')
<section id="section-steps">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="section-title steps-desc__section-title">Maler Offerten</h1>
                    <p class="steps-desc__txt">Sparen Sie Geld und Zeit, vermeiden Sie unnötigen Aufwand! Senden Sie
                        Ihre Anfrage jetzt in nur zwei Minuten und Sie erhalten in kürzester Zeit die besten Angebote
                        für Malerarbeiten. </p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="steps-indicators steps-indicators_global-steps steps-indicators_margin_top">
        <div class="container">
            <div class="steps-indicators__wrap steps-indicators__wrap_3-steps">
                <div class="steps-indicators__item steps-indicators__item_active">
                    <p class="steps-indicators__counter"></p>
                    <p class="steps-indicators__txt">Kontaktinformationen</p>
                </div>
                <div class="steps-indicators__item">
                    <p class="steps-indicators__counter"></p>
                    <p class="steps-indicators__txt">Auftragsinformationen</p>
                </div>
            </div>
        </div>
    </section>
    <section class="steps-forms steps-forms_margin_top steps-forms_margin_bottom">
        <div class="container">
            <!--  -->
            @guest
            <form class="temp-form-steps temp-form-steps_active" data-global-step="1" action="#" style="display: block;">
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
                <input class="btn formBtnMarginTop" type="submit" value="Weiter">
            </form>
            <form class="temp-form-steps" data-global-step="1" data-email-check="{{route('checkEmail')}}" style="display: none;">
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
                            <strong>E-Mail existiert bereits! Hier geht es zur <a href="{{ route('login') }}">Anmeldung</a></strong>
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
            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
            @else
            <form class="temp-form-steps temp-form-steps_active" data-global-step="1" action="#" style="display: block;">
            @endguest
                @csrf
                <input type="hidden" name="proposal[type_job_id]" value="4" />
                <h3>Kontaktinformationen</h3>
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
                <input class="btn formBtnMarginTop" type="submit" value="Weiter">
            </form>
            
            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Kontaktinformationen</h3>
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
                <h3>Kontaktinformationen</h3>
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
                <h3>Kontaktinformationen</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field form-field_date">
                        <p class="form-field__name">Auftragsdatum *</p>
                        <input type="text" placeholder="Auftragsdatum *" autocomplete="off" name="proposal[date_start]"
                            data-toggle="datepicker" required>
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

            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Auftragsinformationen</h3>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Malerarbeiten innen:</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Wand / Decke tapezieren"
                                        />
                                        <span class="custom-checkbox__txt">Wand / Decke tapezieren</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Wand / Decke streichen"
                                        />
                                        <span class="custom-checkbox__txt">Wand / Decke streichen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Fenster / Türen streichen / lackieren"
                                        />
                                        <span class="custom-checkbox__txt">Fenster / Türen streichen / lackieren</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Heizkörper streichen / lackieren"
                                        />
                                        <span class="custom-checkbox__txt">Heizkörper streichen / lackieren</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Alte Tapete entfernen"
                                        />
                                        <span class="custom-checkbox__txt">Alte Tapete entfernen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Entsorgung erforderlich (z.B. von alter Tapete)"
                                        />
                                        <span class="custom-checkbox__txt">Entsorgung erforderlich (z.B. von alter Tapete)</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Farbberatung und -gestaltung erwünscht"
                                        />
                                        <span class="custom-checkbox__txt">Farbberatung und -gestaltung erwünscht</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_inside][]"
                                            value="Nichts aus der Liste. Zu anderen Arbeiten"
                                        />
                                        <span class="custom-checkbox__txt">Nichts aus der Liste. Zu anderen Arbeiten</span>
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

            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Auftragsinformationen</h3>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Malerarbeiten außen:</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Fassadenreinigung Privathaus"
                                        />
                                        <span class="custom-checkbox__txt">Fassadenreinigung Privathaus</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Fassadenreinigung Firmengebäude"
                                        />
                                        <span class="custom-checkbox__txt">Fassadenreinigung Firmengebäude</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Sonstige Fassadenreinigung"
                                        />
                                        <span class="custom-checkbox__txt">Sonstige Fassadenreinigung</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Fassade streichen"
                                        />
                                        <span class="custom-checkbox__txt">Fassade streichen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Giebel streichen"
                                        />
                                        <span class="custom-checkbox__txt">Giebel streichen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Dachkästen streichen"
                                        />
                                        <span class="custom-checkbox__txt">Dachkästen streichen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Fassade dämmen"
                                        />
                                        <span class="custom-checkbox__txt">Fassade dämmen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Untergrund vorbereiten"
                                        />
                                        <span class="custom-checkbox__txt">Untergrund vorbereiten</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Farbberatung und -gestaltung erwünscht"
                                        />
                                        <span class="custom-checkbox__txt">Farbberatung und -gestaltung erwünscht</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            name="additional_info[painting_work_outside][]"
                                            value="Nichts aus der Liste. Zu anderen Arbeiten"
                                        />
                                        <span class="custom-checkbox__txt">Nichts aus der Liste. Zu anderen Arbeiten</span>
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

            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Auftragsinformationen</h3>
                <div class="steps-forms__block">
                    <h3 class="steps-form__title">Arbeitstyp:</h3>
                    <div class="row steps-form__checkboxes">
                        <div class="col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Stuckarbeiten"><span
                                            class="custom-checkbox__txt">Stuckarbeiten</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Gipserarbeiten"><span
                                            class="custom-checkbox__txt">Gipserarbeiten</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Isolierarbeiten"><span
                                            class="custom-checkbox__txt">Isolierarbeiten</span>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Fensterrahmen"><span
                                            class="custom-checkbox__txt">Fensterrahmen</span>
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

            <form class="temp-form-steps" data-global-step="2" action="#" data-url="{{ $action  }}" style="display: none;">
                <h3>Auftragsinformationen</h3>
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
        </div>
    </section>

</div>



@endsection