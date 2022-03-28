@extends('layouts.app')
@section('content')

<div class="page__content">
    <section class="main-banner" style="background-image: url('/images/main-bg_maler.webp');">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <h1 style="text-transform: none" class="main-banner__title">Jetzt preiswerte Malerfirma finden</h1>
                    <p class="main-banner__subtitle" style="text-transform: none">Neuer Anstrich vom Profi gefällig? Mit Offerten 365 finden Sie in nur wenigen Minuten die passende Malerfirma.</p>
                    <a class="btn mt-2" href="#section-steps">ANFRAGE STARTEN</a>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                    <h2 class="section-title" style="text-transform: none">Ihre Malerarbeiten mit Offerten 365</h2>
                    <p class="how-it-work__txt">Nehmen Sie kostenlos Kontakt zu Malerfirmen auf und lassen Sie bei Ihren Arbeiten professionelle Malerhelfer ran! So können Sie sich wirklich auf Ihr neu gestrichenes Zuhause freuen.</p>
                </div>
            </div>
            <div class="row step-by-step how-it-work__step-by-step">
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">Wie planen Sie Ihre Malerarbeiten?</h3>
                    <p class="step-by-step__item-txt">Offerten 365 benötigt nur ein paar Eingaben – schon wird ein passendes Malerunternehmen vorgeschlagen. Wir berücksichtigen Ihre Wünsche!</p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">Vergleichen Sie die eintreffenden Offerten</h3>
                    <p class="step-by-step__item-txt">Kompetente Malerfirmen, die Ihre gesamten Malerarbeiten für Sie managen? Ein Traum? Nein, kein Problem für Offerten 365!</p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Maler auswählen und los geht’s!  
                    </h3>
                    <p class="step-by-step__item-txt">Für Sie war ein passendes Malerunternehmen dabei? Bestens! Bitte Angebot akzeptieren und die neu gestrichenen vier Wände geniessen.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_maler_1.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt bis zu 6 Malerofferten sichern</h2>
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

    <section class="info mt-5" style="background-image: url('/images/info-bg_maler_2.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt professionelle Malerfirma finden</h2>
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
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/deal.svg" alt="">
                    <p class="advantages__item-title">Alles wird für Sie erledigt!</p>
                    <p class="advantages__item-txt">Lästiges Suchen nach den richtigen Umzugshelfern? Das ist mit Offerten 365 Geschichte! Lassen Sie sich individuell und kostenlos beraten. Unser Vergleichsrechner braucht nur wenige Sekunden für die Suche nach 6 passenden Malerunternehmen.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/skills.svg" alt="">
                    <p class="advantages__item-title">Erstklassiges Preis-Leistungs-Verhältnis </p>
                    <p class="advantages__item-txt">Unsere Plattform möchte neuen Wind in die Malerbranche bringen. Wenn Sie sich registrieren lassen, haben Sie eine grosse Auswahl an seriösen Anbietern. Wir arbeiten stets transparent – testen auch Sie unseren Vergleichsrechner und sparen Sie bares Geld!</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/promotion.svg" alt="">
                    <p class="advantages__item-title">Qualität und<br> Kontrolle</p>
                    <p class="advantages__item-txt">Offerten 365 versucht, seinen Kunden viele günstige Angebote zu unterbreiten. Aber nicht nur die Anzahl der Anbieter unserer Internetseite spielt für uns eine Rolle - selbstverständlich achten wir auch auf die Qualität und überprüfen die Dienstleister, die wir Ihnen vorstellen.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/resume.svg" alt="">
                    <p class="advantages__item-title">Malerfirmen abchecken und Bewertung abgeben </p>
                    <p class="advantages__item-txt">Meldet sich eine Firma auf Ihre Anfrage, können Sie deren Profil begutachten. Bestimmt interessiert es Sie, wie andere Kunden das Malerunternehmen bewertet haben. Auch Ihre eigene Bewertung ist für uns – nach Zustandekommens eines Geschäfts – von grosser Bedeutung. </p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/conversation.svg" alt="">
                    <p class="advantages__item-title">Erstklassiges Preis-Leistungs-Verhältnis </p>
                    <p class="advantages__item-txt">Unsere Plattform möchte neuen Wind in die Malerbranche bringen. Wenn Sie sich registrieren lassen, haben Sie eine grosse Auswahl an seriösen Anbietern. Wir arbeiten stets transparent – testen auch Sie unseren Vergleichsrechner und sparen Sie bares Geld!</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/candidates.svg" alt="">
                    <p class="advantages__item-title">Malerfirmen abchecken und Bewertung abgeben </p>
                    <p class="advantages__item-txt">Meldet sich eine Firma auf Ihre Anfrage, können Sie deren Profil begutachten. Bestimmt interessiert es Sie, wie andere Kunden das Malerunternehmen bewertet haben. Auch Ihre eigene Bewertung ist für uns – nach Zustandekommens eines Geschäfts – von grosser Bedeutung.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_maler_3.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title section-title_color_white">Sind Sie bereit, mit zuverlässigen Malerfirmen in Kontakt zu treten?
                    </h2>
                    <a class="btn info__btn mt-4 ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-txt">
        <div class="container">
            <h2 class="section-title steps-desc__section-title">Malerarbeiten vom Profi zu günstigen Preisen</h2>
            <p class="steps-desc__txt">Sie befinden sich auf der Suche nach einem Experten für Malerarbeiten? Sie legen
                grossen Wert auf Zuverlässigkeit und saubere Arbeit? Sie möchten jedoch keine Unsummen für das
                „Anpinseln“ oder das Tapezieren ausgeben? Dann sind Sie bei Offerten 365 bestens aufgehoben. Denn nicht
                nur Umzugsunternehmen gehören zu den Anbietern auf Offerten 365: Malermeister und Unternehmen im
                Malergewerbe nutzen ebenfalls unsere Plattform, um Aufträge zu erhalten. Die stetig wachsende Anzahl an
                Nutzern zeigt, dass sich die Vermittlung lohnt – für den Anbieter ebenso wie für den Kunden! Als Kunde
                sparen Sie zum Beispiel bis zu 40 Prozent der Kosten, die Sie für gewöhnlich, dass heisst ohne einem
                Vergleich, ausgeben müssten. Überlassen Sie den Profis die Arbeit und sparen Sie etliche Franken durch
                Offerten 365.</p>
            <h2 class="section-title steps-desc__section-title">Offerten vergleichen und sparen</h2>
            <p class="steps-desc__txt">Das Kernstück von Offerten 365 ist selbstverständlich auch bei der Vermittlung
                von Malerservices nutzbar. Ganz gleich, wo Sie wohnen und welche Art von Malerarbeiten Sie benötigen:
                Über das Anfragenformular haben Sie im Handumdrehen bis zu 6 potenzielle Anbieter gefunden, die in der
                gesamten Schweiz tätig werden und deren Konditionen Sie nur noch miteinander vergleichen müssen. Und
                deren Preise! Untersuchungen zufolge können Nutzer von Vergleichsplattformen wie Offerten 365 bis zu 40
                % der Kosten für eine Dienstleistung wie zum Beispiel Malerarbeiten sparen. Besonders vorteilhaft: Die
                Anbieter müssen aktiv auf Ihre Anfrage antworten beziehungsweise die Möglichkeit, auf Ihre Anfrage eine
                Offerte abgeben zu können, erwerben. Auf diese Weise ist sichergestellt, dass der Anbieter tatsächlich
                Interesse an dem Auftrag hat, sich mit der gewünschten Malerarbeit auskennt und über genügend
                Kapazitäten verfügt. Sie als Kunde dürfen mit jedem der Anbieter Kontakt aufnehmen und sich in aller
                Ruhe entscheiden. Die Nutzung von Offerten 365 ist bis hierhin absolut kostenlos und unverbindlich.</p>
            <h2 class="section-title steps-desc__section-title">Überlassen Sie den Profis die Arbeit</h2>
            <p class="steps-desc__txt">Sobald Sie sich für einen Anbieter entschieden haben, können Sie dessen Offerte
                akzeptieren. Zum nächst möglichen Zeitpunkt beziehungsweise an Ihrem Wunsch-Termin rückt der Anbieter
                aus und fängt mit der Arbeit an. Sie wünschen zuvor eine detaillierte Planung? Kein Problem! Im Falle
                grosser Projektarbeiten besucht Sie der Anbieter gerne vor dem eigentlichen Arbeitsbeginn, klärt
                eventuelle Fragen und gibt eine Einschätzung, wie schnell die Arbeit getan ist. Denn häufig ist der
                Arbeitsaufwand, der sich zum Beispiel hinter dem Streichen einer Aussenfassade oder dem Tapezieren
                mehrere Etagen verbirgt, schwer aus der Ferne zu beurteilen. So oder so: Der Anbieter beginnt mit der
                Malerarbeit, sobald Sie grünes Licht geben. Damit Sie beruhigt sein können, dass der Anbieter die Arbeit
                auch zu Ihrer Zufriedenheit erledigt, führt Offerten 365 regelmässige Qualitätskontrollen durch und hat
                ein Bewertungssystem entwickelt. Über das Profil eines Anbieters können Kunden die Arbeit, den Service
                und die Zuverlässigkeit des Malers bewerten. So ist sichergestellt, dass Sie bereits vor der
                Auftragsvergabe wissen, wie gut der Maler arbeitet und im Anschluss eine eigene Bewertung abgeben.</p>
            <h2 class="section-title steps-desc__section-title">Anfragenformular ausfüllen und zurücklehnen</h2>
            <p class="steps-desc__txt">Sie möchten direkt Offerten einholen und Ihren Favoriten für Malerarbeiten
                aussuchen? Füllen Sie das Anfragenformular aus und erhalten Sie nach nur 24 Stunden bis zu 6 Offerten
                von verschiedenen Anbietern – zu verschiedenen Preisen. Sie wünschen Zusatzleistungen oder legen Wert
                auf den Einsatz besonderer Farbe? Teilen Sie Ihre Wünsche im Anfragenformular mit und lehnen Sie sich
                zurück. Nach getaner Arbeit dürfen Sie den Anbieter bewerten und helfen somit auch anderen Kunden, die
                mit Offerten 365 bares Geld sparen möchten. Worauf warten Sie also noch? Einfach das Anfragenformular
                ausfüllen und Offerten 365 bringt Sie mit Profis für Malerarbeiten zusammen. Sollten Sie Fragen haben,
                so dürfen Sie uns selbstverständlich eine Mail schreiben, uns anrufen oder das Kontaktformular nutzen.
                Wir freuen uns, Ihnen weiterzuhelfen.</p>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_maler_4.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt bis zu 6 Malerofferten sichern</h2>
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
                    <h1 class="section-title steps-desc__section-title">Maler Offerten</h1>
                    <p class="steps-desc__txt">Sparen Sie Geld und Zeit, vermeiden Sie unnötigen Aufwand! Senden Sie
                        Ihre Anfrage jetzt in nur zwei Minuten und Sie erhalten in kürzester Zeit die besten Angebote
                        für Malerarbeiten. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="progress-bar steps-indicators_margin_top">
        <div class="container">
            <div class="progress-bar__wrap">
                <div class="progress-bar__scale">
                    <div class="progress-bar__fullnely"></div>
                </div>
                <h4 class="progress-bar__percent">0%</h4>
            </div>
        </div>
    </section>
    <section class="steps-forms steps-forms_margin_top steps-forms_margin_bottom">
        <div class="container">
            <!--  -->
            @guest
            <form class="temp-form-steps temp-form-steps_active" action="#" style="display: block;">
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
            <form class="temp-form-steps" data-email-check="{{route('checkEmail')}}" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>
            <form class="temp-form-steps" action="#" style="display: none;">
            @else
            <form class="temp-form-steps temp-form-steps_active" action="#" style="display: block;">
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
            
            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
                <h3>Auftragsinformationen</h3>
                <div class="steps-forms__block">
                    <div class="row steps-form__checkboxes">
                        <div class="col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Malerarbeiten innen"><span class="custom-checkbox__txt">Malerarbeiten
                                            innen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Malerarbeiten aussen"><span
                                            class="custom-checkbox__txt">Malerarbeiten aussen</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Stuckarbeiten"><span
                                            class="custom-checkbox__txt">Stuckarbeiten</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Gipserarbeiten"><span
                                            class="custom-checkbox__txt">Gipserarbeiten</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="additional_info[worktype][]"
                                            value="Isolierarbeiten"><span
                                            class="custom-checkbox__txt">Isolierarbeiten</span>
                                    </label>
                                </div>
                                <div class="col-sm-6 col-md-4">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" data-url="{{ $action  }}" style="display: none;">
                <h3>Auftragsinformationen</h3>
                <div class="steps-forms__block">
                    <div class="form-field form-field_full">
                        <p class="form-field__name">Bemerkungen</p>
                        <textarea placeholder="Bemerkungen" name="proposal[description]"></textarea>
                    </div>
                </div>
                <div class="formflex form-field form-field_full">
                    <a class="prev-step" href="#">Zurück</a>
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>
        </div>
    </section>
</div>



@endsection