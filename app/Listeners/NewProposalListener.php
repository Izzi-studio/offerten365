<?php

namespace App\Listeners;

use App\Events\NewProposal;
use App\Events\NotifyPartner;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use App\Models\ProposalToPartner;
use Carbon\Carbon;
class NewProposalListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewProposal  $event
     * @return void
     */
    public function handle(NewProposal $event)
    {
        Log::info('Proposal : '.json_encode($event->proposal->toArray()));
        if(Setting::getByKey('system.setting.autosearch_partner') == 1) {
            $conditionUsers = User::getMatchingConditionUsers($event->proposal->region_id, $event->proposal->type_job_id)
                ->inRandomOrder()
                ->limit(Setting::getByKey('system.setting.limit_recipient_proposal'))
                ->get();

            Log::info('Found Conditions Users: ' . json_encode($conditionUsers->toArray()));

            $proposalToPartners = array();
            $emailsNotifyList = array();

            $dateTimeNow = Carbon::now()->toDateTimeString();

            foreach ($conditionUsers as $key => $user) {
                $emailsNotifyList[] = [
                    'email' => $user->email,
                    'name' => $user->name,
                ];
                $proposalToPartners[] = [
                    'proposal_id' => $event->proposal->id,
                    'user_id' => $user->user_id,
                    'created_at' => $dateTimeNow,
                    'updated_at' => $dateTimeNow,
                ];
            }
			ProposalToPartner::insert($proposalToPartners);
			event(new NotifyPartner($emailsNotifyList, $event->proposal));
        }

    }
}
