@extends('layouts.app')
@section('content')
    <div class="page__content">
        <section class="steps-desc headerHeightMarginTop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8"><a class="go-back-btn" href="#" onclick="window.history.go(-1); return false;"> </a>
                        <h1 class="section-title steps-desc__section-title">Offerten Für Umzug</h1>
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
                    <input type="hidden" name="proposal[type_job_id]" value="1"/>
                    @csrf
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Region*</p>
                            <select name="proposal[region_id]" required>
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}" @if($region->id == $proposal->region_id) selected @endif>{{__('front.'.$region->name)}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">PLZ*</p>
                            <input type="text" placeholder="PLZ*" name="additional_info[from][zip]" value="{{$proposal->additional_info->from->zip}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Ort*</p>
                            <input type="text" placeholder="Ort*" name="additional_info[from][city]" value="{{$proposal->additional_info->from->city}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Strasse*</p>
                            <input type="text" placeholder="Strasse*" name="additional_info[from][street]" value="{{$proposal->additional_info->from->street}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Nr*</p>
                            <input type="text" placeholder="Nr" name="additional_info[from][number]" value="{{$proposal->additional_info->from->number}}">
                        </div>
                        <div class="form-field form-field_date">
                            <p class="form-field__name">Auftragsdatum *</p>
                            <input type="text" placeholder="Auftragsdatum *" name="proposal[date_start]"
                                   data-toggle="datepicker" autocomplete="off" value="{{$proposal->date_start->format('Y-m-d')}}" required>
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
                                            <input @if($proposal->additional_info->from->dayrange == 'Nicht Flexibel') checked @endif  type="radio" name="additional_info[from][dayrange]"
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
                                            <input @if($proposal->additional_info->from->house_type == 'Mehrfamilienhaus') checked @endif type="radio" name="additional_info[from][house_type]"
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
                            <input type="text" placeholder="Stock*" name="additional_info[from][floor]" value="{{$proposal->additional_info->from->floor}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Anzahl der Zimmer*</p>
                            <input type="text" placeholder="z.B. “1 - 1,5 - 2 - 2,5 - 3 - 3,5 - 4 - 4,5 - mehr’’"
                                   name="additional_info[from][rooms]"  value="{{$proposal->additional_info->from->rooms}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Fläche in m<sup>2</sup>*</p>
                            <input type="text" placeholder="Stock" name="additional_info[from][square]" value="{{$proposal->additional_info->from->square}}" required>
                        </div>
                    </div>
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Andere Info</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-sm-10 col-lg-10 col-xl-9">
							@php if(isset($proposal->additional_info->from->other))  {$flag = true;} else {$flag = false;} @endphp
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
										
                                            <input @if($flag && in_array('Keller',explode(',',str_replace(array('[',']','"'),array('','',''),$proposal->additional_info->from->other)))) checked @endif type="checkbox" name="additional_info[from][other][]" value="Keller"><span
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
                <form class="temp-form-steps" action="#" style="display: none;" data-url="{{route('client.updateProposals',$proposal->id)}}">
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Region*</p>
                            <select name="additional_info[to][region_name]" required>
                                @foreach($regions as $region)
                                    <option value="{{ $region->name}}"  @if($region->name == $proposal->additional_info->to->region_name) selected @endif >{{__('front.'.$region->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">PLZ*</p>
                            <input type="text" placeholder="PLZ*" name="additional_info[to][zip]" value="{{$proposal->additional_info->to->zip}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Ort*</p>
                            <input type="text" placeholder="Ort*" name="additional_info[to][city]" value="{{$proposal->additional_info->to->city}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Strasse*</p>
                            <input type="text" placeholder="Strasse*" name="additional_info[to][street]" value="{{$proposal->additional_info->to->street}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Nr*</p>
                            <input type="text" placeholder="Nr" name="additional_info[to][number]" value="{{$proposal->additional_info->to->number}}" required>
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
                                            <input type="radio" @if($proposal->additional_info->to->house_type == 'Einfamilienhaus') checked @endif name="additional_info[to][house_type]"
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
                                            <input  @if($proposal->additional_info->to->lift == 'Kein Lift') checked @endif type="radio" name="additional_info[to][lift]"
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
                            <input type="text" placeholder="Stock*" name="additional_info[to][floor]" value="{{$proposal->additional_info->to->floor}}" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Fläche in m<sup>2</sup>*</p>
                            <input type="text" placeholder="Stock" name="additional_info[to][square]" value="{{$proposal->additional_info->to->square}}" required>
                        </div>
                    </div>
					{{ method_field('PUT') }}
					@csrf
                    <div class="formflex form-field form-field_full">
                        <a class="prev-step" href="#">Zurück</a>
                        <input class="btn formBtnMarginTop" type="submit" value="Ausgefüllt">
                    </div>
                </form>
            </div>
            <div class="container">
                <h2 class="section-title steps-desc__section-title">Umzugsunternehmen finden leicht gemacht</h2>
                <p class="steps-desc__txt">Der Weg ins neue Eigenheim kann erstaunlich lang, schwer und kostspielig sein. Dies müssen vor allem Personen erfahren, die entweder auf eigene Faust oder mit dem „falschen“ Umzugsunternehmen umziehen. Wenn zum Beispiel die Freunde absagen oder der gewählte Anbieter unprofessionell arbeitet, kann sich der Umzug nicht nur verlängern, sondern auch noch überaus kostspielig werden. Wie oft hört man von fallen gelassenen TVs oder Macken im Parkett? Mit Offerten 365 passiert Ihnen das nicht! Über die Plattform erhalten Sie im Handumdrehen eine Auswahl an passenden Unternehmen, die Ihnen nicht nur schnell, sondern auch mit Know-how unter die Arme greifen beziehungsweise die komplette Arbeit für Sie übernehmen, sofern Sie dies denn wünschen. Tragen Sie die relevanten Daten in das Anfragenformular ein und suchen Sie sich den perfekten Umzugshelfer aus.</p>
                <h2 class="section-title steps-desc__section-title">Mit der perfekten Umzugsfirma ans Ziel</h2>
                <p class="steps-desc__txt">Das Herzstück von Offerten 365 ist die Vermittlungsplattform zwischen Umzugsunternehmen und Privatkunden. Einige Anbieter sind auch auf das Zügeln grosser Inventare spezialisiert und unterstützen somit auch Geschäftskunden, doch der Grossteil an Umzügen ist privater Natur. Offerten 365 hat sich deshalb eine möglichst transparente Vermittlung als Ziel gesetzt: Wir möchten Ihnen einen Offertenvergleich ermöglichen, mit dem Sie auf einen Blick sehen, ob der Anbieter Ihre gewünschten Arbeiten übernimmt. Und wie hoch die Kosten hierfür ausfallen! Denn anders als im Geschäftskundenbereich können Privatkunden nicht so leicht ihre Ausgaben abschreiben, wie es grosse Firmen tun! Mit Offerten 365 an Ihrer Seite stellen Sie also sicher, dass die gewählte Umzugsfirma die von Ihnen gewünschten Leistungen nicht nur anbietet und kompetent erfüllt, sondern dies auch zu günstigen Preisen tut. Innerhalb weniger Minuten und mit nur wenigen Klicks sparen Sie schnell mehrere Hundert Franken!</p>
                <h2 class="section-title steps-desc__section-title">Vertrauen ist gut, Kontrolle ist besser: Bewertungen</h2>
                <p class="steps-desc__txt">Mit Offerten 365 können Sie Ihren Geldbeutel schonen, keine Frage. Doch wie so oft gilt es auch in der Umzugsbranche abzuwägen. Besonders günstige Anbieter sparen häufig an der falschen Stelle und verärgern ihre Kunden mit unzureichendem Service. Dies soll Ihnen mit Offerten 365 natürlich nicht passieren! Wir überprüfen die auf unserer Plattform tätigen Anbieter regelmässig und achten auf die Bewertung eines Umzugsunternehmens sehr genau. So bringt Offerten 365 Preis und Leistung in Einklang. Apropos Bewertung: Bereits vor der Auftragsvergabe dürfen Sie über das Profil des Anbieters in Erfahrung bringen, ob dessen Service hält, was er verspricht! In übersichtlichen Punkte-Bewertungen wird die Gesamtzufriedenheit vorheriger Kunden des Anbieters visualisiert. Ein Klick auf die Beiträge genügt, um detaillierte Infos zu erhalten. Kam der Anbieter rechtzeitig an der Adresse an? Wurden die Möbel sachgemäss demontiert, transportiert und aufgebaut? All dies und vieles mehr verrät Ihnen das Bewertungsportal.</p>
                <h2 class="section-title steps-desc__section-title">Komplett-Service gewünscht? Anfragenformular nutzen und zurücklehnen</h2>
                <p class="steps-desc__txt">Jeder Umzug ist anders und jeder Umzugsteilnehmer benötigt einen anderen Service. Offerten 365 versucht deshalb, für jeden Kunden einen massgeschneiderten Umzug zusammenzustellen: Nutzen Sie das Anfragenformular, tragen Sie Ihre Daten sowie Ihre benötigten Leistungen ein und lehnen Sie sich zurück. Unser Algorithmus findet innerhalb weniger Sekunden passende Anbieter in Ihrer Umgebung und kontaktiert diese. Innerhalb von 24 Stunden melden sich die Anbieter bei Ihnen und machen Ihnen eine Offerte. Sie haben alle Zeit der Welt, sich zu entscheiden! Beauftragen Sie Anbieter X oder Anbieter Y? Selbstverständlich können Sie die Anbieter anschreiben beziehungsweise anrufen. Machen Sie sich ein Bild vom Anbieter und entscheiden Sie in aller Ruhe. Und: Vergleichen Sie die Preise! Durch Offerten 365 können Nutzer bis zu 40 % sparen! Erst nachdem alles geklärt ist, nehmen Sie eine Offerte an. Je nachdem, wie der Umzug geklappt hat, dürfen Sie dann den Anbieter selbst bewerten und anderen Nutzern helfen, über Offerten 365 das perfekte Umzugsunternehmen zu finden.</p>
            </div>
        </section>
    </div>

@endsection
