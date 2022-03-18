<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Traits\PartnerRequestsTrait;
use App\Traits\PartnerInfoTrait;
use Illuminate\Http\Request;



class PartnerController extends Controller
{
    use PartnerRequestsTrait;
    use PartnerInfoTrait;

    public function __construct()
    {
        $this->middleware('partner');
    }

	public function active(){
		if (auth()->user()->active == 0){
			 return false;
		} 
		return true;
	}
}
