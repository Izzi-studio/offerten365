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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>
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
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-auto ml-auto d-flex align-items-center">
                        <a href="{{route('partnerWerden')}}">Firma registrieren</a>
                        <div class="ml-4 d-flex align-items-center">
                            <a href="https://www.facebook.com/offerten365">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a class="ml-3" href="https://www.instagram.com/offerten365.ch/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="container header__container"><a class="header__logo" href="/"><img
                    src="/images/logo-red.webp"
                    alt="Offerten-365-logo"></a>
            <nav class="header__nav">
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
                            <a 
                                href="{{ route('login') }}" 
                                class="header__login-txt"
                            >
                                Anmelden
                                <span class="header__sub-arrow"></span>
                            </a>
                        </div>
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
        </div>
    </header>
    @yield('content')
    <footer class="footer">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 64 4" preserveAspectRatio="none" width="100%" height="100%">
            <path fill="#d81010" d="M64 6 C32 0 32 12 0 6 L0 8 L64 8 Z"></path>
        </svg>
        <div class="footer__inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <br>
                        <img class="footer__logo" src="/images/logo_white.png" alt="">
                        <p class="mt-3">Support: <a href="tel:0800666060">0800 66 60 60</a></p>
                    </div>
                    <div class="col-lg-3 mt-4 mt-lg-0">
                        <h4>Meistgesucht</h4>
                        <p class="mt-3">
                            <a href="https://offerten-365.ch/umzugsfirmen/zuerich/">Umzugsfirma Zürich</a><br>
                            <a href="https://offerten-365.ch/reinigungsfirmen/zuerich/">Reinigungsfirma Zürich</a><br>
                            <a href="https://offerten-365.ch/reinigungsfirmen/bern/">Reinigungsfirma Bern</a><br>
                            <a href="https://offerten-365.ch/umzugsfirmen/luzern/">Umzug Luzern</a><br>
                            <a href="https://offerten-365.ch/reinigungsfirmen/aargau/">Reinigungsfirma Aargau</a><br>
                            <a href="https://offerten-365.ch/reinigungsfirmen/basel/">Reinigungsfirma Basel</a><br>
                            <a href="https://offerten-365.ch/umzugsreinigung/">Umzugsreinigung</a>
                        </p>
                    </div>
                    <div class="col-lg-3 mt-4 mt-lg-0">
                        <h4>Wichtige Infos</h4>
                        <p class="mt-3">
                            <a href="https://offerten-365.ch/agb/">AGBs</a><br>
                            <a title="Kontakt zur Reinigungsfirma" href="https://offerten-365.ch/kontakt/">Kontakt</a><br>
                            <a title="Jetzt Termin buchen" href="https://offerten-365.ch/faq/">FAQ</a><br>
                            <a title="Impressum" href="https://offerten-365.ch/impressum/">Impressum</a><br>
                            <a title="Datenschutzerklärung" href="https://offerten-365.ch/datenschutz/">Datenschutz</a><br>
                            <a title="Seitenübersicht" href="https://offerten-365.ch/seitenuebersicht/">Sitemap</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <p>© 2022 Offerten 365 | Realisierung von <a href="https://www.ara8.de/">ara8.de</a></p>
                    </div>
                    <div class="col-auto">
                        <p><a href="{{route('partnerWerden')}}">Firma Registrieren</a></p>
                    </div>
                </div>
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
