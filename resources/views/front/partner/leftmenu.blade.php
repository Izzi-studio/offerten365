<div class="account-sidebar">
    <div class="account-sidebar__wrap-item">
        <div class="account-sidebar__item @if(route('partner.myInfo')==url()->current()) account-sidebar__item_current @endif">
            <a class="account-sidebar__link" href="{{route('partner.myInfo')}}">Persönliche Daten</a>
            <button class="account-sidebar__btn"></button>
        </div>
        <ul class="account-sidebar__sublist">
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink @if(route('partner.showPasswordForm')==url()->current()) account-sidebar__sublink_current @endif" href="{{route('partner.showPasswordForm')}}">Passwort ändern</a></li>
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink" href="{{route('partner.getAcceptedRequests')}}">Abrechnung</a></li>
        </ul>
    </div>
    <div class="account-sidebar__wrap-item">
        <div class="account-sidebar__item @if(route('partner.getNewRequests')==url()->current()) account-sidebar__item_current @endif">
            <a class="account-sidebar__link" href="{{route('partner.getNewRequests')}}">Anfragen ({{auth()->user()->getCountProposalsCabinet()}})</a>
            <p class="account-sidebar__requests">{{auth()->user()->getProposalsByStatus(0)->count()}}</p>
            <button class="account-sidebar__btn"></button>
        </div>
        <ul class="account-sidebar__sublist">
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink @if(route('partner.getNewRequests')==url()->current()) account-sidebar__sublink_current @endif" href="{{route('partner.getNewRequests')}}#section-account">Offene</a></li>
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink @if(route('partner.getAcceptedRequests')==url()->current()) account-sidebar__sublink_current @endif" href="{{route('partner.getAcceptedRequests')}}#section-account">Angenommene</a></li>
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink @if(route('partner.getRejectedRequests')==url()->current()) account-sidebar__sublink_current @endif" href="{{route('partner.getRejectedRequests')}}#section-account">Abgesagte</a></li>
        </ul>
    </div>
    <div class="account-sidebar__wrap-item @if(route('partner.getReviews')==url()->current()) account-sidebar__item_current @endif">
        <div class="account-sidebar__item"><a class="account-sidebar__link" href="{{route('partner.getReviews')}}">Abgeschlossene Bewerbungen</a></div>
    </div>
    <div class="account-sidebar__wrap-item">
        <div class="account-sidebar__item  @if(route('partner.payment')==url()->current()) account-sidebar__item_current @endif">
            <a class="account-sidebar__link" href="{{route('partner.payment')}}">Guthaben Aufladen</a>
            <button class="account-sidebar__btn"></button>
        </div>
        <ul class="account-sidebar__sublist">
            <!--<li class="account-sidebar__subitem"><a class="account-sidebar__sublink" href="#">Bankkarte hinzufügen</a></li> -->
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink" href="{{route('partner.payment')}}">Payment</a></li>
        </ul>
    </div>
</div>
