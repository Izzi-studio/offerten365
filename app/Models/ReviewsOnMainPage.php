<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ReviewsOnMainPage extends Model
{
    protected $fillable = ['rating','avatar','date','company'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews_main_page';
    public  $timestamps = false;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
   /* protected $dates = [
        'date','date'
    ];*/

    public function getReviewDescription(){
        return $this->hasOne('App\Models\ReviewsOnMainPageDescription', 'review_id', 'id')
            ->where('reviews_main_page_description.locale',LaravelLocalization::getCurrentLocale());
    }

    // admin
    public function getReviewDescriptionByLocale($locale){
        return $this->hasOne('App\Models\ReviewsOnMainPageDescription', 'review_id', 'id')
            ->where('reviews_main_page_description.locale',$locale)->first();
    }

    public function reviewDescriptionDestroy(){
        return $this->hasMany('App\Models\ReviewsOnMainPageDescription', 'review_id', 'id');
    }
}
