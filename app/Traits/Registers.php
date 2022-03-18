<?php

namespace App\Traits;


use Illuminate\Support\Facades\Auth;
use App\Models\TypesOfJobs;
use App\Models\Regions;

trait Registers
{
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function registerPartnerView()
    {
        $typesOfJobs = TypesOfJobs::all();
        $regions = Regions::all();
        return view('front.partner.register',compact(['typesOfJobs','regions']));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

}
