@extends('layouts.app')
@section('content')
    <div class="page__content">
        <section class="sitemap headerHeightMarginTop defaultPaddings">
            <div class="container">
                <a class="go-back-btn" href="#" onclick="window.history.go(-1); return false;"></a>
                <h1 class="section-title">Sitemap</h1>
                <div class="mt-4">
                    @foreach(array_keys($result) as $item)
                        <div class="mt-3">
                            <p class="sitemap__subtitle">{{ $item }}</p>
                            <ul class="ml-3 mt-3">
                                @foreach($result[$item] as $subItem)
                                    <li class="mt-2">
                                        <a class="sitemap__link" href="{{ $subItem['url'] }}">{{ $subItem['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>    
                        </div>   
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@stop
