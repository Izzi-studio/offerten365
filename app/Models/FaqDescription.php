<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqDescription extends Model
{
    use HasFactory;

    protected $fillable = ['locale','faq_id','heading','content'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faq_description';
}
