<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPageDescription extends Model
{
    use HasFactory;
	    protected $fillable = [
			'custom_page_id','locale',
			'b1_image','b1_text','b1_btn',
			'b2_title','b2_content',
			'b3_image','b3_text','b3_btn',
			'b4_image','b4_text','b4_btn',
			'b5_title','b5_content',
			'b6_image','b6_text','b6_btn',
			'b7_seo_text',
			'b8_text','b8_btn','b8_image'
		];

		
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_pages_description';
    public $timestamps = false;
}
