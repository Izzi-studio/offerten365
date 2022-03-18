@extends('layouts.app')
@section('content')

    @extends('layouts.app')
@section('content')
    <div class="page__content">
        <section class="p-how-it-works headerHeightMarginTop defaultPaddings">
            <div class="container"> <a class="article__go-back" href="#"></a>
                <h1 class="section-title article__section-title">{{$staticPage->getPageDescription->name}}</h1>
            </div>
            <div class="container p-how-it-works__inner">
                <div class="p-how-it-works__content">
                    {!! $staticPage->getPageDescription->content !!}
                </div>
            </div>
        </section>
    </div>

@stop


@stop
