<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Faq extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faq';

    public function getFaqDescription(){
        return $this->hasOne('App\Models\FaqDescription', 'faq_id', 'id')
            ->where('faq_description.locale',LaravelLocalization::getCurrentLocale());
    }

    // admin
    public function getFaqDescriptionByLocale($locale){
        return $this->hasOne('App\Models\FaqDescription', 'faq_id', 'id')
            ->where('faq_description.locale',$locale)->first();
    }

    public function faqDescriptionDestroy(){
        return $this->hasMany('App\Models\FaqDescription', 'faq_id', 'id');
    }
	
    public function scopeTransfer(){
        return $this->where('type_job_id',1);
    }

    public function scopeCleaning(){
        return $this->where('type_job_id',2);
    }
	
    public function scopeTransferCleaning(){
        return $this->where('type_job_id',3);
    } 
	
	public function scopeMalar(){
        return $this->where('type_job_id',4);
    }

}
