<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMailingPartner;
use App\Http\Controllers\Controller;
use App\Models\InvoiceToUser;
use Illuminate\Http\Request;
use App\Events\SendNotificationPartner;
use App\Models\PartnerWantJobs;

class NotificationsController extends Controller
{

    public function notificationInvoice(){

        $invoiceId = request()->get('invoice_id',null);
        $invoice = InvoiceToUser::where('id', $invoiceId)->first();

        $monthBill = $invoice->period;
        $year = $invoice->year;
        $nameFile = 'invoice-№'.$invoice->invoice_number.'-user-'.$invoice->user_id.'-'.$year.'-'.$monthBill.'.pdf';

        event(new SendNotificationPartner($invoice, request()->all(), storage_path().'/app/public/users/invoices/'.$nameFile));

        return response()->json([
            'data'=>[
                'result'=>true
            ]
        ]);
    }

    public function notificationSendPartnersEmail(){
        $typeJobsID = request()->get('types_jobs',null);

        if($typeJobsID !== null){
            $partnerJobs = PartnerWantJobs::whereIn('type_job_id', $typeJobsID)->get();
            foreach($partnerJobs as $partner){
                if($partner->getPartner != null){
                    event(new SendMailingPartner(request()->all(),$partner->getPartner));
                }

            }
        }
    }

}
