<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StaticPage extends Model
{
    protected $fillable = ['slug','image','layout'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'static_page';
    protected $dates = [
        'created_at'
    ];
    public function getPageDescription(){
        return $this->hasOne('App\Models\StaticPageDescription', 'static_page_id', 'id')
            ->where('static_page_description.locale',LaravelLocalization::getCurrentLocale());
    }


    // admin
    public function getStaticPageDescriptionByLocale($locale){
        return $this->hasOne('App\Models\StaticPageDescription', 'static_page_id', 'id')
            ->where('static_page_description.locale',$locale)->first();
    }

    public function getSeoMetaTagsByLocale($locale){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.locale',$locale)
            ->where('seo_meta_tags.type','static_page')->first();
    }

    public function staticPageDescriptionDestroy(){
        return $this->hasMany('App\Models\StaticPageDescription', 'static_page_id', 'id');
    }

    public function seoMetaTagsDestroy(){
        return $this->hasOne('App\Models\SeoMetaTags', 'item_id', 'id')
            ->where('seo_meta_tags.type','static_page');
    }
}
