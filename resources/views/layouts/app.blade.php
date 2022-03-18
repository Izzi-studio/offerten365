<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" media="all" href="/css/libs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
    <link rel="stylesheet" media="all"
          href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css">
    <link rel="stylesheet" media="all" href="/css/app.css">
    <link rel="stylesheet" media="all" href="/css/add.css">

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/media/logos/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/media/logos/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/media/logos/favicon-16x16.png">
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JL7TR2GDH3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ 
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-JL7TR2GDH3');
    </script>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K86TV88');</script>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K86TV88"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
</head>
<body>
<div class="page-container">
    <header class="header">
        <div class="container header__container"><a class="header__logo" href="/"><img
                    src="/images/logo-red.svg"
                    alt="Offerten-365-logo"></a>
            <nav class="header__nav">
			<!--<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>-->
                <ul class="header__menu">
                    @guest
                        <li class="header__item"><a class="header__link" href="#">Offerten<span
                                    class="header__sub-arrow"></span></a>
                            <div class="header__wrap-sub-menu">
                                <ul class="header__sub-menu">

                                    <li class="header__sub-item"><a class="header__sub-link"
                                                                    href="{{route('registerFormTransfer')}}">Umzug</a>
                                    </li>
                                    <li class="header__sub-item"><a class="header__sub-link"
                                                                    href="{{route('registerFormCleaning')}}">Reinigung</a>
                                    </li>
                                    <li class="header__sub-item"><a class="header__sub-link"
                                                                    href="{{route('registerFormTransferAndCleaning')}}">Umzug und Reinigung</a></li>
                                    <li class="header__sub-item"><a class="header__sub-link"
                                                                    href="{{route('registerFormPaintingWork')}}">Maler</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        @if(auth()->user()->isClient())
                            <li class="header__item"><a class="header__link" href="#">Offerten<span
                                        class="header__sub-arrow"></span></a>
                                <div class="header__wrap-sub-menu">
                                    <ul class="header__sub-menu">
                                        <li class="header__sub-item"><a class="header__sub-link" href="{{route('showFormTransfer')}}">Umzug</a></li>
                                        <li class="header__sub-item"><a class="header__sub-link" href="{{route('showFormСleaning')}}">Reinigung</a></li>
                                        <li class="header__sub-item"><a class="header__sub-link" href="{{route('showFormTransferAndСleaning')}}">Umzug+ Reinigung</a></li>
                                        <li class="header__sub-item"><a class="header__sub-link" href="{{route('showFormPaintingWork')}}">Maler Offerten</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endguest
                    
                    <li class="header__item"><a class="header__link" href="#">Ratgeber<span
                                class="header__sub-arrow"></span></a>
                        <div class="header__wrap-sub-menu">
                            <ul class="header__sub-menu">
							@foreach($categories as $category)
                                <li class="header__sub-item"><a class="header__sub-link" href="{{route('showCategory',$category->slug)}}">{{$category->getCategoryDescription->name}}</a></li>
							@endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="header__item"><a class="header__link" href="#">Hilfe<span
                                class="header__sub-arrow"></span></a>
                        <div class="header__wrap-sub-menu">
                            <ul class="header__sub-menu">
                                <li class="header__sub-item"><a class="header__sub-link" href="{{route('faq')}}">FAQ</a></li>
                                <li class="header__sub-item"><a class="header__sub-link" href="{{route('staticPage','wie-es-funktioniert')}}">Wie es funktioniert</a></li>
                                <li class="header__sub-item"><a class="header__sub-link" href="{{route('kontakt')}}">Kontakt</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="header__links">
                    @guest
                        <div class="header__login">
                            <a href="{{ route('login') }}" class="header__login-txt">Anmelden<span
                                    class="header__sub-arrow"></span></a>
                            <!--<div class="header__wrap-sub-menu">
                                <ul class="header__sub-menu">
                                    <li class="header__sub-item"><a class="header__sub-link" href="#">Kunde</a></li>
                                    <li class="header__sub-item"><a class="header__sub-link" href="#">Auftragnehmer</a></li>
                                </ul>
                            </div>-->
                        </div>
                        <!-- <a class="header__become-partner" href="{{route('partnerWerden')}}">Firma registrieren</a> -->
                    @else
                        @if(auth()->user()->isClient())
                            <a href="{{route('client.myInfo')}}"
                               class="header__login-txt">{{auth()->user()->name}}</span></a>
                        @elseif(auth()->user()->isPartner())
                            <a href="{{route('partner.myInfo')}}"
                               class="header__login-txt">{{auth()->user()->name}}</span></a>
                        @else
                            <a href="{{route('blog.index')}}"
                               class="header__login-txt">{{auth()->user()->name}}</span></a>
                        @endif
                        <a class="header__become-partner" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Ausloggen</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </nav>
            <button class="burger">
                <div class="icon-bar"></div>
                <div class="icon-bar"></div>
                <div class="icon-bar"></div>
            </button>
        </div>
    </header>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="footer__row"><img class="footer__logo" src="/images/logo-white.svg" alt="Offerten-365-logo"></div>
            <div class="footer__row footer__row_second">
                <div class="footer__wrap footer__wrap_lists">
                    @guest
                        <ul class="footer__list">
                            <li class="footer__list-item footer__list-item_has-sublist"><a>Offerten<span
                                        class="footer__sub-arrow"></span></a>
                                <ul class="footer__sublist">
                                    <li class="footer__sublist-item"><a href="{{route('registerFormTransfer')}}">Umzug</a>
                                    </li>
                                    <li class="footer__sublist-item"><a href="{{route('registerFormTransferAndCleaning')}}">Umzug
                                            + Reinigung</a></li>
                                    <li class="footer__sublist-item"><a
                                            href="{{route('registerFormCleaning')}}">Reinigung</a></li>
                                    <li class="footer__sublist-item"><a href="{{route('registerFormPaintingWork')}}">Malerarbeiten</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        @if(auth()->user()->isClient())
                    <ul class="footer__list">
                        <li class="footer__list-item footer__list-item_has-sublist"><a>Offerten<span
                                    class="footer__sub-arrow"></span></a>
                            <ul class="footer__sublist">
                                <li class="footer__sublist-item"><a href="{{route('registerFormTransfer')}}">Umzug</a>
                                </li>
                                <li class="footer__sublist-item"><a href="{{route('registerFormTransferAndCleaning')}}">Umzug
                                        + Reinigung</a></li>
                                <li class="footer__sublist-item"><a
                                        href="{{route('registerFormCleaning')}}">Reinigung</a></li>
                                <li class="footer__sublist-item"><a href="{{route('registerFormPaintingWork')}}">Malerarbeiten</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                        @endif
                    @endguest
                    <!--
                    <ul class="footer__list">
                        <li class="footer__list-item footer__list-item_has-sublist"><a>Blog / Article<span
                                    class="footer__sub-arrow"></span></a>
                            <ul class="footer__sublist">
                                @foreach($categories as $category)
                                    <li class="footer__sublist-item">
                                        <a href="{{route('showCategory',$category->slug)}}">{{$category->getCategoryDescription->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>-->
                    <ul class="footer__list">
                        <li class="footer__list-item footer__list-item_has-sublist"><a>Hilfe<span
                                    class="footer__sub-arrow"></span></a>
                            <ul class="footer__sublist">
                                <li class="footer__sublist-item"><a href="{{route('faq')}}">FAQ</a></li>
                                <li class="footer__sublist-item"><a href="{{route('staticPage','wie-es-funktioniert')}}">Wie es funktioniert</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="footer__wrap footer__wrap_contact">
                    <p class="footer__contact-title">Kontakt</p>
                    <div class="footer__contact-links"><a class="footer__contact-link footer__contact-link_email"
                                                          href="mailto:info@offerten-365.ch">info@offerten-365.ch</a><a
                            class="footer__contact-link footer__contact-link_tel" href="tel:+0800666060">0800 66 60 60</a>
                    </div>
                </div>
            </div>
            <div class="footer__row footer__row_third">
                <p class="footer__copy">© {{ date('Y') }} Offerten-365.CH </p>
                <div class="footer__links">
                    <a class="footer__link" href="/datenschutz">Datenschutz</a>
                    <a class="footer__link" href="/agb">AGB</a>
                    <a class="footer__link" href="/impressum">Impressum</a>
                    <a class="footer__link" href="{{route('sitemap')}}">Sitemap</a>
                    <a class="footer__link" href="{{route('partnerWerden')}}">Firma&nbsp;registrieren</a>
                </div>
                <div class="footer__contact-soc"><a class="footer__contact-soc-item" href="#"><img src="/images/fb.svg"></a><a
                        class="footer__contact-soc-item" href="#"><img src="/images/inst.svg"></a><a
                        class="footer__contact-soc-item" href="#"><img src="/images/skype.svg"></a><a
                        class="footer__contact-soc-item" href="#"><img src="/images/google-pl.svg"></a></div>
            </div>
        </div>
    </footer>
</div>
<script src="/js/libs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
<script src="/js/app_main.js"></script>
</body>
</html>
