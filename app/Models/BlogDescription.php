<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDescription extends Model
{
    use HasFactory;

    protected $fillable = ['locale','name','content','blog_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_description';
    public $timestamps = false;
}
