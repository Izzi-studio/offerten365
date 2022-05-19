@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
            <h1>{{$partner->name}} {{$partner->lastname}} > {{__('admin/admin.menu.invoice-detail')}}: {{$invoice->id}}</h1>
        </div>
        <div class="card card-custom card-stretch gutter-b pt-5">
            <div class="card-body pt-3 pb-0 mt-n3">
                <h5>Gutschrift:</h5>
                <form method="POST" action="{{route('invoice.update',$invoice->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row w-100">
                        <div class="col-lg-2">
                            <input 
                                class="form-control" 
                                placeholder="Gutschrift" 
                                required
                                name="bonus"
                                type="number"
                                value="{{$invoice->bonus}}"
                            />
                        </div>
                        <div class="col-lg-3">
                            <input 
                                class="btn btn-success font-weight-bold" 
                                type="submit"
                                value="Aktualisieren"
                            />
                        </div>
                    </div>
                </form>
                <div class="table-responsive mt-4">
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
                        @foreach($proposalsToPartner as $proposal)
                            <tr>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->proposal->id}}</span>
                                </td>
                                <td>
                                    @if($proposal->proposal->getUser)
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->proposal->getUser->name}}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->proposal->getReceivedInvitation->count()}}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->proposal->getResponded->count()}}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$proposal->created_at->format('Y-m-d')}}</span>
                                </td>
                                <td class="text-right">
                                    <a href="{{route('proposals.edit',$proposal->proposal->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <i class="far fa-eye"></i>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    <a  data-toggle="modal" data-target="#exampleModalLong" data-form="#delete-form{{$proposal->id}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
                                    <form id="delete-form{{$proposal->id}}" action="{{route('invoice-proposal-remove',$proposal->id)}}"
                                            method="POST"
                                            style="display: none;">
                                        <input type="hidden" name="_method" value="DELETE"/>
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

@endsection

