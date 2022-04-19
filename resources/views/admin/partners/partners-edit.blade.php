@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.menu.partner')}} {{$partner->name}} </h1>
            </div>

            @if(!$requestsChangeInfo->isEmpty())
            <div class="row">
                <div class="col-12">

                    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                        <h1>Requests Change Info</h1>
                    </div>

                    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                        <div class="card-body pt-2 pb-0 mt-n3" style="padding: 0px">
                            <div class="table-responsive">
                                <table class="table table-vertical-center">
                                    <thead>
                                    <tr>
                                        <th>
                                            Request ID
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requestsChangeInfo as $item)
                                        <tr>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->id}}</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">@if($item->created_at){{$item->created_at->format('d-m-Y')}} @endif</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->status()}}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{route('request-update',[$partner->id,$item->id])}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <i class="far fa-eye"></i>
                                                <!--end::Svg Icon-->
											</span>
                                                </a>

                                                <a  onclick="$('#delete-form{{$item->id}}').submit()" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                               <span class="svg-icon svg-icon-md svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
														<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                                </a>
                                                <form id="delete-form{{$item->id}}" action="{{  route('request-update.destroy',$item->id) }}"
                                                      method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
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
            @endif
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-header border-0 pt-5">
                    <div class="col-3">
                    <form action="{{route('partners.update',$partner->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT"/>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.name')}}</label>
                                <input type="text" class="form-control" name="name" value="{{$partner->name}}" />
                            </div>
                            <div class="form-group">
                                    <label>{{__('admin/admin.form.lastname')}}</label>
                                    <input type="text" class="form-control" name="lastname" value="{{$partner->lastname}}" />
                            </div>
                            <div class="form-group">
                                    <label>{{__('admin/admin.form.company')}}</label>
                                    <input type="text" class="form-control" name="company" value="{{$partner->company}}" />
                            </div>
                            <div class="form-group">
                                    <label>{{__('admin/admin.form.email')}}</label>
                                    <input type="text" class="form-control" name="email" value="{{$partner->email}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.phone')}}</label>
                                <input type="text" class="form-control" name="phone" value="{{$partner->phone}}" />
                            </div>

                            <div class="form-group">
                                    <label>{{__('admin/admin.form.city')}}</label>
                                    <input type="text" class="form-control" name="city" value="{{$partner->city}}" />
                            </div>

                           <div class="form-group">
                                    <label>{{__('admin/admin.form.street')}}</label>
                                    <input type="text" class="form-control" name="street" value="{{$partner->street}}" />
                            </div>
                            <div class="form-group">
                                    <label>{{__('admin/admin.form.house')}}</label>
                                    <input type="text" class="form-control" name="house" value="{{$partner->house}}" />
                            </div>
                            <div class="form-group">
                                    <label>{{__('admin/admin.form.postcode')}}</label>
                                    <input type="text" class="form-control" name="postcode" value="{{$partner->postcode}}" />
                            </div>

                            <div class="form-group">
                                <label>{{__('admin/admin.form.subscriptions')}}</label>
                                <select class="form-control" name="subscription_id">
                                    @foreach($subscriptions as $subscription)
                                    <option 
                                        value="{{$subscription->id}}" 
                                        @if($subscription->id == $partner->subscription_id) selected @endif
                                    >
                                        {{$subscription->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label>{{__('admin/admin.form.jobtype')}}</label>
                                @foreach($typesofjobs as $jobtype)
                                <div class="checkbox-inline">
                                        <label class="checkbox">
                                            <input name="types_of_jobs[]" value="{{$jobtype->id}}" @if($jobtype->checked) checked @endif type="checkbox" />
                                            <span class="custom-checkbox__txt"></span>
                                            {{__('front.'.$jobtype->name)}}
                                        </label>
                                </div>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label>{{__('admin/admin.form.regions')}}</label>
                            @foreach($regions as $region)
                                <div class="checkbox-inline">
                                    <label class="checkbox">
                                        <input name="region_ids[]" type="checkbox" @if($region->checked) checked @endif value="{{$region->id}}">
                                        <span class="custom-checkbox__txt"></span>
                                        {{__('front.'.$region->name)}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label>{{__('admin/admin.form.status')}}</label>
                            <div class="radio-inline">
                                <label class="radio">
                                    <input type="radio"
                                           name="status" value="0"
                                           @if ($partner->status == 0) checked @endif/>
                                    <span></span>
                                    {{__('admin/admin.form.active')}}
                                </label>
                                <label class="radio">
                                    <input type="radio"
                                           name="status" value="1"
                                           @if ($partner->status == 1) checked @endif/>
                                    <span></span>
                                   {{__('admin/admin.nopaid')}}
                                </label>
                                <label class="radio">
                                    <input type="radio"
                                           name="status" value="2"
                                           @if ($partner->status == 2) checked @endif/>
                                    <span></span>
                                    {{__('admin/admin.blocked')}} 
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{__('admin/admin.form.status_pay')}}</label>
                            <div class="radio-inline">
                                <label class="radio">
                                    <input type="radio"
                                           name="status_pay" value="0"
                                           @if ($partner->status_pay == 0) checked @endif/>
                                    <span></span>
                                    Invoice
                                </label>
                                <label class="radio">
                                    <input type="radio"
                                           name="status_pay" value="1"
                                           @if ($partner->status_pay == 1) checked @endif/>
                                    <span></span>
                                    Stripe
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{__('admin/admin.form.active')}}</label>
                            <div class="radio-inline">
                                <label class="radio">
                                    <input type="radio"
                                           name="active" value="0"
                                           @if ($partner->active == 0) checked @endif/>
                                    <span></span>
                                    {{__('admin/admin.no')}} 
                                </label>
                                <label class="radio">
                                    <input type="radio"
                                           name="active" value="1"
                                           @if ($partner->active == 1) checked @endif/>
                                    <span></span>
                                    {{__('admin/admin.yes')}} 
                                </label>
                            </div>
                        </div>

                        <input type="submit" value="{{__('admin/admin.form.submit')}}" class="btn btn-success font-weight-bold btn-lg mr-2" />
                    </form>
                    </div>
                    <div class="col-9">
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
                                    Total
                                </th>
                                <th>
                                    Period
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
                            @foreach($partner->getInvoices()->get() as $invoice)
                                <tr>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$invoice->id}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$invoice->invoice_number}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$invoice->total}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$invoice->period}}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
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
@if(!$proposals->isEmpty())
<div class="row">
	<div class="col-12">
		<div class="alert alert-custom alert-white alert-shadow fade show gutter-b">

		</div>
		<div class="card card-custom card-stretch gutter-b">
		                <div class="card-body pt-2 pb-0 mt-n3">
					<h1>Proposals</h1>
                    <div class="table-responsive">
                        <table class="table table-vertical-center">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    {{__('admin/admin.form.publisher')}}
                                </th>
                                <th>
                                    {{__('admin/admin.form.selected-performers')}}
                                </th>
                                <th>
                                    {{__('admin/admin.form.responded-performers')}}
                                </th>
                                <th>
                                    {{__('admin/admin.form.date-added')}}
                                </th>
                                <th class="text-right">
                                    {{__('admin/admin.form.actions')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($proposals as $proposal)
                                <tr>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->id}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->getUser->name}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->getReceivedInvitation->count()}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->getResponded->count()}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->created_at->format('Y-m-d')}}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{route('proposals.edit',$proposal->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <i class="far fa-eye"></i>
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
@endif
@stop
