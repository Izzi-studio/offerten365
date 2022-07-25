<?php

namespace App\Listeners;

use App\Events\NewProposal;
use App\Events\NotifyPartner;
use App\Events\SendNewProposalToAdmin;
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

            $dateTimeNow = Carbon::now()->toDateTimeString();
            $conditionUsersAutosubmit = User::getMatchingConditionUsersAutoSubmit($event->proposal->region_id, $event->proposal->type_job_id)
                ->inRandomOrder()
                ->limit(Setting::getByKey('system.setting.limit_responded'))
                ->get();

            Log::info('Found Conditions Autosubmit Users: ' .'Count: '.count($conditionUsersAutosubmit->toArray()).' Data: '. json_encode($conditionUsersAutosubmit->toArray()));


            $countAutoSubmitUsers = $conditionUsersAutosubmit->count();
            //$proposalToPartners = array();
            $emailsNotifyList = array();
            $emailsNotifyListHiddenProposal = array();

            foreach ($conditionUsersAutosubmit as $key => $partner) {

            $skipUser = false;
            $noCoins = false;

                $user = User::find($partner->user_id);

                $price = 0;
                switch ($event->proposal['type_job_id']) {
                    case 1:
                        $price = Setting::getByKey('system.price.'.$user->subscription_id.'.cost_transfer');
                        break;
                    case 2:
                        $price = Setting::getByKey('system.price.'.$user->subscription_id.'.cost_cleaning');
                        break;
                    case 3:
                        $price = Setting::getByKey('system.price.'.$user->subscription_id.'.cost_transfer_cleaning');
                        break;
                    case 4:
                        $price = Setting::getByKey('system.price.'.$user->subscription_id.'.cost_paint_work');
                        break;
                    default:
                        Log::info('Wrong Job Type on pay: '.$event->proposal['type_job_id']);
                }

                if ($user->status != 1 && $user->status != 2) {
                    if($user->status_pay == 1){
                        $minusSum = $price + round(($price/100)*7.7,1);
                        if($user->coins - $minusSum >= 0) {
                            $user->coins = $user->coins - $minusSum;
                            $user->save();
                        }else{
                            $skipUser = true;
                            $noCoins = true;
                            $countAutoSubmitUsers = $countAutoSubmitUsers - 1;
                        }
                    }
                }


                if(!$skipUser && !$noCoins) {
                    $emailsNotifyList[] = [
                        'email' => $user->email,
                        'name' => $user->name,
                    ];
                    $proposalToPartners = [
                        'proposal_id' => $event->proposal->id,
                        'status' => 1,
                        'user_id' => $user->id,
                        'created_at' => $dateTimeNow,
                        'updated_at' => $dateTimeNow,
                    ];
                    ProposalToPartner::insert($proposalToPartners);
                }

                if($skipUser && $noCoins) {
                    $emailsNotifyListHiddenProposal[] = [
                        'email' => $user->email,
                        'name' => $user->name,
                    ];
                    $proposalToPartners = [
                        'proposal_id' => $event->proposal->id,
                        'status' => 0,
                        'user_id' => $user->id,
                        'created_at' => $dateTimeNow,
                        'updated_at' => $dateTimeNow,
                    ];
                    ProposalToPartner::insert($proposalToPartners);
                }
            }
            event(new NotifyPartner($emailsNotifyList, $event->proposal, true));
            event(new NotifyPartner($emailsNotifyListHiddenProposal, $event->proposal, false));

            Log::info('Count autosubmit after process: ' .$countAutoSubmitUsers);


            if($countAutoSubmitUsers < Setting::getByKey('system.setting.limit_responded')) {

                $conditionUsers = User::getMatchingConditionUsers($event->proposal->region_id, $event->proposal->type_job_id)
                    ->inRandomOrder()
                    ->limit(Setting::getByKey('system.setting.limit_recipient_proposal') - $countAutoSubmitUsers)
                    ->get();

                Log::info('Found Conditions Users: ' . 'Count: ' . count($conditionUsers->toArray()) . ' Data: ' . json_encode($conditionUsers->toArray()));
                //Log::info('Limit other user after process: ' . Setting::getByKey('system.setting.limit_recipient_proposal') - $countAutoSubmitUsers);

                //$proposalToPartners = array();
                $emailsNotifyList = array();

                foreach ($conditionUsers as $key => $user) {


                    $emailsNotifyList[] = [
                        'email' => $user->email,
                        'name' => $user->name,
                    ];
                    $proposalToPartners = [
                        'proposal_id' => $event->proposal->id,
                        'user_id' => $user->user_id,
                        'created_at' => $dateTimeNow,
                        'updated_at' => $dateTimeNow,
                    ];
                    ProposalToPartner::insert($proposalToPartners);
                }

                event(new NotifyPartner($emailsNotifyList, $event->proposal,false));
            }

        }
        event(new SendNewProposalToAdmin($event->proposal));

    }
}
