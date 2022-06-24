@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
            <h1>{{__('admin/admin.menu.invoices')}}</h1>
        </div>
        <form method="GET" class="alert alert-custom alert-white alert-shadow fade show gutter-b">
            <div class="row w-100">
                <div class="col-lg-2">
                    <select class="form-control" name="year">
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
                <div class="col-lg-2">
                    <select class="form-control" name="month">
                        <option
                            value=""
                        >
                            Monat wählen
                        </option>
                        <option
                            value="01"
                            {{ '01' === request()->month ? 'selected' : '' }} 
                        >
                            Januar
                        </option>
                        <option
                            value="02"
                            {{ '02' === request()->month ? 'selected' : '' }}
                        >
                            Februar
                        </option>
                        <option
                            value="03"
                            {{ '03' === request()->month ? 'selected' : '' }}
                        >
                            März
                        </option>
                        <option
                            value="04"
                            {{ '04' === request()->month ? 'selected' : '' }}
                        >
                            April
                        </option>
                        <option
                            value="05"
                            {{ '05' === request()->month ? 'selected' : '' }}
                        >
                            Mai
                        </option>
                        <option
                            value="06"
                            {{ '06' === request()->month ? 'selected' : '' }}
                        >
                            Juni
                        </option>
                        <option
                            value="07"
                            {{ '07' === request()->month ? 'selected' : '' }}
                        >
                            Juli
                        </option>
                        <option
                            value="08"
                            {{ '08' === request()->month ? 'selected' : '' }}
                        >
                            August
                        </option>
                        <option
                            value="09"
                            {{ '09' === request()->month ? 'selected' : '' }}
                        >
                            September
                        </option>
                        <option
                            value="10"
                            {{ '10' === request()->month ? 'selected' : '' }}
                        >
                            Oktober
                        </option>
                        <option
                            value="11"
                            {{ '11' === request()->month ? 'selected' : '' }}
                        >
                            November
                        </option>
                        <option
                            value="12"
                            {{ '12' === request()->month ? 'selected' : '' }}
                        >
                            Dezember
                        </option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select class="form-control" name="status">
                        <option value="">Status wählen</option>
                        <option value="0" @if (request()->status == 0) selected @endif>{{__('admin/admin.sended')}}</option>
                        <option value="1" @if (request()->status == 1) selected @endif>{{__('admin/admin.paid')}}</option>
                        <option value="2" @if (request()->status == 2) selected @endif>{{__('admin/admin.nopaid')}}</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <input 
                        class="btn btn-success font-weight-bold" 
                        type="submit"
                        value="Suche"
                    />
                </div>
            </div>
        </form>
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-body pt-2 pb-0 mt-n3">
                <p></p>
                <div class="table-responsive">
                    <table class="table table-vertical-center">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Invoice #
                                </th>
                                <th>
                                    {{__('admin/admin.menu.partner')}}
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Gutschrift
                                </th>
                                <th>
                                    Period
                                </th>
                                <th>
                                    Zahlungsmethode
                                </th>
                                <th>
                                    Status
                                </th>
                                <th class="text-right">
                                    {{__('admin/admin.form.actions')}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr
                                @if ($invoice->status == 0) style="background-color: rgb(219 219 58 / 90%);" @endif
                                @if ($invoice->status == 1) style="background-color: rgb(0 128 0 / 70%);" @endif
                                @if ($invoice->status == 2) style="background-color: rgb(255 0 0 / 80%);" @endif
                            >
                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg ">{{$invoice->id}}</span>
                                </td>
                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg">{{$invoice->invoice_number}}</span>
                                </td>
                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg">{{$invoice->getPartner->company}}</span>
                                </td>
                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg">{{$invoice->total}}</span>
                                </td>
                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg">{{$invoice->bonus}}</span>
                                </td>
                                

                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg">{{$invoice->period}}</span>
                                </td>

                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg">
                                        @if ($invoice->pay_type_generated == 0) Invoice @endif
                                        @if ($invoice->pay_type_generated == 1) Stripe @endif
                                    </span>
                                </td>
                                
                                <td>
                                    <span class="text-white font-weight-bolder d-block font-size-lg">
                                        <form action="{{route('invoice.update',$invoice->id)}}" name="update-invoice-status-{{$invoice->id}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT"/>
                                            <div class="input-group">
                                                <select class="form-control" name="status">
                                                    <option value="0" @if ($invoice->status == 0) selected @endif>{{__('admin/admin.sended')}}</option>
                                                    <option value="1" @if ($invoice->status == 1) selected @endif>{{__('admin/admin.paid')}}</option>
                                                    <option value="2" @if ($invoice->status == 2) selected @endif>{{__('admin/admin.nopaid')}}</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Einreichen</button>
                                                </div>
                                            </div>
                                        </form>
                                    </span>

                                </td>

                                <td class="text-right">
                                    <a href="/storage/users/invoices/invoice-№{{$invoice->invoice_number}}-user-{{$invoice->user_id}}-{{$invoice->created_at->format('Y')}}-{{$invoice->period}}.pdf" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-03-183419/theme/html/demo1/dist/../src/media/svg/icons/General/Save.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    </a>
                                    <a href="{{route('invoice-partner.show',[$invoice->getPartner->id,$invoice->id])}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <i class="far fa-eye"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>

                                    @if(null != $invoice->getPartner->getUserNotifications($invoice->id)->value('created_at'))
                                    <span data-toggle="tooltip" data-placement="top" data-offset="0 -10px" title="Erinnert am {{$invoice->getPartner->getUserNotifications($invoice->id)->value('created_at')->format('Y-m-d H:i')}}">
                                        <a data-toggle="modal" data-target="#email-templates" data-invoice-id="{{$invoice->id}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <i class="far fa-bell"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                    </span>
                                    @else
                                        <a data-toggle="modal" data-target="#email-templates" data-invoice-id="{{$invoice->id}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <i class="far fa-bell"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                    @endif

                                    <a href="{{route('invoice-partner.regenerate',$invoice->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <i class="far flaticon-refresh"></i>
                                            <!--end::Svg Icon-->
                                        </span>
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
@endsection
