<?php

namespace App\Traits;
use App\Models\PartnerRegions;
use App\Models\PartnerWantJobs;
use App\Models\Regions;
use App\Models\Setting;
use App\Models\TypesOfJobs;
use App\Models\User;
use App\Models\Proposal;

trait ProfilePartnerTrait{
    /**
     * show list accept proposals.
     * @param User $user
     * @param Proposal $proposal
     * @return \Illuminate\Http\Response
     */
    public function showProfilePartner(User $user, Proposal $proposal){
        $regions = app()->make(PartnerRegions::class);
        $regions = $regions->getCheckedRegionByUser($user->id);

        $typesofjobs = app()->make(PartnerWantJobs::class);
        $typesofjobs =$typesofjobs->getCheckedTypesJobByUser($user->id);

        $reviews = $user->getReviews()->paginate(Setting::getByKey('system.setting.limit_reviews_partner'));

        return view('front.partner.profile',compact(['regions','typesofjobs','reviews','user','proposal']));
    }

}
