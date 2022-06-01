@extends('layouts.admin')

@section('content')
<style>
    .border-color-red{border-color:red;}
    </style>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>Change Info</h1>
            </div>
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <div class="col-6"><h1>NEW</h1></div>
                <div class="col-6"><h1>OLD</h1></div>
            </div>


            <div class="card card-custom card-stretch gutter-b">

                <div class="card-header border-0 pt-5">
                    <div class="col-6">
                        <form action="{{route('request-update',[$partner->id,$requestCahngePartnerInfo->id])}}" method="POST" name="update-info">
                            @csrf
                            @php $class = '';@endphp
                            <div class="form-group">
                                <label>{{__('admin/admin.form.name')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->name != $partner->name) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="name" value="{{$requestCahngePartnerInfo->json_info->name}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.lastname')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->lastname != $partner->lastname) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="lastname" value="{{$requestCahngePartnerInfo->json_info->lastname}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.company')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->company != $partner->company) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="company" value="{{$requestCahngePartnerInfo->json_info->company}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.phone')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->phone != $partner->phone) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="phone" value="{{$requestCahngePartnerInfo->json_info->phone}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.city')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->city != $partner->city) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="city" value="{{$requestCahngePartnerInfo->json_info->city}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.street')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->street != $partner->street) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="street" value="{{$requestCahngePartnerInfo->json_info->street}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.house')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->house != $partner->house) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="house" value="{{$requestCahngePartnerInfo->json_info->house}}" />
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.postcode')}}</label>
                                @php 
                                    if($requestCahngePartnerInfo->json_info->postcode != $partner->postcode) {
                                        $class= 'border-color-red';
                                    } else {
                                        $class='';
                                    } 
                                @endphp
                                <input type="text" class="form-control {{$class}}" name="postcode" value="{{$requestCahngePartnerInfo->json_info->postcode}}" />
                            </div>
                            <input type="hidden" name="action">
                           <input type="button" value="accept" class="btn btn-success font-weight-bold btn-lg mr-2" id="accept"/>
                           <input type="button" value="reject" class="btn btn-danger font-weight-bold btn-lg mr-2" id="reject"/>
                        </form>
                    </div>


                    <div class="col-6">
                        <form action="" method="POST" >
                            @csrf
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
