<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogCategories extends Model
{
    use HasFactory;

    protected $fillable = ['slug'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
	 
    protected $dates = [
        'created_at'
    ];
	
    protected $table = 'blog_categories';

    public function getSeoMetaTags(){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.locale',LaravelLocalization::getCurrentLocale())
            ->where('seo_meta_tags.type','blog_category')->withDefault(['*'=>null]);
    }
    public function getCategoryDescription(){
        return $this->hasOne('App\Models\BlogCategoryDescription', 'category_id', 'id')
            ->where('blog_category_description.locale',LaravelLocalization::getCurrentLocale())->withDefault(['*'=>null]);
    }

    public function getBlogs(){
        return $this->hasMany('App\Models\Blog', 'category_id', 'id');
    }

    // admin
    public function getCategoryDescriptionByLocale($locale){
        return $this->hasOne('App\Models\BlogCategoryDescription', 'category_id', 'id')
            ->where('blog_category_description.locale',$locale)->first();
    }

    public function getSeoMetaTagsByLocale($locale){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.locale',$locale)
            ->where('seo_meta_tags.type','blog_category')->first();
    }

    public function blogCategoryDescriptionDestroy(){
        return $this->hasMany('App\Models\BlogCategoryDescription', 'category_id', 'id');
    }

    public function seoMetaTagsDestroy(){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.type','blog_category');
    }

}
