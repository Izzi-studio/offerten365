@extends('layouts.app')
@section('content')
<section class="congratulations">
    <div class="container congratulations__container">
        <h1 class="section-title section-title_color_red">Vielen Dank!</h1>
        <h2 class="section-title congratulations__subtitle">Ihre Anfrage wurde erfolgreich versendet!</h2>
        <a class="btn mt-4 ml-auto mr-auto" href="{{route('client.myInfo')}}">Zum Konto</a>
    </div>
</section>
@endsection