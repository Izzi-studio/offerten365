<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProposalToPartner;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InvoiceToUser;
use App\Helper\GenerateInvoices;

class InvoiceToUserController extends Controller
{

    public function show(User $partner, InvoiceToUser $invoice)
    {
        $proposalsToPartner = ProposalToPartner::whereUserId($partner->id)
            ->whereRaw("date_format(created_at, '%Y-%m') = '$invoice->full_date'")
            ->whereStatus(1)
            ->get();

        return view('admin.proposal.invoice_detail',compact(['proposalsToPartner','invoice','partner']));

    }

    public function deleteProposalToPartner(ProposalToPartner $proposalToPartner)
    {
        $proposalToPartner->delete();
        return back();
    }

    public function regenerateInvoice(InvoiceToUser $invoice)
    {
        $generator = app()->make(GenerateInvoices::class);
        $generator->regenerateInvoices($invoice);
        return back();
    }

    /**
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  InvoiceToUser $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceToUser $invoice)
    {
        $invoice->update($request->except('_method'));
        return redirect(route('partners.edit',$invoice->user_id));

    }



}
