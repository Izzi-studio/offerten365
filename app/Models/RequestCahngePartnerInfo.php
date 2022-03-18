<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCahngePartnerInfo extends Model
{
    protected $fillable = ['user_id','json_info','status'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'request_change_partner_info';

    protected $dates = [
        'created_at'
    ];

    protected $casts = [
        'json_info' => 'array',
    ];

    public function getJsonInfoAttribute($value) {
        return json_decode(json_decode($value));
    }

    public function scopeStatus($value) {
        if($this->status == 1){
            return 'new';
        }
        if($this->status == 2){
            return 'rejected';
        }
        if($this->status == 3){
            return 'accept';
        }
    }
}
