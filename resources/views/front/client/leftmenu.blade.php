<div class="account-sidebar">
    <div class="account-sidebar__wrap-item">
        <div class="account-sidebar__item @if(route('client.myInfo')==url()->current()) account-sidebar__item_current @endif">
            <a class="account-sidebar__link" href="{{route('client.myInfo')}}">Persönliche Daten</a>
            <button class="account-sidebar__btn"></button>
        </div>
        <ul class="account-sidebar__sublist">
            <li class="account-sidebar__subitem">
                <a class="account-sidebar__sublink @if(route('client.showPasswordForm')==url()->current()) account-sidebar__sublink_current @endif" href="{{route('client.showPasswordForm')}}">Passwort ändern</a>
            </li>
        </ul>
    </div>
    <div class="account-sidebar__wrap-item @if(route('client.getTRequests')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('client.getTRequests')}}">
            <span class="account-sidebar__link">Umzug</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item @if(route('client.getCRequests')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('client.getCRequests')}}">
            <span class="account-sidebar__link">Reinigung</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item @if(route('client.getTCRequests')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('client.getTCRequests')}}">
            <span class="account-sidebar__link">Umzug + Reinigung</span>
        </a>
    </div>
    <div class="account-sidebar__wrap-item @if(route('client.getPWRequests')==url()->current()) account-sidebar__item_current @endif">
        <a class="account-sidebar__item" href="{{route('client.getPWRequests')}}">
            <span class="account-sidebar__link">Malerarbeiten</span>
        </a>
    </div>
</div>
