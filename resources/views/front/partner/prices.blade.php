<div class="mt-3">
    <ul class="partner-prices">
        <li class="partner-prices__item">Malerarbeiten: <span>{{ Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_paint_work') }} Chf</span></li>
        <li class="partner-prices__item">Umzug + Reinigung: <span>{{ Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_transfer_cleaning') }} Chf</span></li>
        <li class="partner-prices__item">Umzug: <span>{{ Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_transfer') }} Chf</span></li>
        <li class="partner-prices__item">Reinigung: <span>{{ Setting::getByKey('system.price.'.auth()->user()->subscription_id.'.cost_cleaning') }} Chf</span></li>
    </ul>
</div>
