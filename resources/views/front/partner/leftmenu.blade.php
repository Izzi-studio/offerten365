<div class="account-sidebar">
    <div class="account-sidebar__wrap-item">
        <div class="account-sidebar__item @if(route('partner.myInfo')==url()->current()) account-sidebar__item_current @endif">
            <a class="account-sidebar__link" href="{{route('partner.myInfo')}}">Persönliche Daten</a>
            <button class="account-sidebar__btn"></button>
        </div>
        <ul class="account-sidebar__sublist">
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink @if(route('partner.showPasswordForm')==url()->current()) account-sidebar__sublink_current @endif" href="{{route('partner.showPasswordForm')}}">Passwort ändern</a></li>
        </ul>
    </div>
    <div class="account-sidebar__wrap-item @if(route('partner.abrechnung')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('partner.abrechnung')}}">
            <span class="account-sidebar__link">Abrechnung</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item @if(route('partner.getNewRequests')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('partner.getNewRequests')}}#section-account">
            <span class="account-sidebar__link">Offene Anfragen ({{auth()->user()->getProposalsByStatus(0)->count()}})</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item @if(route('partner.getAcceptedRequests')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('partner.getAcceptedRequests')}}#section-account">
            <span class="account-sidebar__link">Angenommene Anfragen</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item @if(route('partner.getRejectedRequests')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('partner.getRejectedRequests')}}#section-account">
            <span class="account-sidebar__link">Abgesagte Anfragen</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item @if(route('partner.getReviews')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('partner.getReviews')}}">
            <span class="account-sidebar__link">Abgeschlossene Bewerbungen</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item">
        <div class="account-sidebar__item  @if(route('partner.payment')==url()->current()) account-sidebar__item_current @endif">
            <a class="account-sidebar__link" href="{{route('partner.payment')}}">Guthaben Aufladen</a>
            <button class="account-sidebar__btn"></button>
        </div>
        <ul class="account-sidebar__sublist">
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink" href="{{route('partner.payment')}}">Payment</a></li>
            <li class="account-sidebar__subitem"><a class="account-sidebar__sublink" href="{{route('partner.vorgange')}}">Vorgänge</a></li>
        </ul>
    </div>
</div>
