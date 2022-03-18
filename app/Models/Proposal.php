<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use SoftDeletes;
    protected $fillable = ['type','type_job_id','user_id','region_id','additional_info','description','date_start'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proposals';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_added','date_start'
    ];

    protected $casts = [
        'additional_info' => 'array',
    ];

    public function getAdditionalInfoAttribute($value) {
        return json_decode($value);
    }

    public function getUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function getRegion()
    {
        return $this->hasOne('App\Models\Regions', 'id', 'region_id');
    }

    public function getReviews()
    {
        return $this->hasMany('App\Models\Review', 'proposal_id', 'id');
    }


    public function getResponded()
    {
        return $this->hasMany('App\Models\ProposalToPartner', 'proposal_id', 'id')
            ->orderBy('id','DESC')
            ->where('status',1);
    }
    public function getReceivedInvitation()
    {
        return $this->hasMany('App\Models\ProposalToPartner', 'proposal_id', 'id')
            ->orderBy('id','DESC');
    }


}
