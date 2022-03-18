<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Traits\ProposalsFormTrait;
use App\Traits\ClientsRequestsTrait;
use App\Traits\ClientInfoTrait;
use App\Traits\ProfilePartnerTrait;
use App\Traits\ReviewTrait;

class ClientController extends Controller
{

    use ProposalsFormTrait;
    use ClientsRequestsTrait;
    use ClientInfoTrait;
    use ProfilePartnerTrait;
    use ReviewTrait;
    public function __construct()
    {
        $this->middleware('client');
    }

}
