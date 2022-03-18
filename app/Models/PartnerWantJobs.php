<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TypesOfJobs;
class PartnerWantJobs extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','type_job_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partner_want_jobs';

    public $timestamps = false;

    /**
     * Select by type_job_id
     *
     * @param \Illuminate\Database\Eloquent\Builder $query Query, $typeJobId int
     *
     * @return void
     */
    public function scopeType($query, int $typeJobId)
    {
        return $query->where('type_job_id', $typeJobId);
    }

    public function getCheckedTypesJobByUser($userId){

        $partnerTypeJobs = PartnerWantJobs::whereUserId($userId)->pluck('type_job_id')->toArray();
        $typesofjobs = TypesOfJobs::all();

         $typesofjobs->filter(function($item) use ($partnerTypeJobs){
            return in_array($item->id, $partnerTypeJobs) ? $item->checked = true : $item->checked = false;
        });

        return $typesofjobs;
    }

}
