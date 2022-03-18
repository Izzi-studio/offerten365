<?php
namespace App\Traits;

use App\Models\SeoMetaTags;
use SEOMeta;
use App\Models\Setting;
trait PartnerRequestsTrait
{
public $perPage = 10;
    /**
     * show list new proposals.
     *
     * @return \Illuminate\Http\Response
     */
    public function newProposals()
    {
		if(!$this->active()){
			 return view('front.partner.noactive');
		}
		
        app()->make(SeoMetaTags::class)->setMeta('system.partner.new_proposal');

        $proposals = auth()->user()->getProposalsByStatus(0)->paginate($this->perPage);

        $showactionbuttons = true;
        $showdownloadbuttons = false;
        $showAdditionalInfo = false;
		$price = Setting::getByKey('system.setting.cost_transfer');
        return view('front.partner.cabinet-list-requests', compact(['proposals', 'showactionbuttons','showdownloadbuttons','showAdditionalInfo','price']));
    }
    /**
     * show list accept proposals.
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptedProposals()
    {

        $year = request()->get('year',null);
        $month = request()->get('month',null);

		if(!$this->active()){
			 return view('front.partner.noactive');
		}
        app()->make(SeoMetaTags::class)->setMeta('system.partner.accepted_proposal');

        $proposals = auth()->user()->getProposalsByStatusCabinet(1, $year, $month)->paginate($this->perPage);

        $showactionbuttons = false;
        $showdownloadbuttons = true;
        $showAdditionalInfo = true;
        return view('front.partner.cabinet-list-requests', compact(['proposals', 'showactionbuttons','showdownloadbuttons','showAdditionalInfo']));
    }
    /**
     * show list rejected proposals.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejectedProposals()
    {
		if(!$this->active()){
			 return view('front.partner.noactive');
		}		
		
        app()->make(SeoMetaTags::class)->setMeta('system.partner.rejected_proposal');

        $proposals = auth()->user()->getProposalsByStatusCabinet(2)->paginate($this->perPage);
        $showactionbuttons = false;
        $showdownloadbuttons = false;
        $showAdditionalInfo = false;
        return view('front.partner.cabinet-list-requests', compact(['proposals', 'showactionbuttons','showdownloadbuttons','showAdditionalInfo']));
    }
    /**
     * show list review.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.partner.reviews');
        $reviews = auth()->user()->getReviews()->get();

        $showactionbuttons = false;
        $showdownloadbuttons = false;
        return view('front.partner.reviews', compact(['reviews', 'showactionbuttons','showdownloadbuttons']));
    }
}
