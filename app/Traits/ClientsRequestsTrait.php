<?php
namespace App\Traits;

use App\Models\SeoMetaTags;

trait ClientsRequestsTrait
{
    /**
     * Display a listing of the transfer request.
     *
     * @return \Illuminate\Http\Response
     */
    public function tRequests()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.client.form_transfer');
        $proposals = auth()->user()->getProposalsByTypeJob(1)->get();
        return view('front.client.cabinet-list-requests')->with(['proposals' => $proposals]);
    }

    /**
     * Display a listing of the cleaning requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function cRequests()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.client.form_cleaning');
        $proposals = auth()->user()->getProposalsByTypeJob(2)->get();
        return view('front.client.cabinet-list-requests')->with(['proposals' => $proposals]);
    }

    /**
     * Display a listing of the transfer+cleaning requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function tcRequests()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.client.form_transfer_and_cleaning');
        $proposals = auth()->user()->getProposalsByTypeJob(3)->get();
        return view('front.client.cabinet-list-requests')->with(['proposals' => $proposals]);
    }

    /**
     * Display a listing of the painting work requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function pwRequests()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.client.form_painting_work');
        $proposals = auth()->user()->getProposalsByTypeJob(4)->get();

        return view('front.client.cabinet-list-requests')->with(['proposals' => $proposals]);
    }
}
