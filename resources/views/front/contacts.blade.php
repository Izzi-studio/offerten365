@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="contact headerHeightMarginTop defaultPaddings">
            <div class="container"><a class="go-back-btn go-back-btn_margin_bottom" onclick="window.history.go(-1); return false;" href="#"></a>
                <h1 class="section-title contact__section-title">Kontakt</h1>
                <form class="form-contact contact__form-contact" action="#">
                    <div class="form-contact__wrap">
                        <div class="form-field form-contact__form-field">
                            <p class="form-field__name">Name</p>
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="form-field form-contact__form-field">
                            <p class="form-field__name">E-Mail</p>
                            <input type="email" placeholder="E-Mail">
                        </div>
                        <div class="form-field form-contact__form-field">
                            <p class="form-field__name">Telefon</p>
                            <input type="tel" placeholder="Telefon">
                        </div>
                    </div>
                    <div class="form-field form-contact__form-field">
                        <p class="form-field__name">Message*</p>
                        <textarea placeholder="Bemerkungen"></textarea>
                    </div>
                    <input class="btn form-contact__btn" type="submit" value="Frage senden">
                </form>
            </div>
        </section>
    </div>


@stop
