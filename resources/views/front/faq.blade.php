@extends('layouts.app')
@section('content')



    <div class="page__content">
        <section class="faq headerHeightMarginTop defaultPaddings">
            <div class="container"><a class="go-back-btn" href="#" onclick="window.history.go(-1); return false;"></a>
                <h1 class="section-title faq__section-title">FAQ</h1>
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
                <div class="row">
                    <div class="col-lg-6">
                        <p class="faq__txt">Haben Sie die Antwort auf Ihre Frage nicht gefunden? Fragen&nbsp;Sie jetzt, indem Sie das folgende Formular ausfüllen.</p>
                    </div>
                </div>
                <div class="form-faq faq__form-faq">
                    <div class="form-field form-faq__form-field form-faq__form-field_first">
                        <p class="form-field__name">E-Mail</p>
                        <input type="email" placeholder="E-Mail">
                    </div>
                    <div class="form-field form-faq__form-field">
                        <p class="form-field__name">Bemerkungen</p>
                        <textarea placeholder="Bemerkungen"></textarea>
                    </div>
                    <input class="btn form-faq__btn" type="submit" value="Ausgefüllt">
                </div>
            </div>
        </section>
    </div>

@stop
