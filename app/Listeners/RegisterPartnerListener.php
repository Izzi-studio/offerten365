<?php

namespace App\Listeners;

use App\Events\RegisterPartner;
use Log;
use App\Models\PartnerRegions;
use App\Models\PartnerWantJobs;
use App\Mail\SendEmailAdminRegisterPartner;
use App\Mail\SendEmailPartnerRegister;
use Mail;
use File;  
class RegisterPartnerListener
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
     * @param  RegisterPartner  $event
     * @return void
     */
    public function handle(RegisterPartner $event)
    {  
		$mailable = new SendEmailPartnerRegister($event->user, $event->password);
		Mail::to($event->user->email)->queue($mailable);
		
		  
		$storagePath = storage_path(env('LOCAL_PATH_PARNTERFILE').$event->user->id);
		if(file_exists($storagePath)){
        $files = File::allFiles($storagePath);
		if($files){
			$attach = $files[0]->getRealPath();
			//Log::info('FilePath in listener : '.$attach);
			$mailableAdmin = new SendEmailAdminRegisterPartner($event->user, $event->password, $attach);
			Mail::to(env('MAIL_FROM_ADDRESS'))->queue($mailableAdmin);
		}
		}else{
			$mailableAdmin = new SendEmailAdminRegisterPartner($event->user, $event->password);
			Mail::to(env('MAIL_FROM_ADDRESS'))->queue($mailableAdmin);
		}		 
    }
}
