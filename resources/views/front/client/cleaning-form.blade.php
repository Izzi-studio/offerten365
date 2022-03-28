@extends('layouts.app')
@section('content')

<div class="page__content">
    <section class="main-banner main-banner_bg_black main-banner_color_white" style="background-image: url('/images/main-bg_reinigung.webp');">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <h1 style="text-transform: none" class="main-banner__title">Jetzt preiswerte Reinigungsfirma finden</h1>
                    <p class="main-banner__subtitle" style="text-transform: none">Sauberkeit leicht gemacht – dank Offerten 365 finden Sie in nur wenigen Klicks die auf Ihre Bedürfnisse zutreffende Reinigungsfirma.</p>
                    <a class="btn mt-2" href="#section-steps">ANFRAGE STARTEN</a>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                    <h2 class="section-title" style="text-transform: none">So funktioniert Ihre Reinigung mit Offerten</h2>
                    <p class="how-it-work__subtitle">Mit Offerten 365 gelingt es Ihnen, völlig kostenfrei mit Reinigungsfirmen in Ihrer Umgebung in Kontakt zu treten.</p>
                    <p class="how-it-work__txt">Lassen Sie diesmal professionelle Reinigungshelfer ran und freuen Sie sich auf mehr Sauberkeit.</p>
                </div>
            </div>
            <div class="row step-by-step how-it-work__step-by-step">
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">Die Umstände Ihrer geplanten Reinigung</h3>
                    <p class="step-by-step__item-txt">Sie denken es ist schwer, ein passendes Reinigungsunternehmens zu finden? Nein, nicht mit Offerten 365 – wir berücksichtigen Ihre Wünsche und Vorstellungen! </p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Eingehende Offerten gegenüberstellen
                    </h3>
                    <p class="step-by-step__item-txt">Offerten 365 macht für Sie kompetente Reinigungsfirmen ausfindig, die Ihr gewünschtes Objekt zum Strahlen bringen. </p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Favoriten auswählen und los geht’s! 
                    </h3>
                    <p class="step-by-step__item-txt">Sie haben ein Reinigungsunternehmen gefunden, das zu Ihren Ansprüchen passt? Angebot zustimmen und saubere vier Wänden vorfinden!
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_reinigung_1.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt bis zu 6 Reinigungsofferten einholen</h2>
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

    <section class="info mt-5" style="background-image: url('/images/info-bg_reinigung_2.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt professionelle Reinigungsfirma finden</h2>
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
                    <p class="advantages__item-title">Alles wird für Sie erledigt! </p>
                    <p class="advantages__item-txt">Lästiges Suchen nach den richtigen Reinigungshelfern? Das ist mit Offerten 365 Geschichte! Lassen Sie sich individuell und kostenlos beraten. Unser Vergleichsrechner braucht nur wenige Sekunden für die Suche nach 6 passenden Reinigungsunternehmen.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/skills.svg" alt="">
                    <p class="advantages__item-title">Erstklassiges Preis-Leistungs-Verhältnis </p>
                    <p class="advantages__item-txt">Unsere Plattform möchte neuen Wind in die Reinigungsbranche bringen. Wenn Sie sich registrieren lassen, haben Sie eine grosse Auswahl an seriösen Anbietern. Wir arbeiten stets transparent – testen auch Sie unseren Vergleichsrechner und sparen Sie bares Geld!</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/promotion.svg" alt="">
                    <p class="advantages__item-title">Qualität und<br> Kontrolle  </p>
                    <p class="advantages__item-txt">Offerten 365 versucht, seinen Kunden viele günstige Angebote zu unterbreiten. Aber nicht nur die Anzahl der Anbieter unserer Internetseite spielt für uns eine Rolle - selbstverständlich achten wir auch auf die Qualität und überprüfen die Dienstleister, die wir Ihnen vorstellen.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/resume.svg" alt="">
                    <p class="advantages__item-title">Firmen abchecken und Bewertung abgeben  </p>
                    <p class="advantages__item-txt">Meldet sich eine Firma auf Ihre Anfrage, können Sie deren Profil begutachten. Bestimmt interessiert es Sie, wie andere Kunden das Reinigungsunternehmen bewertet haben. Auch Ihre eigene Bewertung ist für uns – nach Zustandekommen eines Geschäfts – von grosser Bedeutung. </p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/conversation.svg" alt="">
                    <p class="advantages__item-title">Einfache Kommunikation  </p>
                    <p class="advantages__item-txt">Bei Offerten 365 soll es leicht und einfach zugehen. Ein unkomplizierter Informationsaustausch ist unserem Team daher wichtig. Wir freuen uns jetzt schon auf Ihre Kontaktaufnahme per E-Mail, Telefon oder Brief.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/candidates.svg" alt="">
                    <p class="advantages__item-title">Kundenorientiert, kostenfrei, unverbindlich</p>
                    <p class="advantages__item-txt">Bei Offerten 365 bekommen Sie kostenlos und unverbindlich Offerten zugeschickt! Lassen Sie sich Zeit, die Angebote ausgiebig zu überprüfen. Es liegt bei Ihnen, sich für oder gegen einen Anbieter zu entscheiden.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_reinigung_3.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title section-title_color_white">Sind Sie bereit, mit zuverlässigen Reinigungsfirmen in Kontakt zu treten?
                    </h2>
                    <a class="btn info__btn mt-4 ml-auto mr-auto" href="#section-steps">Offerte einholen</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-txt">
        <div class="container">
            <h2 class="section-title steps-desc__section-title">Im Handumdrehen die Wohnung säubern? Eine professionelle
                Reinigung macht’s möglich</h2>
            <p class="steps-desc__txt">Die Gründe, eine Reinigung für eine Wohnung oder ein Haus in Anspruch zu nehmen,
                sind vielseitig. Doch egal, ob Sie als Privat- oder als Geschäftskunde einen Fachmann für eine
                professionelle Reinigung suchen und egal, weshalb die Unterkunft eine Reinigung benötigt: Mit Offerten
                365 finden Sie im Handumdrehen den richtigen Anbieter für diese Leistung. Was Sie tun müssen? Das
                Anfragenformular ausfüllen, abschicken und abwarten! Wir bringen Sie mit erfahrenen Reinigungsdiensten
                zusammen und sichern Ihnen eine einzigartige Transparenz. Vergleichen Sie innerhalb weniger Sekunden bis
                zu 6 Anbieter und wählen Sie Sie Ihren Favoriten. Die Nutzung von Offerten 365 ist kostenlos und
                unverbindlich, sodass Sie nur gewinnen können. Statistiken aus dem Bereich Umzug & Transport zeigen,
                dass Nutzer durch ein Vergleichsportal wie Offerten 365 bis zu 40 Prozent sparen.</p>
            <h2 class="section-title steps-desc__section-title">Sauber bis in jede Ecke – perfekten Reinigungsprofi
                finden</h2>
            <p class="steps-desc__txt">Mit Offerten 365 können Sie eine Vermittlungsplattform für Umzugsunternehmen und
                weitere Dienstleister nutzen. Dabei ist es ganz gleich, ob Sie als Privat- oder Geschäftskunde auf
                unsere Plattform zugreifen! Schliesslich sind auch die Gründe, eine Reinigung zu beantragen, sehr
                vielseitig. Beispielsweise benötigen Firmen eine professionelle Reinigung nach einem Betriebsschaden,
                etwa im Falle eines Defekts an einer Abfüllanlage. Auch Betroffene, Bekannte oder Vermieter sogenannter
                Messi-Wohnungen nutzen einen Reinigungsprofi, der die Unterkunft wieder auf Vordermann bringt. Egal, ob
                Entrümpelung oder Industrieflächenreiniger: Offerten 365 bringt Sie mit Spezialisten zusammen, die Ihnen
                beziehungsweise Ihrer Familie oder Ihrer Belegschaft kompetent weiterhelfen. Vor allem aber sparen Sie
                mit Offerten 365 bares Geld! Ohne die Qualität der Leistung zu mindern, locken grosse Ersparnisse. So
                können Sie nicht nur auf Anhieb sehen, ob der Anbieter die gewünschte Leistung wie zum Beispiel eine
                Reinigung samt Desinfektion tätigt, sondern auch, wie viele Franken er dafür nimmt – und wie viele sein
                Konkurrent.</p>
            <h2 class="section-title steps-desc__section-title">Gründliche, nachhaltige Reinigung? Aber sicher!</h2>
            <p class="steps-desc__txt">Die Liste an Profis für Reinigungen ist lang. Ebenso wie deren Versprechen auf
                eine „absolut saubere Unterkunft“. Doch wie effizient arbeiten die angeblichen Meister tatsächlich? Die
                Plattform von Offerten 365 setzt auch an diesem Punkt an! Hier finden Sie nicht nur günstige Anbieter
                für Reinigungen, sondern auch solche, die nachweislich gute Arbeit leisten. Wie wir Ihnen dies
                versprechen können? Offerten 365 arbeitet mit vielen Partnern in der ganzen Schweiz und teilweise sogar
                über die Landesgrenzen hinaus zusammen. Das Einhalten bestimmter Standards ist für unser Erfolgsmodell
                deshalb essenziell. Und ebendiese Standards gewährleisten wir durch Qualitätssicherungen und
                –kontrollen, die teils von den Anbietern selbst, teils von Offerten 365 und teils von unseren Partnern
                durchgeführt werden. Und damit nicht genug: In dem Profil eines jeden Anbieters finden Sie ausführliche
                Bewertungen von anderen Nutzern! So können Sie sich schon im Vorfeld ein umfangreiches Bild über den
                Anbieter und die Qualität der Reinigung machen.</p>
            <h2 class="section-title steps-desc__section-title">Anfragenformular ausfüllen und die Reinigung startet
            </h2>
            <p class="steps-desc__txt">Ganz gleich, weshalb Sie eine Reinigung wünschen und welche konkrete Leistungen
                in dieser enthalten sein sollen: Offerten 365 bringt Sie mit dem perfekten – und günstigsten – Anbieter
                zusammen. Nutzen Sie das Anfragenformular, tragen Sie die relevanten Daten ein und erhalten Sie
                innerhalb von 24 Stunden bis zu 6 Offerten. Sie können die Anbieter ausgiebig prüfen und weitere Infos
                anfordern. Bis zu Ihrer letztendlichen Entscheidung beziehungsweise Ihrer Auftragsvergabe ist die
                Nutzung von Offerten 365 komplett kostenlos und unverbindlich! Nachdem Sie die Reinigung beantragt
                haben, rücken die Profis aus und bringen Ihre Wohnung, Ihr Haus, Ihre Garage oder gar Ihre Firma wieder
                auf Vordermann. Sollten Sie zusätzliche Services wie zum Beispiel eine Entrümpelung wünschen, ist dies
                selbstverständlich ebenfalls möglich. Tragen Sie Ihren Wunsch in das Anfragenformular ein und suchen Sie
                sich Ihren Favoriten aus den Anbietern heraus. Und: Geben Sie, nachdem Ihre Unterkunft wieder blitzt und
                glänzt, eine Bewertung ab. So helfen Sie auch anderen Personen, mit Offerten 365 bares Geld zu sparen
                und zugleich viel Wert auf Qualität legen.</p>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_reinigung_4.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title">Jetzt bis zu 6 Reinigungsofferten einholen</h2>
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
                    <h1 class="section-title steps-desc__section-title">Offerten für Reinigung</h1>
                    <p class="steps-desc__txt">Sparen Sie Geld und Zeit, meiden Sie unnötige Mühe! Schicken Sie jetzt in
                        nur zwei Minuten Ihre Anfrage und Sie werden in kurzer Zeit die besten Reinigungsofferten
                        erhalten. </p>
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
            <form class="temp-form-steps temp-form-steps_active" action="#" style="display: block;">
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

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" style="display: none;">
                <h3>Reinigung</h3>
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
            <!--  -->
            <!--  -->
            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>

            <form class="temp-form-steps" action="#" data-url="{{ $action }}" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>
            <!--  -->
            <!--  -->
            @guest
            <form class="temp-form-steps" action="#" style="display: none;">
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
                    <input class="btn formBtnMarginTop" type="submit" value="Weiter">
                </div>
            </form>
            <form class="temp-form-steps" data-email-check="{{route('checkEmail')}}" data-url="{{ $action }}" style="display: none;">
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
            @endguest
            <!--  -->
        </div>

    </section>
</div>

@endsection