@extends('layouts.app')
@section('content')
<div class="page__content">
    <section class="account headerHeightMarginTop">
        <div class="container">
            @include('front.partner.top')
            <div class="row">
                <div class="col-lg-4">
                    @include('front.partner.leftmenu')
                    @include('front.partner.prices')
                </div>
                <div class="col-lg-8">
                    <div class="account-content" id="section-account">
                        <div class="account-content__inner acc-billing">
                            <form class="acc-billing__form" action="" method="GET">
                                <div class="row">
                                    <div class="form-field col-lg-5 mt-3">
                                        <select name="year" required>
                                            <option 
                                                value=""
                                            >
                                                Jahr wählen
                                            </option>
                                            <option 
                                                value="{{ now()->year }}" 
                                                {{ strval(now()->year) === request()->year ? 'selected' : '' }} 
                                            >
                                                {{ now()->year }}
                                            </option>
                                            <option 
                                                value="{{ now()->year+1 }}"
                                                {{ strval(now()->year+1) === request()->year ? 'selected' : '' }} 
                                            >
                                                {{ now()->year+1 }}
                                            </option>
                                            <option 
                                                value="{{ now()->year+2 }}"
                                                {{ strval(now()->year+2) === request()->year ? 'selected' : '' }} 
                                            >
                                                {{ now()->year+2 }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 mt-3">
                                        <button class="btn" style="width: 100%">Suchen</button>
                                    </div>
                                </div>
                            </form>
                            <div class="w-ac-table mt-4">
                                <table class="ac-table">
                                    <thead>
                                    <tr>
                                        <th>
                                            Invoice #
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                        <th>
                                            Period
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th style="text-align: right;">
                                            {{__('admin/admin.form.actions')}}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>
                                                <span>{{$invoice->invoice_number}}</span>
                                            </td>
                                            <td>
                                                <span>{{$invoice->total}} Chf</span>
                                            </td>
                                            <td>
                                                <span>{{$invoice->period}}</span>
                                            </td>
                                            <td>
                                                <span>
                                                    @if ($invoice->status == 0) {{__('admin/admin.sended')}} @endif
                                                    @if ($invoice->status == 1) {{__('admin/admin.paid')}} @endif
                                                    @if ($invoice->status == 2) {{__('admin/admin.nopaid')}} @endif
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <a 
                                                    href="/storage/users/invoices/invoice-№{{$invoice->invoice_number}}-user-{{$invoice->user_id}}-{{$invoice->created_at->format('Y')}}-{{$invoice->period}}.pdf" 
                                                    target="_blank" 
                                                    class="
                                                        btn btn-save ml-auto
                                                        @if ($invoice->status == 0) {{'btn-save_state_sended'}} @endif
                                                        @if ($invoice->status == 1) {{'btn-save_state_paid'}} @endif
                                                        @if ($invoice->status == 2) {{'btn-save_state_nopaid'}} @endif
                                                    "
                                                >
                                                    <svg 
                                                        xmlns="http://www.w3.org/2000/svg" 
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                        width="24px" 
                                                        height="24px" 
                                                        viewBox="0 0 24 24" 
                                                        version="1.1"
                                                    >
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000" fill-rule="nonzero"/>
                                                            <rect fill="#000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
