@extends('layouts.app')
@section('content')
<div class="page__content">
    <section class="main-banner main-banner_home" style="background-image: url('/images/main-bg.webp');">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <h1 style="text-transform: none" class="main-banner__title">Umziehen war noch nie so einfach </h1>
                    <p class="main-banner__subtitle" style="text-transform: none">
                        Sparen Sie mit Offerten 365:
                        <ul class="main-banner__list">
                            <li class="main-banner__item">Zeit</li>
                            <li class="main-banner__item">Geld</li>
                            <li class="main-banner__item">Nerven</li>
                        </ul>
                    </p>
                    @if(!(auth()->user() && auth()->user()->isPartner()))
                    <form class="main-banner__form form-contact-us" action="" method="GET">
                        <div class="form-contact-us__l">
                            <input 
                                required="required" 
                                class="form-contact-us__field" 
                                type="text" 
                                name="zip"
                                placeholder="Ihre Postleitzahl"
                            >
                            <p class="form-contact-us__invalid">Ungültige E-Mail-Adresse</p>
                            <select class="form-contact-us__field" required="required" name="service">
                                <option value="">Bitte wählen Sie einen Dienst</option>
                                <option
                                    value="{{route('registerFormTransfer')}}#section-steps">
                                    Umzug</option>
                                <option
                                    value="{{route('registerFormCleaning')}}#section-steps">
                                    Reinigung</option>
                                <option
                                    value="{{route('registerFormTransferAndCleaning')}}#section-steps">
                                    Umzug und Reinigung</option>
                                <option
                                    value="{{route('registerFormPaintingWork')}}#section-steps">
                                    Maler Offerten</option>
                            </select>
                        </div>
                        <div class="form-contact-us__r">
                            <input class="btn form-contact-us__btn" type="submit" value="Anfrage starten">
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                    <h2 class="section-title" style="text-transform: none">So funktioniert der Umzug mit Offerten 365
                    </h2>
                    <p class="how-it-work__subtitle">Nehmen Sie kostenlos Kontakt zu Umzugsfirmen auf, die Ihren
                        Anforderungen gerecht werden. </p>
                    <p class="how-it-work__txt">Übertragen Sie die Arbeit an professionelle Umzugshelfer und freuen Sie
                        sich auf Ihr neues Eigenheim.</p>
                </div>
            </div>
            <div class="row step-by-step how-it-work__step-by-step">
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">Beschreiben Sie <br> Ihren Umzug</h3>
                    <p class="step-by-step__item-txt">Nur wenige Angaben genügen Offerten 365 für die Vermittlung eines
                        passenden Umzugsunternehmens. Alle wichtigen Punkte werden berücksichtigt.</p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Vergleichen Sie die eintreffenden Angebote
                    </h3>
                    <p class="step-by-step__item-txt">Auf der Basis Ihrer Angaben ermittelt Offerten 365 kompetente
                        Umzugsfirmen, die Ihnen zügig aushelfen.</p>
                </div>
                <div class="col-md-7 col-xl-3 step-by-step__item">
                    <p class="step-by-step__item-counter"></p>
                    <h3 class="step-by-step__item-title">
                        Wählen Sie Ihren Favoriten und lehnen Sie sich zurück
                    </h3>
                    <p class="step-by-step__item-txt">Sie haben Ihr persönliches Umzugsunternehmen gefunden? Bestens!
                        Angebot akzeptieren und auf geht’s ins neue Eigenheim.
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_1.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt Umzugs-Angebot einholen</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="{{route('registerFormTransfer')}}#section-steps">Umzug</a>
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
    <section class="info mt-5" style="background-image: url('/images/info-bg_2.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt Reinigungs-Angebot einholen</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="{{route('registerFormCleaning')}}#section-steps">Reinigung</a>
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
                    <p class="advantages__item-title">Wir nehmen Ihnen jede Arbeit ab</p>
                    <p class="advantages__item-txt">Nur wenige Angaben von Ihnen genügen, und wir haben Ihre Bedürfnisse
                        ausgemacht. Nach wenigen Sekunden sucht der Vergleichsrechner bis zu 6 Umzugsfirmen für Sie
                        heraus. Die Kontaktaufnahme ist kostenlos; die Beratung individuell.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/skills.svg" alt="">
                    <p class="advantages__item-title">Einzigartiges Preis-Leistungs-Verhältnis</p>
                    <p class="advantages__item-txt">Ziel unserer Plattform ist es, den Wettbewerb in der Umzugsbranche
                        zu fördern. Die bisherigen Ergebnisse sind eindeutig: Registrierte Kunden sparen durch die
                        Vergleiche bis zu 40 % an Kosten! Transparenz macht’s möglich.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/promotion.svg" alt="">
                    <p class="advantages__item-title">Geprüfte Anbieter, hohe Qualität</p>
                    <p class="advantages__item-txt">Offerten 365 versucht, möglichst viele Anbieter zu vereinen und
                        somit den Wettbewerb zu steigern. Dennoch achten wir neben der Quantität auch auf die Qualität
                        und überprüfen die Anbieter. So gelingt Ihr Umzug günstig und problemlos zugleich.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/resume.svg" alt="">
                    <p class="advantages__item-title">Umzugsfirmen prüfen und bewerten</p>
                    <p class="advantages__item-txt">Nachdem sich ein Anbieter auf Ihre Offerte gemeldet hat, steht Ihnen
                        dessen Profil zur Verfügung. Erfahren Sie, wie andere Kunden die Umzugsfirma bewerten und
                        vergeben Sie nach der Auftragsüberstellung eine eigene Bewertung.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/conversation.svg" alt="">
                    <p class="advantages__item-title">Kommunikation leicht gemacht</p>
                    <p class="advantages__item-txt">Bei Offerten 365 wird Einfachheit grossgeschrieben. Eine
                        reibungslose und ungezwungene Kommunikation stellt deshalb einen festen Bestandteil unserer
                        Arbeitsweise dar. Ob per Mail, telefonisch oder postalisch: Wir sind immer für Sie da.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/candidates.svg" alt="">
                    <p class="advantages__item-title">Kostenlos, unverbindlich, freundlich</p>
                    <p class="advantages__item-txt">Sämtliche Angebote, die Ihnen Offerten 365 zuschickt, sind kostenlos
                        und unverbindlich! Sie können die Angebote ausgiebig überprüfen und sich völlig frei für oder
                        gegen einen Anbieter entscheiden.</p>
                </div>

                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/deal.svg" alt="">
                    <p class="advantages__item-title">Wir nehmen Ihnen jede Arbeit ab</p>
                    <p class="advantages__item-txt">Nur wenige Angaben von Ihnen genügen, und wir haben Ihre Bedürfnisse
                        ausgemacht. Nach wenigen Sekunden sucht der Vergleichsrechner bis zu 6 Umzugsfirmen für Sie
                        heraus. Die Kontaktaufnahme ist kostenlos; die Beratung individuell.</p>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-3 advantages__item"><img class="advantages__item-img"
                        src="/images/skills.svg" alt="">
                    <p class="advantages__item-title">Einzigartiges Preis-Leistungs-Verhältnis</p>
                    <p class="advantages__item-txt">Ziel unserer Plattform ist es, den Wettbewerb in der Umzugsbranche
                        zu fördern. Die bisherigen Ergebnisse sind eindeutig: Registrierte Kunden sparen durch die
                        Vergleiche bis zu 40 % an Kosten! Transparenz macht’s möglich.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_4.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt Umzugs+Reinigungs Angebot einholen</h2>
                    <a class="btn info__btn mt-4 ml-auto mr-auto" href="{{route('registerFormTransferAndCleaning')}}#section-steps">Umzug + Reinigung</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-txt">
        <div class="container">
            <h2 class="section-title steps-desc__section-title">Umzugsfirma finden – so geht das!</h2>
            <p class="steps-desc__txt">Für einen Umzug gibt es Dutzende Gründe. Aber egal, ob Sie aus persönlichen oder
                beruflichen Gründen umziehen möchten: Offerten 365 hilft Ihnen ohne Wenn und Aber, Ihre Koffer
                beziehungsweise Umzugskartons zu packen. Insbesondere für Selbstständige und Alleinlebende gelingt der
                Adressenwechsel mit einer Umzugsfirma am einfachsten. Wir vermitteln zwischen Hunderten erfahrenen
                Anbietern und interessierten Kunden, die sowohl Unterstützung suchen als auch sparen möchten. Vor allem
                aber sollte die Qualität stimmen. Wir kümmern uns darum, dass alle Anbieter seriös und gewissenhaft
                arbeiten, sodass Sie mit ruhigem Gewissen Ihren Umzug planen können.</p>
            <h2 class="section-title steps-desc__section-title">Regionalität zahlt sich aus: Umzugsfirma in Umgebung
                wählen</h2>
            <p class="steps-desc__txt">Durch die Nutzung unserer Anfragenformulare werden Ihnen bis zu 6 Umzugsfirmen
                vorgeschlagen. Im Handumdrehen können Sie die Leistung und Preis vergleichen. Zudem erhalten Sie einen
                Einblick in die Bewertungs-Historie des Unternehmens. Vor allem aber kümmert sich Offerten 365 darum,
                dass Ihnen lokale Anbieter vorgestellt werden. So umgehen sie zum Beispiel teure Anfahrtsgebühren und
                haben die Möglichkeit, auch persönlich, etwa im Büro des Anbieters, Fragen zu stellen. Überdies gelingt
                so ein Besichtigungstermin wesentlich einfacher, sodass die Planung detaillierter abläuft.</p>
            <h2 class="section-title steps-desc__section-title">Die Mischung macht’s: Preis und Qualität stimmen überein
            </h2>
            <p class="steps-desc__txt">Auch in der Umzugsbranche gilt der Grundsatz, dass der Preis und die Qualität
                einer Dienstleistung oftmals diametral gegenüberstehen. Wer also einen billigen Umzug sucht, nimmt nicht
                selten Einbussen bei der Qualität in Kauf. Wer jedoch Qualität schätzt, muss vermeintlich tiefer in die
                Tasche greifen. Dieser Gedanke ist jedoch überholt! Für jeden Umzug gibt es das richtige Unternehmen,
                das sowohl zuverlässig als auch günstig arbeitet. Offerten 365 vermittelt kompetente Umzugsfirmen und
                ermöglicht einen einfachen Preisvergleich!</p>
            <h2 class="section-title steps-desc__section-title">Ihre Meinung zählt: Anbieter bewerten und Kunden helfen
            </h2>
            <p class="steps-desc__txt">Wie kann man zwischen einem „guten“ Umzugsunternehmen und einem weniger „guten“
                Umzugsunternehmen unterscheiden? Offerten 365 macht Ihnen diese Aufgabe einfach: Anhand Tausender
                Kundenmeinungen, die in den letzten Jahren gesammelt wurden, ist es auf einen Blick möglich, den Service
                eines Anbieters zu beurteilen. Kam der Anbieter rechtzeitig an und wurden die Möbel gut behandelt?
                Sobald Sie die Bewertungen öffnen, erfahren Sie zu diesen und vielen weiteren Punkten mehr.
                Selbstverständlich dürfen Sie auch eine eigene Bewertung hinterlassen und damit anderen Kunden helfen.
            </p>
            <br />
            <br />
            <br />
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('/images/info-bg_3.webp')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">Jetzt Maler Angebot einholen</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="{{route('registerFormPaintingWork')}}#section-steps">Maler</a>
                </div>
            </div>
        </div>
    </section>
    <section class="faq defaultPaddings pt-5">
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
</div>
<style>
    .advantages__item-img {
        max-height: 150px;
    }
</style>
@stop