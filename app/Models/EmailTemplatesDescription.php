<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplatesDescription extends Model
{
    use HasFactory;
    protected $fillable = ['locale','name','content','subject','template_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'email_templates_description';
    public $timestamps = false;
}
