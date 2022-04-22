@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="steps-desc headerHeightMarginTop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8"><a class="go-back-btn" href="#" onclick="window.history.go(-1); return false;"> </a>
                        <h1 class="section-title steps-desc__section-title">Maler Offerten</h1>
                        <p class="steps-desc__txt">Sparen Sie Geld und Zeit, vermeiden Sie unnötigen Aufwand! Senden Sie Ihre Anfrage jetzt in nur zwei Minuten und Sie erhalten in kürzester Zeit die besten Angebote für Malerarbeiten. </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps-indicators steps-indicators_margin_top">
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
                <form email-check="{{route('checkEmail')}}" class="temp-form-steps temp-form-steps_active" action="#" style="display: block;" @guest data-name="mailcheck" @endguest>
                    @csrf
                    <input type="hidden" name="proposal[type_job_id]" value="4"/>
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Region*</p>
                            <select name="proposal[region_id]" required>
                                @foreach($regions as $region)
                                    <option @if($region->id == $proposal->region_id) selected @endif value="{{$region->id}}">{{__('front.'.$region->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">PLZ*</p>
                            <input type="text" placeholder="PLZ*" value="{{$proposal->additional_info->zip}}" name="additional_info[zip]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Ort*</p>
                            <input type="text" placeholder="Ort*" value="{{$proposal->additional_info->city}}" name="additional_info[city]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Strasse*</p>
                            <input type="text" placeholder="Strasse*" value="{{$proposal->additional_info->street}}" name="additional_info[street]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Nr*</p>
                            <input type="text" placeholder="Nr" value="{{$proposal->additional_info->number}}" name="additional_info[number]">
                        </div>
                    </div>
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Ich wünsche Anfragen für folgende Arbeiten:</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->dayrange == 'Nicht Flexibel') checked @endif type="radio" name="additional_info[dayrange]" value="Nicht Flexibel"><span class="custom-checkbox__txt">Nicht Flexibel</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->dayrange == '+/- 1 Tag') checked @endif type="radio" name="additional_info[dayrange]" value="+/- 1 Tag"><span class="custom-checkbox__txt">+/- 1 Tag</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->dayrange == '+/- 2 Tagen') checked @endif type="radio" name="additional_info[dayrange]" value="+/- 2 Tagen"><span class="custom-checkbox__txt">+/- 2 Tagen</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->dayrange == '+/- 3 Tagen') checked @endif type="radio" name="additional_info[dayrange]" value="+/- 3 Tagen"><span class="custom-checkbox__txt">+/- 3 Tagen</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field form-field_date">
                            <p class="form-field__name">Auftragsdatum *</p>
                            <input type="text" placeholder="Auftragsdatum *" value="{{$proposal->date_start->format('Y-m-d')}}" autocomplete="off" name="proposal[date_start]" data-toggle="datepicker" required>
                            <svg class="ico calendar">
                                <use xlink:href="/images/sprite.svg#calendar"></use>
                            </svg>
                        </div>
                    </div>
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </form>
                <form class="temp-form-steps" action="#" style="display: none;" data-url="{{route('client.updateProposals',$proposal->id)}}">
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Malerarbeiten innen:</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-lg-10 col-xl-9">
                                @php if(isset($proposal->additional_info->painting_work_inside)) {$flag = true;} else {$flag = false;} @endphp
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input 
                                                type="checkbox" 
                                                name="additional_info[painting_work_inside][]"
                                                value="Wand / Decke tapezieren"
                                                @if($flag && in_array('Wand / Decke tapezieren',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
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
                                                @if($flag && in_array('Wand / Decke streichen',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
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
                                                @if($flag && in_array('Fenster / Türen streichen / lackieren',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
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
                                                @if($flag && in_array('Heizkörper streichen / lackieren',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
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
                                                @if($flag && in_array('Alte Tapete entfernen',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
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
                                                @if($flag && in_array('Entsorgung erforderlich (z.B. von alter Tapete)',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
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
                                                @if($flag && in_array('Farbberatung und -gestaltung erwünscht',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
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
                                                @if($flag && in_array('Nichts aus der Liste. Zu anderen Arbeiten',json_decode($proposal->additional_info->painting_work_inside))) checked @endif
                                            />
                                            <span class="custom-checkbox__txt">Nichts aus der Liste. Zu anderen Arbeiten</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Malerarbeiten außen:</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-lg-10 col-xl-9">
                                @php if(isset($proposal->additional_info->painting_work_outside)) {$flag = true;} else {$flag = false;} @endphp
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input 
                                                type="checkbox" 
                                                name="additional_info[painting_work_outside][]"
                                                value="Fassadenreinigung Privathaus"
                                                @if($flag && in_array('Fassadenreinigung Privathaus',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Fassadenreinigung Firmengebäude',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Sonstige Fassadenreinigung',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Fassade streichen',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Giebel streichen',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Dachkästen streichen',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Fassade dämmen',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Untergrund vorbereiten',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Farbberatung und -gestaltung erwünscht',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
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
                                                @if($flag && in_array('Nichts aus der Liste. Zu anderen Arbeiten',json_decode($proposal->additional_info->painting_work_outside))) checked @endif
                                            />
                                            <span class="custom-checkbox__txt">Nichts aus der Liste. Zu anderen Arbeiten</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Arbeitstyp:</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-lg-10 col-xl-9">
                                @php if(isset($proposal->additional_info->worktype)) {$flag = true;} else {$flag = false;} @endphp
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Stuckarbeiten',json_decode($proposal->additional_info->worktype))) checked @endif type="checkbox" name="additional_info[worktype][]" value="Stuckarbeiten"><span class="custom-checkbox__txt">Stuckarbeiten</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Gipserarbeiten',json_decode($proposal->additional_info->worktype))) checked @endif type="checkbox" name="additional_info[worktype][]" value="Gipserarbeiten"><span class="custom-checkbox__txt">Gipserarbeiten</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Isolierarbeiten',json_decode($proposal->additional_info->worktype))) checked @endif type="checkbox" name="additional_info[worktype][]" value="Isolierarbeiten"><span class="custom-checkbox__txt">Isolierarbeiten</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Fensterrahmen',json_decode($proposal->additional_info->worktype))) checked @endif type="checkbox" name="additional_info[worktype][]" value="Fensterrahmen"><span class="custom-checkbox__txt">Fensterrahmen</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="steps-forms__block">
                        <div class="form-field form-field_full">
                            <p class="form-field__name">Bemerkungen*</p>
                            <textarea placeholder="Bemerkungen" name="proposal[description]" required>{{$proposal->description}}</textarea>
                        </div>
                    </div>
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="formflex form-field form-field_full">
                        <a class="prev-step" href="#">Zurück</a>
                        <input class="btn formBtnMarginTop" type="submit" value="Offerte anforden">
                    </div>
                </form>
            </div>
            <div class="container">
                <h2 class="section-title steps-desc__section-title">Malerarbeiten vom Profi zu günstigen Preisen</h2>
                <p class="steps-desc__txt">Sie befinden sich auf der Suche nach einem Experten für Malerarbeiten? Sie legen grossen Wert auf Zuverlässigkeit und saubere Arbeit? Sie möchten jedoch keine Unsummen für das „Anpinseln“ oder das Tapezieren ausgeben? Dann sind Sie bei Offerten 365 bestens aufgehoben. Denn nicht nur Umzugsunternehmen gehören zu den Anbietern auf Offerten 365: Malermeister und Unternehmen im Malergewerbe nutzen ebenfalls unsere Plattform, um Aufträge zu erhalten. Die stetig wachsende Anzahl an Nutzern zeigt, dass sich die Vermittlung lohnt – für den Anbieter ebenso wie für den Kunden! Als Kunde sparen Sie zum Beispiel bis zu 40 Prozent der Kosten, die Sie für gewöhnlich, dass heisst ohne einem Vergleich, ausgeben müssten. Überlassen Sie den Profis die Arbeit und sparen Sie etliche Franken durch Offerten 365.</p>
                <h2 class="section-title steps-desc__section-title">Offerten vergleichen und sparen</h2>
                <p class="steps-desc__txt">Das Kernstück von Offerten 365 ist selbstverständlich auch bei der Vermittlung von Malerservices nutzbar. Ganz gleich, wo Sie wohnen und welche Art von Malerarbeiten Sie benötigen: Über das Anfragenformular haben Sie im Handumdrehen bis zu 6 potenzielle Anbieter gefunden, die in der gesamten Schweiz tätig werden und deren Konditionen Sie nur noch miteinander vergleichen müssen. Und deren Preise! Untersuchungen zufolge können Nutzer von Vergleichsplattformen wie Offerten 365 bis zu 40 % der Kosten für eine Dienstleistung wie zum Beispiel Malerarbeiten sparen. Besonders vorteilhaft: Die Anbieter müssen aktiv auf Ihre Anfrage antworten beziehungsweise die Möglichkeit, auf Ihre Anfrage eine Offerte abgeben zu können, erwerben. Auf diese Weise ist sichergestellt, dass der Anbieter tatsächlich Interesse an dem Auftrag hat, sich mit der gewünschten Malerarbeit auskennt und über genügend Kapazitäten verfügt. Sie als Kunde dürfen mit jedem der Anbieter Kontakt aufnehmen und sich in aller Ruhe entscheiden. Die Nutzung von Offerten 365 ist bis hierhin absolut kostenlos und unverbindlich.</p>
                <h2 class="section-title steps-desc__section-title">Überlassen Sie den Profis die Arbeit</h2>
                <p class="steps-desc__txt">Sobald Sie sich für einen Anbieter entschieden haben, können Sie dessen Offerte akzeptieren. Zum nächst möglichen Zeitpunkt beziehungsweise an Ihrem Wunsch-Termin rückt der Anbieter aus und fängt mit der Arbeit an. Sie wünschen zuvor eine detaillierte Planung? Kein Problem! Im Falle grosser Projektarbeiten besucht Sie der Anbieter gerne vor dem eigentlichen Arbeitsbeginn, klärt eventuelle Fragen und gibt eine Einschätzung, wie schnell die Arbeit getan ist. Denn häufig ist der Arbeitsaufwand, der sich zum Beispiel hinter dem Streichen einer Aussenfassade oder dem Tapezieren mehrere Etagen verbirgt, schwer aus der Ferne zu beurteilen. So oder so: Der Anbieter beginnt mit der Malerarbeit, sobald Sie grünes Licht geben. Damit Sie beruhigt sein können, dass der Anbieter die Arbeit auch zu Ihrer Zufriedenheit erledigt, führt Offerten 365 regelmässige Qualitätskontrollen durch und hat ein Bewertungssystem entwickelt. Über das Profil eines Anbieters können Kunden die Arbeit, den Service und die Zuverlässigkeit des Malers bewerten. So ist sichergestellt, dass Sie bereits vor der Auftragsvergabe wissen, wie gut der Maler arbeitet und im Anschluss eine eigene Bewertung abgeben.</p>
                <h2 class="section-title steps-desc__section-title">Anfragenformular ausfüllen und zurücklehnen</h2>
                <p class="steps-desc__txt">Sie möchten direkt Offerten einholen und Ihren Favoriten für Malerarbeiten aussuchen? Füllen Sie das Anfragenformular aus und erhalten Sie nach nur 24 Stunden bis zu 6 Offerten von verschiedenen Anbietern – zu verschiedenen Preisen. Sie wünschen Zusatzleistungen oder legen Wert auf den Einsatz besonderer Farbe? Teilen Sie Ihre Wünsche im Anfragenformular mit und lehnen Sie sich zurück. Nach getaner Arbeit dürfen Sie den Anbieter bewerten und helfen somit auch anderen Kunden, die mit Offerten 365 bares Geld sparen möchten. Worauf warten Sie also noch? Einfach das Anfragenformular ausfüllen und Offerten 365 bringt Sie mit Profis für Malerarbeiten zusammen. Sollten Sie Fragen haben, so dürfen Sie uns selbstverständlich eine Mail schreiben, uns anrufen oder das Kontaktformular nutzen. Wir freuen uns, Ihnen weiterzuhelfen.</p>
            </div>
        </section>
    </div>



@endsection
