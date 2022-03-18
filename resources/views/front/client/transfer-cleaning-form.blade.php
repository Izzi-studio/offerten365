@extends('layouts.app')
@section('content')

<div class="page__content">
    <section class="main-banner main-banner_bg_black main-banner_color_white" style="background-image: url('/images/main-bg_reinigung_umzug.webp');">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <h1 style="text-transform: none" class="main-banner__title">Jetzt Umzugsunternehmen mit Endreinigung finden</h1>
                    <p class="main-banner__subtitle" style="text-transform: none">
                        Möchten Sie sogleich loslegen? Vergleichen Sie in kürzester Zeit bis zu 6 Angebote von erfahrenen Unternehmen, die sich auf Umzug und Reinigung spezialisiert haben.
                    </p>
                    <a class="btn mt-2" href="#section-steps">ANFRAGE STARTEN</a>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                    <h2 class="section-title" style="text-transform: none">Wie funktioniert Ihr Umzug inkl. Reinigung mit Offerten 365?  
                    </h2>
                    <p class="how-it-work__txt">Mit Offerten 365 können Sie kostenlos Kontakt zu speziellen Umzugsfirmen in Ihrer Umgebung aufnehmen, die auch die Reinigung von Objekten mit in ihren Dienstleistungskatalog aufgenommen haben. </p>
                </div>
            </div>
            <div class="row step-by-step how-it-work__step-by-step">
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">Beschreiben Sie<br> Ihren Umzug + Reinigung </h3>
                    <p class="step-by-step__item-txt">Für die Vorstellung eines passenden Unternehmens genügen uns nur ein paar Angaben Ihrerseits. Für uns sind Ihre Kriterien wichtig!</p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Mehrer Offerten vergleichen
                    </h3>
                    <p class="step-by-step__item-txt">Anhand Ihrer Angaben stellt Offerten 365 Ihnen kompetente Umzugsfirmen vor, die gleichzeitig auch Spezialisten im Bereich der Gebäudereinigung sind. </p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Favoriten auswählen und entspannt zurück lehnen 
                    </h3>
                    <p class="step-by-step__item-txt">Super! Sie haben eine für Sie passende Firma gefunden! Bitte nur noch Angebot akzeptieren und schon kann’s losgehen. Jetzt bis zu 6 Reinigungsofferten einholen
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_reinigung_1.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt bis zu 6 Umzugsofferten inkl. Reinigung erhalten</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="reviews">
        <div class="js-temporary-wrap">
            @foreach($reviews as $review)
            <div class="review reviews__review">
                <p class="review__date">{{$review->date}}</p>
                <p class="review__title mt-2">{{$review->company}}</p>
                <p class="review__txt">{!! $review->getReviewDescription->message !!}</p>
                <div class="review__bottom mt-2">
                    <p class="review__name">{{$review->getReviewDescription->name}}</p>
                    <div class="stars-rating stars-rating_fullness_{{$review->rating}} review__stars-rating"></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="container">
            <h2 class="section-title">Das sagen unsere Kunden</h2>
            <div class="row">
                <div class="col-md-4 reviews__l"></div>
                <div class="col-md-4 reviews__c"></div>
                <div class="col-md-4 reviews__r"></div>
            </div>
            <button class="reviews__btn-more">MEHR BEWERTUNGEN</button>
        </div>
    </section>

    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_reinigung_2.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt bis zu 6 Umzugsofferten inkl. Reinigung erhalten</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="advantages">
        <div class="container">
            <h2 class="section-title advantages__section-title" style="text-transform: none">Ihre Vorteile mit Offerten 365 im Überblick </h2>
            <div class="row advantages__inner">
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/deal.svg" alt="">
                    <p class="advantages__item-title">Alles wird für Sie erledigt!  </p>
                    <p class="advantages__item-txt">Lästiges Suchen nach den richtigen Umzugshelfern + Reinigungshelfern? Nicht mit Offerten 365! Lassen Sie sich individuell und kostenlos beraten. Unser Vergleichsrechner braucht nur wenige Sekunden für die Suche nach 6 passenden Umzugsunternehmen, die auch Reinigung anbieten.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/skills.svg" alt="">
                    <p class="advantages__item-title">Erstklassiges Preis-Leistungs-Verhältnis  </p>
                    <p class="advantages__item-txt">Unsere Plattform möchte neuen Wind in die Umzugsbranche + Reinigungsbranche bringen. Wenn Sie sich registrieren lassen, haben Sie eine grosse Auswahl an seriösen Anbietern. Wir arbeiten stets transparent – testen auch Sie unseren Vergleichsrechner und sparen Sie bares Geld!</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/promotion.svg" alt="">
                    <p class="advantages__item-title">Qualität und<br> Kontrolle </p>
                    <p class="advantages__item-txt">Offerten 365 versucht, seinen Kunden viele günstige Angebote zu unterbreiten. Aber nicht nur die Anzahl der Anbieter unserer Internetseite spielt für uns eine Rolle - selbstverständlich achten wir auch auf die Qualität und überprüfen die Dienstleister, die wir Ihnen vorstellen.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/resume.svg" alt="">
                    <p class="advantages__item-title">Umzugsfirmen prüfen und bewerten</p>
                    <p class="advantages__item-txt">Meldet sich eine Firma auf Ihre Anfrage, können Sie deren Profil begutachten. Bestimmt interessiert es Sie, wie andere Kunden die Umzugsfirma + Reinigungsfirma bewertet haben. Auch Ihre eigene Bewertung ist für uns – nach Zustandekommens eines Geschäfts – von grosser Bedeutung. </p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/conversation.svg" alt="">
                    <p class="advantages__item-title">Einfache Kommunikation </p>
                    <p class="advantages__item-txt">Bei Offerten 365 soll es leicht und einfach zugehen. Ein unkomplizierter Informationsaustausch ist unserem Team daher wichtig. Wir freuen uns jetzt schon auf Ihre Kontaktaufnahme per E-Mail, Telefon oder Brief.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/candidates.svg" alt="">
                    <p class="advantages__item-title">Kundenorientiert, kostenfrei, unverbindlich </p>
                    <p class="advantages__item-txt">Bei Offerten 365 bekommen Sie kostenlos und unverbindlich Offerten zugeschickt! Lassen Sie sich Zeit, die Angebote ausgiebig zu überprüfen. Es liegt bei Ihnen, sich für oder gegen einen Anbieter zu entscheiden.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_reinigung_3.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title section-title_color_white"> Jetzt mit Profiunternehmen für Umzug und Reinigung in Kontakt treten?
                    </h2>
                    <a class="btn info__btn mt-4 ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-txt">
        <div class="container">
            <h2 class="section-title steps-desc__section-title">Umziehen ohne sauber machen? Ein Umzug + Reinigung
                Dienst macht’s möglich</h2>
            <p class="steps-desc__txt">Jeder Umzug bringt Arbeit mit sich. Vor allem dann, wenn die Entfernung zwischen
                den Adressen gross ist, die Unterkünfte in hohen Etagen liegen oder nur wenige Helfer zugegen sind, die
                anpacken können! Last but not least verursacht der Auszug aus den ehemaligen vier Wänden viel Dreck,
                teilweise sogar viel Abfall. Die gute Nachricht: Mit Offerten 365 finden Sie nicht nur ein erfahrenes
                und professionelles Umzugsunternehmen! Denn eine Reihe unserer Anbieter hat sich auch auf die
                professionelle Reinigung von Privat- und Geschäftshaushalten spezialisiert. Zu günstigen Preisen finden
                Sie (und Ihre Familie/Belegschaft) auf Offerten 365 einen Umzugsprofi, der Ihr komplettes Inventar samt
                Möbeln sicher zügelt und sämtliche Aufräumarbeiten übernimmt. Leichter umziehen geht nicht.</p>
            <h2 class="section-title steps-desc__section-title">Zwei auf einem Streich: Umzug und Reinigung beantragen
            </h2>
            <p class="steps-desc__txt">Zeit ist Geld. Und mit einem Anbieter für Umzüge und Reinigungen in Einem sparen
                Sie äusserst viel Zeit. Ganz besonders lohnenswert ist solch ein Service für Personen, die an einen weit
                entfernten Ort, eventuell sogar an einen Ort ausserhalb der Schweiz, ziehen. Denn in diesem Fall kann
                man nicht „mal eben“ zur alten Wohnung fahren und dort „klar Schiff“ machen. Doch genau hierfür gibt es
                Experten, die Ihnen einerseits beim Umzug und andererseits beim Reinigen der Unterkunft helfen. So gehen
                Sie sicher, dass Ihr Inventar komplett und vollständig an der neuen Adresse ankommt, dort fachgerecht
                aufgebaut und gegebenenfalls angeschlossen wird und sämtlicher Dreck, der beim Aus- und Einzug anfällt,
                entfernt wird.</p>
            <h2 class="section-title steps-desc__section-title">Gründliche, nachhaltige Reinigung? Aber sicher!</h2>
            <p class="steps-desc__txt">Die Listen an Umzugsunternehmen und Reinigungsdiensten sind lang. Ebenso wie die
                Versprechen auf eine „1A Leistung“. Doch wie vorsichtig transportieren die Unternehmen Möbel & Co.
                tatsächlich? Und wie sauber werden die gereinigten Unterkünfte? Kann die Kombination aus
                Transportdienstleister und Reinigungsprofi überhaupt gelingen? Die Antwort lautet: Ja! Damit Sie dieser
                Antwort nicht blind Vertrauen schenken müssen, hat Offerten 365 strenge Qualitätsstandards eingeführt.
                Die Anbieter, die mit Offerten 365 zusammenarbeiten, haben etliche Anforderungen zu erfüllen und werden
                von Zeit zu Zeit in verschiedenen Bereichen durch Offerten 365 oder unseren Partnern überprüft. Doch
                damit nicht genug: Jeder Nutzer kann nach der Arbeit des Anbieters eine Bewertung geben. Diese wird
                Ihnen im Profil des Anbieters angezeigt, sodass Sie bereits im Voraus wissen, was hinter dem Versprechen
                des jeweiligen Unternehmens steckt.</p>
            <h2 class="section-title steps-desc__section-title">Anfragenformular ausfüllen, Umzug planen und Reinigung
                geniessen</h2>
            <p class="steps-desc__txt">Egal, weshalb Sie umziehen und warum Sie im Anschluss eine Reinigung wünschen:
                Wir bringen Sie mit dem perfekten Anbieter für Umzüge und Reinigungen zusammen. Vermeiden Sie Ärger mit
                Nachbarn und dem Vermieter. Treppenhäuser werden ebenso wie die Unterkunft (besenrein) gereinigt und
                kleine Schönheitsreparaturen erledigt. Der Weg zu Ihrem persönlichen Anbieter ist so kurz wie einfach
                zugleich: Füllen Sie das Anfragenformular aus und Sie erhalten nach spätestens 24 Stunden bis zu 6
                Offerten von verschiedenen Anbietern. Sie haben genügend Zeit, sich die Offerten anzusehen, mit dem
                Anbieter in Kontakt zu treten und sich dessen Bewertungen durchzulesen. Dank des transparenten
                Vergleichs sehen Sie auf einen Blick, ob die Bezahlung fair ausfällt und was Sie von dem Anbieter
                erwarten können. Nachdem Sie einen Auftrag übermittelt und der Anbieter seine Arbeit getan hat, dürfen
                Sie selbstverständlich Ihre eigene Bewertung abgeben. So helfen Sie anderen Kunden, die ebenfalls auf
                der Suche nach einem Profi für Umzüge und Reinigungen sind. </p>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_reinigung_4.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt bis zu 6 Umzugsofferten inkl. Reinigung erhalten</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="faq pt-5 pb-3">
        <div class="container">
            <h2 class="section-title faq__section-title">FAQ</h2>
            <div class="faq__inner">
                @foreach($faqs as $faq)
                <div class="faq-item">
                    <div class="faq-item__inner">
                        <h3 class="faq-item__title">{{$faq->getFaqDescription->heading}}</h3>
                        <div class="faq-item__content">
                            {!! $faq->getFaqDescription->content !!}
                        </div>
                        <button class="faq-item__btn" data-show-content="Mehr lesen" data-hide-content="Weniger">Mehr lesen</button>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>
    <section id="section-steps">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="section-title steps-desc__section-title">Offerten für Umzug + Reinigung</h1>
                    <p class="steps-desc__txt">Sparen Sie Geld und Zeit, meiden Sie unnötige Mühe! Schicken Sie jetzt in
                        nur zwei Minuten Ihre Anfrage und Sie werden in kurzer Zeit die besten Umzugs +
                        Reinigungsofferten erhalten. </p>
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
                <input type="hidden" name="proposal[type_job_id]" value="3" />
                @csrf
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Region*</p>
                        <select name="proposal[region_id]" required>
                            @foreach($regions as $region)
                            <option value="{{$region->id}}">{{__('front.'.$region->name)}}</option>
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
            <form class="temp-form-steps" action="#" style="display: none;">
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Region*</p>
                        <select name="additional_info[to][region_name]" required>
                            @foreach($regions as $region)
                            <option value="{{$region->name}}">{{__('front.'.$region->name)}}</option>
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
            <form class="temp-form-steps" action="#" style="display: none;" data-url="{{ $action }}">
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