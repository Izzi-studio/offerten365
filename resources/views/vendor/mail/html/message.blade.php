@component('mail::layout')
{{-- Header --}}
@slot('header')
    <p style="padding:30px 0;font-weight:bold;font-size: 36px; margin: 0; text-align: center; color: #D32F2F;">Offerten-365</p>
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
