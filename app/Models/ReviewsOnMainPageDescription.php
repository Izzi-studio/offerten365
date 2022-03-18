<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewsOnMainPageDescription extends Model
{
    protected $fillable = ['name','message','locale','review_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews_main_page_description';
    public  $timestamps = false;

}
