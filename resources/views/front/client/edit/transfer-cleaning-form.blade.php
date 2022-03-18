@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="steps-desc headerHeightMarginTop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8"><a class="go-back-btn" href="#" onclick="window.history.go(-1); return false;"> </a>
                        <h1 class="section-title steps-desc__section-title">Offerten Für Umzug + Reinigung</h1>
                        <p class="steps-desc__txt">Sparen Sie Geld und Zeit, meiden Sie unnötige Mühe! Schicken Sie jetzt in nur zwei Minuten Ihre Anfrage und Sie werden in kurzer Zeit die besten Umzugs + Reinigungsofferten erhalten. </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps-indicators steps-indicators_margin_top">
            <div class="container">
                <div class="steps-indicators__wrap">
                    <div class="steps-indicators__item steps-indicators__item_active">
                        <p class="steps-indicators__counter"></p>
                        <p class="steps-indicators__txt">Von</p>
                    </div>
                    <div class="steps-indicators__item">
                        <p class="steps-indicators__counter"></p>
                        <p class="steps-indicators__txt">Nach</p>
                    </div>
                    <div class="steps-indicators__item">
                        <p class="steps-indicators__counter"></p>
                        <p class="steps-indicators__txt">Reinigung</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps-forms steps-forms_margin_top steps-forms_margin_bottom">
            <div class="container">
                <form class="temp-form-steps temp-form-steps temp-form-steps_active" action="#" style="display: block;">
                    <input type="hidden" name="proposal[type_job_id]" value="3"/>
                    @csrf
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
                            <input value="{{$proposal->additional_info->from->zip}}" type="text" placeholder="PLZ*" name="additional_info[from][zip]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Ort*</p>
                            <input value="{{$proposal->additional_info->from->city}}" type="text" placeholder="Ort*" name="additional_info[from][city]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Strasse*</p>
                            <input value="{{$proposal->additional_info->from->street}}" type="text" placeholder="Strasse*" name="additional_info[from][street]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Nr*</p>
                            <input value="{{$proposal->additional_info->from->number}}" type="text" placeholder="Nr" name="additional_info[from][number]">
                        </div>
                        <div class="form-field form-field_date">
                            <p class="form-field__name">Auftragsdatum *</p>
                            <input value="{{$proposal->date_start->format('Y-m-d')}}" type="text" placeholder="Auftragsdatum *" name="proposal[date_start]"
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
                                            <input @if($proposal->additional_info->from->dayrange == 'Nicht Flexibel') checked @endif type="radio" name="additional_info[from][dayrange]"
                                                   value="Nicht Flexibel">
                                            <span class="custom-checkbox__txt">Nicht Flexibel</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->from->dayrange == '+/- 1 Tag') checked @endif type="radio" name="additional_info[from][dayrange]"
                                                   value="+/- 1 Tag"><span class="custom-checkbox__txt">+/- 1 Tag</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->from->dayrange == '+/- 2 Tagen') checked @endif type="radio" name="additional_info[from][dayrange]"
                                                   value="+/- 2 Tagen"><span
                                                class="custom-checkbox__txt">+/- 2 Tagen</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->from->dayrange == '+/- 3 Tagen') checked @endif type="radio" name="additional_info[from][dayrange]"
                                                   value="+/- 3 Tagen"><span
                                                class="custom-checkbox__txt">+/- 3 Tagen</span>
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
                                            <input @if($proposal->additional_info->from->house_type == 'Mehrfamilienhaus') checked @endif checked type="radio" name="additional_info[from][house_type]"
                                                   value="Mehrfamilienhaus">
                                            <span class="custom-checkbox__txt">Mehrfamilienhaus</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->from->house_type == 'Einfamilienhaus') checked @endif type="radio" name="additional_info[from][house_type]"
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
                                            <input @if($proposal->additional_info->from->lift == 'Kein Lift') checked @endif type="radio" name="additional_info[from][lift]"
                                                   value="Kein Lift"><span class="custom-checkbox__txt">Kein Lift</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->from->lift == 'Mit Lift') checked @endif type="radio" name="additional_info[from][lift]"
                                                   value="Mit Lift"><span class="custom-checkbox__txt">Mit Lift</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Stock*</p>
                            <input value="{{$proposal->additional_info->from->floor}}" type="text" placeholder="Stock*" name="additional_info[from][floor]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Anzahl der Zimmer*</p>
                            <input value="{{$proposal->additional_info->from->rooms}}" type="text" placeholder="z.B. “1 - 1,5 - 2 - 2,5 - 3 - 3,5 - 4 - 4,5 - mehr’’"
                                   name="additional_info[from][rooms]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Fläche in m<sup>2</sup>*</p>
                            <input value="{{$proposal->additional_info->from->square}}" type="text" placeholder="Stock" name="additional_info[from][square]" required>
                        </div>
                    </div>
					@php if(isset($proposal->additional_info->other))  {$flag = true;} else {$flag = false;} @endphp
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Andere Info</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-sm-10 col-lg-10 col-xl-9">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Keller',explode(',',str_replace(array('[',']','"'),array('','',''),explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))))) checked @endif type="checkbox" name="additional_info[from][other][]" value="Keller"><span
                                                class="custom-checkbox__txt">Keller</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Klavier',explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))) checked @endif type="checkbox" name="additional_info[from][other][]"
                                                   value="Klavier"><span class="custom-checkbox__txt">Klavier</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Estrich',explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))) checked @endif type="checkbox" name="additional_info[from][other][]"
                                                   value="Estrich"><span class="custom-checkbox__txt">Estrich</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Garage',explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))) checked @endif type="checkbox" name="additional_info[from][other][]" value="Garage"><span
                                                class="custom-checkbox__txt">Garage</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Flügel',explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))) checked @endif type="checkbox" name="additional_info[from][other][]" value="Flügel"><span
                                                class="custom-checkbox__txt">Flügel </span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Lagerung',explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))) checked @endif type="checkbox" name="additional_info[from][other][]"
                                                   value="Lagerung"><span class="custom-checkbox__txt">Lagerung</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Demontage / Montage',explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))) checked @endif type="checkbox" name="additional_info[from][other][]"
                                                   value="Demontage / Montage"><span class="custom-checkbox__txt">Demontage / Montage</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="steps-forms__block">
                        <div class="form-field form-field_full">
                            <p class="form-field__name">Bemerkungen*</p>
                            <textarea placeholder="Bemerkungen*" name="proposal[description]" required>{{$proposal->description}}</textarea>
                        </div>
                    </div>
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </form>
                <form class="temp-form-steps" action="#" style="display: none;">
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Region*</p>
                            <select name="additional_info[to][region_name]" required>
                                @foreach($regions as $region)
                                    <option @if($region->name == $proposal->additional_info->to->region_name) selected @endif value="{{$region->name}}">{{__('front.'.$region->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">PLZ*</p>
                            <input value="{{$proposal->additional_info->to->zip}}" type="text" placeholder="PLZ*" name="additional_info[to][zip]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Ort*</p>
                            <input value="{{$proposal->additional_info->to->city}}" type="text" placeholder="Ort*" name="additional_info[to][city]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Strasse*</p>
                            <input value="{{$proposal->additional_info->to->street}}" type="text" placeholder="Strasse*" name="additional_info[to][street]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Nr*</p>
                            <input value="{{$proposal->additional_info->to->number}}" type="text" placeholder="Nr" name="additional_info[to][number]" required>
                        </div>
                    </div>
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Haustyp</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->to->house_type == 'Mehrfamilienhaus') checked @endif type="radio" name="additional_info[to][house_type]"
                                                   value="Mehrfamilienhaus"><span class="custom-checkbox__txt">Mehrfamilienhaus</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->to->house_type == 'Einfamilienhaus') checked @endif type="radio" name="additional_info[to][house_type]"
                                                   value="Einfamilienhaus"><span class="custom-checkbox__txt">Einfamilienhaus</span>
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
                                            <input @if($proposal->additional_info->to->lift == 'Kein Lift') checked @endif type="radio" name="additional_info[to][lift]"
                                                   value="Kein Lift"><span class="custom-checkbox__txt">Kein Lift</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->to->lift == 'Mit Lift') checked @endif type="radio" name="additional_info[to][lift]" value="Mit Lift"><span
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
                            <input value="{{$proposal->additional_info->to->floor}}" type="text" placeholder="Stock*" name="additional_info[to][floor]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Fläche in m<sup>2</sup>*</p>
                            <input value="{{$proposal->additional_info->to->square}}" type="text" placeholder="Stock" name="additional_info[to][square]" required>
                        </div>
                    </div>
                    <div class="formflex form-field form-field_full">
                        <a class="prev-step" href="#">Zurück</a>
                        <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                    </div>
                </form>
                <form class="temp-form-steps" action="#" style="display: none;" data-url="{{route('client.updateProposals',$proposal->id)}}">
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Reinigungstyp *</p>
                            <input value="{{$proposal->additional_info->cleaning}}" type="text" placeholder="Reinigungstyp *" name="additional_info[cleaning]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Fenster</p>
                            <input value="{{$proposal->additional_info->windows}}" required="required" type="text" placeholder="Fenster" name="additional_info[windows]">
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Dusche /WC </p>
                            <input value="{{$proposal->additional_info->shower_wc}}" required="required" type="text" placeholder="Dusche /WC " name="additional_info[shower_wc]">
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">BAD / WC *</p>
                            <input value="{{$proposal->additional_info->bath_wc}}" required="required" type="text" placeholder="BAD / WC *" name="additional_info[bath_wc]">
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">WC * </p>
                            <input value="{{$proposal->additional_info->wc}}" type="text" placeholder="WC *" name="additional_info[wc]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Bodentyp*</p>
                            <input value="{{$proposal->additional_info->soil_type}}" type="text" placeholder="Bodentyp" name="additional_info[soil_type]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Fenstergrösse *</p>
                            <input value="{{$proposal->additional_info->window_size}}" type="text" placeholder="Fenstergrösse *" name="additional_info[window_size]" required>
                        </div>
                    </div>
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="formflex form-field form-field_full">
                        <a class="prev-step" href="#">Zurück</a>
                        <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                    </div>
                </form>
           </div>
            <div class="container">
                <h2 class="section-title steps-desc__section-title">Umziehen ohne sauber machen? Ein Umzug + Reinigung Dienst macht’s möglich</h2>
                <p class="steps-desc__txt">Jeder Umzug bringt Arbeit mit sich. Vor allem dann, wenn die Entfernung zwischen den Adressen gross ist, die Unterkünfte in hohen Etagen liegen oder nur wenige Helfer zugegen sind, die anpacken können! Last but not least verursacht der Auszug aus den ehemaligen vier Wänden viel Dreck, teilweise sogar viel Abfall. Die gute Nachricht: Mit Offerten 365 finden Sie nicht nur ein erfahrenes und professionelles Umzugsunternehmen! Denn eine Reihe unserer Anbieter hat sich auch auf die professionelle Reinigung von Privat- und Geschäftshaushalten spezialisiert. Zu günstigen Preisen finden Sie (und Ihre Familie/Belegschaft) auf Offerten 365 einen Umzugsprofi, der Ihr komplettes Inventar samt Möbeln sicher zügelt und sämtliche Aufräumarbeiten übernimmt. Leichter umziehen geht nicht.</p>
                <h2 class="section-title steps-desc__section-title">Zwei auf einem Streich: Umzug und Reinigung beantragen</h2>
                <p class="steps-desc__txt">Zeit ist Geld. Und mit einem Anbieter für Umzüge und Reinigungen in Einem sparen Sie äusserst viel Zeit. Ganz besonders lohnenswert ist solch ein Service für Personen, die an einen weit entfernten Ort, eventuell sogar an einen Ort ausserhalb der Schweiz, ziehen. Denn in diesem Fall kann man nicht „mal eben“ zur alten Wohnung fahren und dort „klar Schiff“ machen. Doch genau hierfür gibt es Experten, die Ihnen einerseits beim Umzug und andererseits beim Reinigen der Unterkunft helfen. So gehen Sie sicher, dass Ihr Inventar komplett und vollständig an der neuen Adresse ankommt, dort fachgerecht aufgebaut und gegebenenfalls angeschlossen wird und sämtlicher Dreck, der beim Aus- und Einzug anfällt, entfernt wird.</p>
                <h2 class="section-title steps-desc__section-title">Gründliche, nachhaltige Reinigung? Aber sicher!</h2>
                <p class="steps-desc__txt">Die Listen an Umzugsunternehmen und Reinigungsdiensten sind lang. Ebenso wie die Versprechen auf eine „1A Leistung“. Doch wie vorsichtig transportieren die Unternehmen Möbel & Co. tatsächlich? Und wie sauber werden die gereinigten Unterkünfte? Kann die Kombination aus Transportdienstleister und Reinigungsprofi überhaupt gelingen? Die Antwort lautet: Ja! Damit Sie dieser Antwort nicht blind Vertrauen schenken müssen, hat Offerten 365 strenge Qualitätsstandards eingeführt. Die Anbieter, die mit Offerten 365 zusammenarbeiten, haben etliche Anforderungen zu erfüllen und werden von Zeit zu Zeit in verschiedenen Bereichen durch Offerten 365 oder unseren Partnern überprüft. Doch damit nicht genug: Jeder Nutzer kann nach der Arbeit des Anbieters eine Bewertung geben. Diese wird Ihnen im Profil des Anbieters angezeigt, sodass Sie bereits im Voraus wissen, was hinter dem Versprechen des jeweiligen Unternehmens steckt.</p>
                <h2 class="section-title steps-desc__section-title">Anfragenformular ausfüllen, Umzug planen und Reinigung geniessen</h2>
                <p class="steps-desc__txt">Egal, weshalb Sie umziehen und warum Sie im Anschluss eine Reinigung wünschen: Wir bringen Sie mit dem perfekten Anbieter für Umzüge und Reinigungen zusammen. Vermeiden Sie Ärger mit Nachbarn und dem Vermieter. Treppenhäuser werden ebenso wie die Unterkunft (besenrein) gereinigt und kleine Schönheitsreparaturen erledigt. Der Weg zu Ihrem persönlichen Anbieter ist so kurz wie einfach zugleich: Füllen Sie das Anfragenformular aus und Sie erhalten nach spätestens 24 Stunden bis zu 6 Offerten von verschiedenen Anbietern. Sie haben genügend Zeit, sich die Offerten anzusehen, mit dem Anbieter in Kontakt zu treten und sich dessen Bewertungen durchzulesen. Dank des transparenten Vergleichs sehen Sie auf einen Blick, ob die Bezahlung fair ausfällt und was Sie von dem Anbieter erwarten können. Nachdem Sie einen Auftrag übermittelt und der Anbieter seine Arbeit getan hat, dürfen Sie selbstverständlich Ihre eigene Bewertung abgeben. So helfen Sie anderen Kunden, die ebenfalls auf der Suche nach einem Profi für Umzüge und Reinigungen sind. </p>
            </div>
        </section>
    </div>


@endsection
