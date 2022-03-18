<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($slug as $url)
@php $parse = explode('@',$url);@endphp
<url>
<loc>{{$parse[0]}}</loc>
<priority>{{$parse[2]}}</priority>
@if (isset($parse[1]) && $parse[1] !=='')
	<lastmod>{{$parse[1]}}</lastmod>
@endif
</url>
@endforeach
</urlset>