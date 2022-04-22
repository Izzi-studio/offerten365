@extends('layouts.app')
@section('content')

    <div class="page__content">
        <section class="blog headerHeightMarginTop defaultPaddings">
            <div class="container"><a class="go-back-btn go-back-btn_margin_bottom" onclick="window.history.go(-1); return false;" href="#"></a>
                <h1 class="section-title blog__section-title">{{$blogCategory->getCategoryDescription->name}}</h1>
                <div class="row blog__cards">
                    @foreach($blogCategory->getBlogs as $blog)
                    <div class="col-md-6">
                        <div class="blog-card">
                            <img class="blog-card__img" src="{{env('FRONT_PATH_BLOG_IMAGE')}}{{$blog->image}}" alt="">
                            <h2 class="blog-card__title">{{$blog->getBlogDescription->name}}</h2>
                            <a class="blog-card__read-more" href="{{route('showPost',[$blogCategory->slug,$blog->slug])}}">
                                {{$blog->getBlogDescription->link_text}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

@stop
