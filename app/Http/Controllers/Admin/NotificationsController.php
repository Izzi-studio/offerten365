<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceToUser;
use Illuminate\Http\Request;
use App\Events\SendNotificationPartner;

class NotificationsController extends Controller
{

    public function notificationInvoice(){

        $invoiceId = request()->get('invoice_id',null);
        $invoice = InvoiceToUser::find($invoiceId)->first();

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

}
