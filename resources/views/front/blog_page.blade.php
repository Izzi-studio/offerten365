@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="article headerHeightMarginTop defaultPaddings">
            <div class="container"> <a class="article__go-back" href="#" onclick="window.history.go(-1); return false;"></a>
                <h1 class="section-title article__section-title">{{$post->getBlogDescription->name}}</h1>
            </div>
            <div class="container">
                <img class="article__img" src="{{env('FRONT_PATH_BLOG_IMAGE')}}{{$post->image}}" alt="">
            </div>
            <div class="container article__inner">
                {!! $post->getBlogDescription->content !!}
            </div>
        </section>
    </div>

@endsection