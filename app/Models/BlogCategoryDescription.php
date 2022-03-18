<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoryDescription extends Model
{
    use HasFactory;


    protected $fillable = ['locale','category_id','name','content'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_category_description';
    public $timestamps = false;
}
