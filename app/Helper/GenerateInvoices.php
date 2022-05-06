<?php

namespace App\Helper;

use App\Events\SendInvoicePartner;
use App\Events\EmailChangeInfoPartner;
use App\Models\ProposalToPartner;
use App\Models\Setting;
use PDF;
use DB;
use Carbon\Carbon;
use Storage;
use App\Models\InvoiceToUser;
use App\Models\User;

class GenerateInvoices {

    public function totals()
    {
        $invoices = ProposalToPartner::whereRaw("date_format(proposals_to_partner.updated_at, '%Y-%m') = date_format(now() - INTERVAL 1 DAY, '%Y-%m')")
            ->leftjoin('proposals as p', 'p.id', '=', 'proposals_to_partner.proposal_id')
            ->where('proposals_to_partner.status',1)
            //->orderBy('proposals_to_partner.user_id')
            ->groupBy('p.type_job_id')
            ->groupBy('proposals_to_partner.user_id')
            ->select(DB::raw("count( p.type_job_id )as count,
                proposals_to_partner.user_id,
                p.type_job_id
            "))
            ->get();

        $results = [];
        foreach ($invoices as $invoice) {
            $user = User::find($invoice->user_id);
            if (!isset($returnData[$invoice->user_id][$invoice->type_job_id])) {
                $results[$invoice->user_id][$invoice->type_job_id] = 0;
                $results[$invoice->user_id]['total'] = 0;
            }
            switch ($invoice->type_job_id) {
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
                    Log::info('Wrong Job Type in generate invoice: ' . $invoice->type_job_id);
            }

            $results[$invoice->user_id][$invoice->type_job_id] = $results[$invoice->user_id][$invoice->type_job_id] + $price * $invoice->count;
        }

        foreach ($results as $user_id => $item) {
            foreach ($item as $type_of_job => $price) {
                $results[$user_id]['total'] += $price;
            }
        }

        return $results;
    }


    public function generateAndSendInvoices(){



        //$invoices = ProposalToPartner::whereRaw("date_format(updated_at, '%Y-%m') = '2022-01'")
		    $invoices = ProposalToPartner::whereRaw("date_format(updated_at, '%Y-%m') = date_format(now() - INTERVAL 1 DAY, '%Y-%m')")
            ->whereStatus(1)
            ->groupBy('user_id')
            ->select(DB::raw('count(id) as count'),'user_id')
            ->get();


        $month = __('admin/admin.'.Carbon::now()->format('F'));
        $monthBill = __('admin/admin.'.Carbon::now()->subDays(1)->format('F'));
        $dateTo = Carbon::now()->subDays(1)->format('F');

        $year = Carbon::now()->subDays(1)->format('Y');
        $fullDate = Carbon::now()->format('d.m.Y');
        $dueDate = Carbon::now()->addDays(7)->format('d.m.Y');

        //$cost = Setting::getByKey('system.setting.cost_proposal');

        $invoiceNumber = Setting::getByKey('system.invoice_number');

        $totalsAll = $this->totals();

        foreach($invoices as $invoice){
			if(isset($totalsAll[$invoice->user_id])){
            $totals = $totalsAll[$invoice->user_id];

            InvoiceToUser::create([
                'user_id'=>$invoice->user_id,
                'status'=>0,
                'invoice_number'=>$invoiceNumber,
                //'total'=>$invoice->count * $cost,
                'total'=>$totals['total'],
                'period'=>$monthBill,
            ]);

            $userSubsId = $invoice->subscription_id;
            //$count = $invoice->count;
            $nameFile = 'invoice-№'.$invoiceNumber.'-user-'.$invoice->user_id.'-'.$year.'-'.$month.'.pdf';
            $pdf = PDF::loadView('front.partner.invoice-month',compact(['fullDate','monthBill','year','invoiceNumber','invoice','dueDate','totals','userSubsId' ]));
            Storage::put('public/users/invoices/'.$nameFile, $pdf->output());
            event(new SendInvoicePartner($invoice->getPartner->email,storage_path().'/app/public/users/invoices/'.$nameFile));

            $invoiceNumber++;
			}

        }
        $setting = Setting::where('key','system.invoice_number')->firstOrFail();

        $setting->value = $invoiceNumber;

        $setting->save();
    }
}
