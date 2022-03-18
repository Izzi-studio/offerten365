<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProposalToPartner extends Model
{
    use SoftDeletes;
    protected $fillable = ['proposal_id','user_id','status','created_at','updated_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proposals_to_partner';

    public $timestamps = true;


    public function getPartner()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function getReview()
    {
        return $this->belongsTo('App\Models\Review', 'user_id', 'user_id_to')
            ->orderBy('id','DESC')
            ->limit(1)
            ->withDefault(['*' => null]);
    }

    public function getReviewsCount(){
        return $this->hasMany('App\Models\Review','user_id_to','user_id')->count();
    }

    public function getRatingAVG(){
        return $this->hasMany('App\Models\Review','user_id_to','user_id')->avg('rating');
    }

    public function proposal(){
        return $this->hasOne('App\Models\Proposal','id','proposal_id');
    }

}
