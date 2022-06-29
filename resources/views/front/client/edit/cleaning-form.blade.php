@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="steps-desc headerHeightMarginTop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8"><a class="go-back-btn" href="#" onclick="window.history.go(-1); return false;"> </a>
                        <h1 class="section-title steps-desc__section-title">Offerten Für Reinigung</h1>
                        <p class="steps-desc__txt">Sparen Sie Geld und Zeit, meiden Sie unnötige Mühe! Schicken Sie jetzt in nur zwei Minuten Ihre Anfrage und Sie werden in kurzer Zeit die besten Reinigungsofferten erhalten. </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="steps-indicators steps-indicators_margin_top">
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
                <form class="temp-form-steps temp-form-steps temp-form-steps_active" action="#" style="display: block;">
                    @csrf
                    <input type="hidden" name="proposal[type_job_id]" value="2"/>
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
                        <div class="form-field form-field_date">
                            <p class="form-field__name">Auftragsdatum *</p>
                            <input type="text" placeholder="Auftragsdatum *" value="{{$proposal->date_start->format('Y-m-d')}}" name="proposal[date_start]"
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
                    <div class="steps-forms__block">
                        <h3 class="steps-form__title">Haustyp</h3>
                        <div class="row steps-form__checkboxes">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->house_type == 'Mehrfamilienhaus') checked @endif type="radio" name="additional_info[house_type]" value="Mehrfamilienhaus"><span class="custom-checkbox__txt">Mehrfamilienhaus</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-checkbox">
                                            <input @if($proposal->additional_info->house_type == 'Einfamilienhaus') checked @endif type="radio" name="additional_info[house_type]" value="Einfamilienhaus"><span class="custom-checkbox__txt">Einfamilienhaus</span>
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
                                        <label class="custom-radio">
                                            <input @if($proposal->additional_info->lift == 'Kein Lift') checked @endif type="radio" name="additional_info[lift]" value="Kein Lift"><span class="custom-radio__txt">Kein Lift</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="custom-radio">
                                            <input @if($proposal->additional_info->lift == 'Mit Lift') checked @endif type="radio" name="additional_info[lift]" value="Mit Lift"><span class="custom-radio__txt">Mit Lift</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="steps-forms__block steps-forms__wrap">
                        <div class="form-field">
                            <p class="form-field__name">Stock*</p>
                            <input value="{{$proposal->additional_info->floor}}" type="text" placeholder="Stock*" name="additional_info[floor]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Anzahl der Zimmer*</p>
                            <input value="{{$proposal->additional_info->rooms}}" type="text" placeholder="z.B. “1 - 1,5 - 2 - 2,5 - 3 - 3,5 - 4 - 4,5 - mehr’’" name="additional_info[rooms]" required>
                        </div>
                        <div class="form-field">
                            <p class="form-field__name">Fläche in m<sup>2</sup>*</p>
                            <input value="{{$proposal->additional_info->square}}" type="text" placeholder="Stock" name="additional_info[square]" required>
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
                                            <input @if($flag && in_array('Keller reinigen',$proposal->additional_info->other)) checked @endif type="checkbox" name="additional_info[other][]" value="Keller reinigen"><span class="custom-checkbox__txt">Keller reinigen</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Estrich reinigen',$proposal->additional_info->other)) checked @endif type="checkbox" name="additional_info[other][]" value="Estrich reinigen"><span class="custom-checkbox__txt">Estrich reinigen</span>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <label class="custom-checkbox">
                                            <input @if($flag && in_array('Garage reinigen',$proposal->additional_info->other)) checked @endif type="checkbox" name="additional_info[other][]" value="Garage reinigen"><span class="custom-checkbox__txt">Garage reinigen</span>
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
                <h2 class="section-title steps-desc__section-title">Im Handumdrehen die Wohnung säubern? Eine professionelle Reinigung macht’s möglich</h2>
                <p class="steps-desc__txt">Die Gründe, eine Reinigung für eine Wohnung oder ein Haus in Anspruch zu nehmen, sind vielseitig. Doch egal, ob Sie als Privat- oder als Geschäftskunde einen Fachmann für eine professionelle Reinigung suchen und egal, weshalb die Unterkunft eine Reinigung benötigt: Mit Offerten 365 finden Sie im Handumdrehen den richtigen Anbieter für diese Leistung. Was Sie tun müssen? Das Anfragenformular ausfüllen, abschicken und abwarten! Wir bringen Sie mit erfahrenen Reinigungsdiensten zusammen und sichern Ihnen eine einzigartige Transparenz. Vergleichen Sie innerhalb weniger Sekunden bis zu 6 Anbieter und wählen Sie Sie Ihren Favoriten. Die Nutzung von Offerten 365 ist kostenlos und unverbindlich, sodass Sie nur gewinnen können. Statistiken aus dem Bereich Umzug & Transport zeigen, dass Nutzer durch ein Vergleichsportal wie Offerten 365 bis zu 40 Prozent sparen.</p>
                <h2 class="section-title steps-desc__section-title">Sauber bis in jede Ecke – perfekten Reinigungsprofi finden</h2>
                <p class="steps-desc__txt">Mit Offerten 365 können Sie eine Vermittlungsplattform für Umzugsunternehmen und weitere Dienstleister nutzen. Dabei ist es ganz gleich, ob Sie als Privat- oder Geschäftskunde auf unsere Plattform zugreifen! Schliesslich sind auch die Gründe, eine Reinigung zu beantragen, sehr vielseitig. Beispielsweise benötigen Firmen eine professionelle Reinigung nach einem Betriebsschaden, etwa im Falle eines Defekts an einer Abfüllanlage. Auch Betroffene, Bekannte oder Vermieter sogenannter Messi-Wohnungen nutzen einen Reinigungsprofi, der die Unterkunft wieder auf Vordermann bringt. Egal, ob Entrümpelung oder Industrieflächenreiniger: Offerten 365 bringt Sie mit Spezialisten zusammen, die Ihnen beziehungsweise Ihrer Familie oder Ihrer Belegschaft kompetent weiterhelfen. Vor allem aber sparen Sie mit Offerten 365 bares Geld! Ohne die Qualität der Leistung zu mindern, locken grosse Ersparnisse. So können Sie nicht nur auf Anhieb sehen, ob der Anbieter die gewünschte Leistung wie zum Beispiel eine Reinigung samt Desinfektion tätigt, sondern auch, wie viele Franken er dafür nimmt – und wie viele sein Konkurrent.</p>
                <h2 class="section-title steps-desc__section-title">Gründliche, nachhaltige Reinigung? Aber sicher!</h2>
                <p class="steps-desc__txt">Die Liste an Profis für Reinigungen ist lang. Ebenso wie deren Versprechen auf eine „absolut saubere Unterkunft“. Doch wie effizient arbeiten die angeblichen Meister tatsächlich? Die Plattform von Offerten 365 setzt auch an diesem Punkt an! Hier finden Sie nicht nur günstige Anbieter für Reinigungen, sondern auch solche, die nachweislich gute Arbeit leisten. Wie wir Ihnen dies versprechen können? Offerten 365 arbeitet mit vielen Partnern in der ganzen Schweiz und teilweise sogar über die Landesgrenzen hinaus zusammen. Das Einhalten bestimmter Standards ist für unser Erfolgsmodell deshalb essenziell. Und ebendiese Standards gewährleisten wir durch Qualitätssicherungen und –kontrollen, die teils von den Anbietern selbst, teils von Offerten 365 und teils von unseren Partnern durchgeführt werden. Und damit nicht genug: In dem Profil eines jeden Anbieters finden Sie ausführliche Bewertungen von anderen Nutzern! So können Sie sich schon im Vorfeld ein umfangreiches Bild über den Anbieter und die Qualität der Reinigung machen.</p>
                <h2 class="section-title steps-desc__section-title">Anfragenformular ausfüllen und die Reinigung startet</h2>
                <p class="steps-desc__txt">Ganz gleich, weshalb Sie eine Reinigung wünschen und welche konkrete Leistungen in dieser enthalten sein sollen: Offerten 365 bringt Sie mit dem perfekten – und günstigsten – Anbieter zusammen. Nutzen Sie das Anfragenformular, tragen Sie die relevanten Daten ein und erhalten Sie innerhalb von 24 Stunden bis zu 6 Offerten. Sie können die Anbieter ausgiebig prüfen und weitere Infos anfordern. Bis zu Ihrer letztendlichen Entscheidung beziehungsweise Ihrer Auftragsvergabe ist die Nutzung von Offerten 365 komplett kostenlos und unverbindlich! Nachdem Sie die Reinigung beantragt haben, rücken die Profis aus und bringen Ihre Wohnung, Ihr Haus, Ihre Garage oder gar Ihre Firma wieder auf Vordermann. Sollten Sie zusätzliche Services wie zum Beispiel eine Entrümpelung wünschen, ist dies selbstverständlich ebenfalls möglich. Tragen Sie Ihren Wunsch in das Anfragenformular ein und suchen Sie sich Ihren Favoriten aus den Anbietern heraus. Und: Geben Sie, nachdem Ihre Unterkunft wieder blitzt und glänzt, eine Bewertung ab. So helfen Sie auch anderen Personen, mit Offerten 365 bares Geld zu sparen und zugleich viel Wert auf Qualität legen.</p>
            </div>
        </section>
    </div>

@endsection
