<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','slug'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog';
    protected $dates = [
        'created_at'
    ];
    public function getSeoMetaTags(){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.locale',LaravelLocalization::getCurrentLocale())
            ->where('seo_meta_tags.type','blog')->withDefault(['*'=>null]);
    }


    public function getBlogDescription(){
        return $this->hasOne('App\Models\BlogDescription', 'blog_id', 'id')
            ->where('blog_description.locale',LaravelLocalization::getCurrentLocale());
    }

    // admin
    public function getBlogCategory(){
        return $this->hasOne('App\Models\BlogCategories', 'id', 'category_id');
    }

    public function getBlogDescriptionByLocale($locale){
        return $this->hasOne('App\Models\BlogDescription', 'blog_id', 'id')
            ->where('blog_description.locale',$locale)->first();
    }

    public function getSeoMetaTagsByLocale($locale){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.locale',$locale)
            ->where('seo_meta_tags.type','blog')->first();
    }

    public function blogDescriptionDestroy(){
        return $this->hasMany('App\Models\BlogDescription', 'blog_id', 'id');
    }

    public function seoMetaTagsDestroy(){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.type','blog');
    }

}
