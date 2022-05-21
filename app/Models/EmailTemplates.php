<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EmailTemplates extends Model
{
    use HasFactory;
    protected $fillable = ['type'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'email_templates';
    protected $dates = [
        'created_at'
    ];


    public function getEmailTemplateDescription(){
        return $this->hasOne('App\Models\EmailTemplatesDescription', 'template_id', 'id')
            ->where('email_templates_description.locale',LaravelLocalization::getCurrentLocale());
    }

    public function EmailTemplateDescriptionDestroy(){
        return $this->hasMany('App\Models\EmailTemplatesDescription', 'template_id', 'id');
    }

    public function getEmailTemplateDescriptionByLocale($locale){
        return $this->hasOne('App\Models\EmailTemplatesDescription', 'template_id', 'id')
            ->where('email_templates_description.locale',$locale)->first();
    }
}
