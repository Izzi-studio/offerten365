<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\SeoMetaTags;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;

class BlogController extends Controller
{
    public function showCategory(BlogCategories $blogCategory){
        app()->make(SeoMetaTags::class)->setMeta('blog_category',$blogCategory->id);
        return view('front.blog_category',compact(['blogCategory']));
    }

    public function showPost($category, Blog $post){
        app()->make(SeoMetaTags::class)->setMeta('blog',$post->id);
        return view('front.blog_page',compact(['post']));
    }
}
