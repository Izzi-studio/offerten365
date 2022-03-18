<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    protected $fillable = ['message','user_id_from','user_id_to','rating','proposal_id','created_at','updated_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews';



    public function getPostedUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id_from')->withDefault(['*' => null]);
    }

    public function getProposal()
    {
        return $this->hasOne('App\Models\Proposal', 'id', 'proposal_id')->withDefault(['*' => null]);
    }



}
