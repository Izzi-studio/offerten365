@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.menu.partners')}}</h1>
            </div>
            <form method="GET" class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <div class="row w-100">
                    <div class="col-lg-3">
                        <input 
                            class="form-control" 
                            placeholder="ID / Unternehmens / Partners" 
                            required
                            name="search"
                            type="text"
                            value="{{request()->search ?? ''}}"
                        />
                    </div>
                    <div class="col-lg-3">
                        <input 
                            class="btn btn-success font-weight-bold" 
                            type="submit"
                            value="Suche"
                        />
                    </div>

                    <div class="ml-auto col-auto">
                        <a data-toggle="modal" data-target="#mailing-emails" class="btn btn-success font-weight-bold">
                            E-Mail an alle Partner
                        </a>
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
                                    {{__('admin/admin.form.name')}}
                                </th>
                                <th>
                                    {{__('admin/admin.form.email')}}
                                </th>
                                <th>
                                    {{__('admin/admin.form.status')}}
                                </th>
                                <th>
                                    {{__('admin/admin.form.company')}}
                                </th>
                                <th class="text-right">
                                    {{__('admin/admin.form.actions')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                           {{$partner->id}}
                                           @if($partner->requestChangeInfoNew()) <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Code/Info-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                                <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"> {{$partner->name}} {{$partner->lastname}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$partner->email}}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                            @if ($partner->status == 0)
                                                Active
                                            @endif
                                            @if ($partner->status == 1)
                                                No paid
                                            @endif
                                             @if ($partner->status == 2)
                                                Blocked
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$partner->company}}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{route('partners.edit',$partner->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <i class="far fa-eye"></i>
                                                <!--end::Svg Icon-->
											</span>
                                        </a>
                                        <a  data-toggle="modal" data-target="#exampleModalLong" data-form="#delete-form{{$partner->id}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
                                        <form id="delete-form{{$partner->id}}" action="{{  route('partners.destroy',$partner->id) }}"
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
                        {{$partners->links()}}
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
