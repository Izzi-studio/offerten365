<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use SEOMeta;

class SeoMetaTags extends Model
{
    protected $fillable = ['locale','title','description','type','item_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seo_meta_tags';
    public $timestamps = false;


    public function scopeMetaTagsByType($query,$type){

        return $query->where('type',$type)
            ->where('locale', LaravelLocalization::getCurrentLocale());
    }

    public function setMeta($type, $itemId = 0){
        $metaTags = SeoMetaTags::whereType($type)
            ->whereItemId($itemId)
            ->where('locale', LaravelLocalization::getCurrentLocale())
            ->first();

        if($metaTags) {
            SEOMeta::setTitle($metaTags->title);
            SEOMeta::setDescription($metaTags->description);
        }
    }

}
