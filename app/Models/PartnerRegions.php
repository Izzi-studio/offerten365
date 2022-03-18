<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Regions;

class PartnerRegions extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','region_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partner_regions';
    public $timestamps = false;


    /**
     * Select by type_job_id
     *
     * @param \Illuminate\Database\Eloquent\Builder $query Query, $type_job_id
     *
     * @return void
     */
    public function scopeRegionId($query, int $regionId)
    {
        return $query->where('region_id', $regionId);
    }


    public function getCheckedRegionByUser($userId){

        $partnerRegions = PartnerRegions::whereUserId($userId)
            ->pluck('region_id')
            ->toArray();

        $regions = Regions::all();

        $regions->filter(function($item) use ($partnerRegions){
            return in_array($item->id, $partnerRegions) ? $item->checked = true : $item->checked = false;
        });

        return $regions;
    }
}
