<?php

namespace App\Events;

use App\Models\Proposal;
use Illuminate\Queue\SerializesModels;
use Log;
class NewProposal
{
    use SerializesModels;
    public $proposal;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Proposal $proposal)
    {
        $this->proposal = $proposal;
    }


}
