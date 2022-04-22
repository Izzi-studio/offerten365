@extends('layouts.app')
@section('content')


<div class="page__content">
    <section class="main-banner main-banner_bg_black main-banner_color_white" style="background-image: url('/images/main-bg_umzug.webp');">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <h1 style="text-transform: none" class="main-banner__title">Jetzt preiswerte Umzugsfirmen finden</h1>
                    <p class="main-banner__subtitle" style="text-transform: none">
                        Möchten Sie gleich starten? Vergleichen Sie in kürzester Zeit bis zu 6 Angebote von erfahrenen Umzugsunternehmen. 
                    </p>
                    <a class="btn mt-2" href="#section-steps">ANFRAGE STARTEN</a>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="container">
            <div class="row d-none d-md-flex">
                <div class="col-lg-8 ml-auto mr-auto">
                    <h2 class="section-title" style="text-transform: none">Wie funktioniert Ihr Umzug mit Offerten 365? 
                    </h2>
                    <p class="how-it-work__subtitle">Sie möchten ohne Stress und Chaos umziehen? Lassen Sie Ihren Umzug von professionellen Umzugshelfern durchführen, die Ihre Wünsche aufs Beste umsetzen! </p>
                    <p class="how-it-work__txt">Mit Offerten 365 können Sie kostenlos Kontakt zu seriösen Umzugsfirmen aufnehmen. </p>
                </div>
            </div>
            <div class="row step-by-step how-it-work__step-by-step">
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">Beschreiben Sie <br> Ihren Umzug</h3>
                    <p class="step-by-step__item-txt">Offerten 365 benötigt nur ein paar Information von Ihnen und schon können Ihnen perfekt passende Umzugsunternehmen vermittelt werden. Ihre Kriterien sind uns wichtig!</p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Eingehende Offerten vergleichen  
                    </h3>
                    <p class="step-by-step__item-txt">Anhand Ihrer Vorstellungen findet Offerten 365 kompetente Umzugsfirmen, die Ihren gesamten Umzug professionell für Sie managen.</p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Sie wählen Ihren Favoriten – den Rest machen wir 
                    </h3>
                    <p class="step-by-step__item-txt">Gratulation! Sie haben sich für ein passendes Umzugsunternehmen entschieden? Akzeptieren Sie in einem letzen Schritt das Angebot und los geht’s.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_1.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt bis zu 6 Umzugsofferten einholen</h2>
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

    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_2.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt professionelle Umzugsfirmen finden</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="advantages">
        <div class="container">
            <h2 class="section-title advantages__section-title" style="text-transform: none">Ihre Vorteile mit Offerten
                365</h2>
            <div class="row advantages__inner">
                <div class="col-sm-6 col-lg-4 advantages__item"><img class="advantages__item-img"
                        src="/images/deal.svg" alt="">
                    <p class="advantages__item-title">Alles wird für Sie erledigt!</p>
                    <p class="advantages__item-txt">Lästiges Suchen nach den richtigen Umzugshelfern? Das ist mit Offerten 365 Geschichte! Lassen Sie sich individuell und kostenlos beraten. Unser Vergleichsrechner braucht nur wenige Sekunden für die Suche nach 6 passenden Zügelunternehmen.</p>
                </div>
                <div class="col-sm-6 col-lg-4 advantages__item"><img class="advantages__item-img"
                        src="/images/skills.svg" alt="">
                    <p class="advantages__item-title">Erstklassiges Preis-Leistungs-Verhältnis</p>
                    <p class="advantages__item-txt">Unsere Plattform möchte neuen Wind in die Umzugsbranche bringen. Wenn Sie sich registrieren lassen, haben Sie eine grosse Auswahl an seriösen Anbietern. Wir arbeiten stets transparent – testen auch Sie unseren Vergleichsrechner und sparen Sie bares Geld!</p>
                </div>
                <div class="col-sm-6 col-lg-4 advantages__item"><img class="advantages__item-img"
                        src="/images/promotion.svg" alt="">
                    <p class="advantages__item-title">Qualität und<br> Kontrolle</p>
                    <p class="advantages__item-txt">Offerten 365 versucht, seinen Kunden viele günstige Angebote zu unterbreiten. Aber nicht nur die Anzahl der Anbieter unserer Internetseite spielt für uns eine Rolle - selbstverständlich achten wir auch auf die Qualität und überprüfen die Dienstleister, die wir Ihnen vorstellen.</p>
                </div>
                <div class="col-sm-6 col-lg-4 advantages__item"><img class="advantages__item-img"
                        src="/images/resume.svg" alt="">
                    <p class="advantages__item-title">Umzugsfirmen prüfen und bewerten</p>
                    <p class="advantages__item-txt">Meldet sich eine Firma auf Ihre Anfrage, können Sie deren Profil begutachten. Bestimmt interessiert es Sie, wie andere Kunden die Umzugsfirma bewertet haben. Auch Ihre eigene Bewertung ist für uns – nach Zustandekommens eines Geschäfts – von grosser Bedeutung.</p>
                </div>
                <div class="col-sm-6 col-lg-4 advantages__item"><img class="advantages__item-img"
                        src="/images/conversation.svg" alt="">
                    <p class="advantages__item-title">Einfache Kommunikation</p>
                    <p class="advantages__item-txt">Bei Offerten 365 soll es leicht und einfach zugehen. Ein unkomplizierter Informationsaustausch ist unserem Team daher wichtig. Wir freuen uns jetzt schon auf Ihre Kontaktaufnahme per E-Mail, Telefon oder Brief.</p>
                </div>
                <div class="col-sm-6 col-lg-4 advantages__item"><img class="advantages__item-img"
                        src="/images/candidates.svg" alt="">
                    <p class="advantages__item-title">Kundenorientiert, kostenfrei, unverbindlich</p>
                    <p class="advantages__item-txt">Bei Offerten 365 bekommen Sie kostenlos und unverbindlich Offerten zugeschickt! Lassen Sie sich Zeit, die Angebote ausgiebig zu überprüfen. Es liegt bei Ihnen, sich für oder gegen einen Anbieter zu entscheiden.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_3.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title section-title_color_white">Sind Sie bereit, mit zuverlässigen Umzugsunternehmen in Kontakt zu treten?
                    </h2>
                    <a class="btn info__btn mt-4 ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-txt">
        <div class="container">
            <h2 class="section-title steps-desc__section-title">Umzugsunternehmen finden leicht gemacht</h2>
            <p class="steps-desc__txt">Der Weg ins neue Eigenheim kann erstaunlich lang, schwer und kostspielig sein.
                Dies müssen vor allem Personen erfahren, die entweder auf eigene Faust oder mit dem „falschen“
                Umzugsunternehmen umziehen. Wenn zum Beispiel die Freunde absagen oder der gewählte Anbieter
                unprofessionell arbeitet, kann sich der Umzug nicht nur verlängern, sondern auch noch überaus
                kostspielig werden. Wie oft hört man von fallen gelassenen TVs oder Macken im Parkett? Mit Offerten 365
                passiert Ihnen das nicht! Über die Plattform erhalten Sie im Handumdrehen eine Auswahl an passenden
                Unternehmen, die Ihnen nicht nur schnell, sondern auch mit Know-how unter die Arme greifen
                beziehungsweise die komplette Arbeit für Sie übernehmen, sofern Sie dies denn wünschen. Tragen Sie die
                relevanten Daten in das Anfragenformular ein und suchen Sie sich den perfekten Umzugshelfer aus.</p>
            <h2 class="section-title steps-desc__section-title">Mit der perfekten Umzugsfirma ans Ziel</h2>
            <p class="steps-desc__txt">Das Herzstück von Offerten 365 ist die Vermittlungsplattform zwischen
                Umzugsunternehmen und Privatkunden. Einige Anbieter sind auch auf das Zügeln grosser Inventare
                spezialisiert und unterstützen somit auch Geschäftskunden, doch der Grossteil an Umzügen ist privater
                Natur. Offerten 365 hat sich deshalb eine möglichst transparente Vermittlung als Ziel gesetzt: Wir
                möchten Ihnen einen Offertenvergleich ermöglichen, mit dem Sie auf einen Blick sehen, ob der Anbieter
                Ihre gewünschten Arbeiten übernimmt. Und wie hoch die Kosten hierfür ausfallen! Denn anders als im
                Geschäftskundenbereich können Privatkunden nicht so leicht ihre Ausgaben abschreiben, wie es grosse
                Firmen tun! Mit Offerten 365 an Ihrer Seite stellen Sie also sicher, dass die gewählte Umzugsfirma die
                von Ihnen gewünschten Leistungen nicht nur anbietet und kompetent erfüllt, sondern dies auch zu
                günstigen Preisen tut. Innerhalb weniger Minuten und mit nur wenigen Klicks sparen Sie schnell mehrere
                Hundert Franken!</p>
            <h2 class="section-title steps-desc__section-title">Vertrauen ist gut, Kontrolle ist besser: Bewertungen
            </h2>
            <p class="steps-desc__txt">Mit Offerten 365 können Sie Ihren Geldbeutel schonen, keine Frage. Doch wie so
                oft gilt es auch in der Umzugsbranche abzuwägen. Besonders günstige Anbieter sparen häufig an der
                falschen Stelle und verärgern ihre Kunden mit unzureichendem Service. Dies soll Ihnen mit Offerten 365
                natürlich nicht passieren! Wir überprüfen die auf unserer Plattform tätigen Anbieter regelmässig und
                achten auf die Bewertung eines Umzugsunternehmens sehr genau. So bringt Offerten 365 Preis und Leistung
                in Einklang. Apropos Bewertung: Bereits vor der Auftragsvergabe dürfen Sie über das Profil des Anbieters
                in Erfahrung bringen, ob dessen Service hält, was er verspricht! In übersichtlichen Punkte-Bewertungen
                wird die Gesamtzufriedenheit vorheriger Kunden des Anbieters visualisiert. Ein Klick auf die Beiträge
                genügt, um detaillierte Infos zu erhalten. Kam der Anbieter rechtzeitig an der Adresse an? Wurden die
                Möbel sachgemäss demontiert, transportiert und aufgebaut? All dies und vieles mehr verrät Ihnen das
                Bewertungsportal.</p>
            <h2 class="section-title steps-desc__section-title">Komplett-Service gewünscht? Anfragenformular nutzen und
                zurücklehnen</h2>
            <p class="steps-desc__txt">Jeder Umzug ist anders und jeder Umzugsteilnehmer benötigt einen anderen Service.
                Offerten 365 versucht deshalb, für jeden Kunden einen massgeschneiderten Umzug zusammenzustellen: Nutzen
                Sie das Anfragenformular, tragen Sie Ihre Daten sowie Ihre benötigten Leistungen ein und lehnen Sie sich
                zurück. Unser Algorithmus findet innerhalb weniger Sekunden passende Anbieter in Ihrer Umgebung und
                kontaktiert diese. Innerhalb von 24 Stunden melden sich die Anbieter bei Ihnen und machen Ihnen eine
                Offerte. Sie haben alle Zeit der Welt, sich zu entscheiden! Beauftragen Sie Anbieter X oder Anbieter Y?
                Selbstverständlich können Sie die Anbieter anschreiben beziehungsweise anrufen. Machen Sie sich ein Bild
                vom Anbieter und entscheiden Sie in aller Ruhe. Und: Vergleichen Sie die Preise! Durch Offerten 365
                können Nutzer bis zu 40 % sparen! Erst nachdem alles geklärt ist, nehmen Sie eine Offerte an. Je
                nachdem, wie der Umzug geklappt hat, dürfen Sie dann den Anbieter selbst bewerten und anderen Nutzern
                helfen, über Offerten 365 das perfekte Umzugsunternehmen zu finden.</p>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_umzug_4.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title">Jetzt bis zu 6 Umzugsofferten einholen</h2>
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
                    <h1 class="section-title steps-desc__section-title">Offerten für Umzug</h1>
                    <p class="steps-desc__txt">Sparen Sie Geld und Zeit, meiden Sie unnötige Mühe! Schicken Sie
                        jetzt in nur zwei Minuten Ihre Anfrage und Sie werden in kurzer Zeit die besten
                        Umzugsofferten erhalten. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="steps-indicators steps-indicators_global-steps steps-indicators_margin_top">
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
            <!--  -->
            <form class="temp-form-steps temp-form-steps temp-form-steps_active" data-global-step="1" action="#" style="display: block;">
                <h3>Von</h3>
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
                </div>
                <input class="btn formBtnMarginTop" type="submit" value="Weiter">
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Von</h3>
                <div class="steps-forms__block steps-forms__wrap">
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
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Von</h3>
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
                <h3>Von</h3>
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
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>
            
            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Von</h3>
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
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" data-global-step="1" action="#" style="display: none;">
                <h3>Von</h3>
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
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Von</h3>
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
                    <div 
                        class="form-field" 
                        oninput="this.querySelector('.range-value').textContent = event.target.value"
                    >
                        <p class="form-field__name">Fläche in <span class="range-value">5</span> m<sup>2</sup>*</p>
                        <div class="wrap-range">
                            <input 
                                type="range" 
                                name="additional_info[from][square]"
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
                <h3>Von</h3>
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
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="1" action="#" style="display: none;">
                <h3>Von</h3>
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
            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Nach</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Region*</p>
                        <select name="additional_info[to][region_name]" required>
                            @foreach($regions as $region)
                            <option value="{{ $region->name}}">{{__('front.'.$region->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Nach</h3>
                <div class="steps-forms__block steps-forms__wrap">
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
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Nach</h3>
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
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;">
                <h3>Nach</h3>
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
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" data-global-step="2" action="#" style="display: none;" data-url="{{ $action }}">
                <h3>Nach</h3>
                <div class="steps-forms__block steps-forms__wrap">
                    <div class="form-field">
                        <p class="form-field__name">Stock*</p>
                        <input type="text" placeholder="Stock*" name="additional_info[to][floor]" required>
                    </div>
                    <div 
                        class="form-field" 
                        oninput="this.querySelector('.range-value').textContent = event.target.value"
                    >
                        <p class="form-field__name">Fläche in <span class="range-value">5</span> m<sup>2</sup>*</p>
                        <div class="wrap-range">
                            <input 
                                type="range" 
                                name="additional_info[to][square]"
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