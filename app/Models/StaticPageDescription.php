<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPageDescription extends Model
{
    protected $fillable = ['name','content','locale','static_page_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'static_page_description';
    public $timestamps = false;
}
