@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.menu.custom-pages')}}</h1>
            </div>
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-header border-0 pt-5">

                </div>
                <div class="card-body pt-2 pb-0 mt-n3">
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
                                <th class="text-right">
                                    {{__('admin/admin.form.actions')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customPages as $customPage)
                                <tr>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$customPage->id}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$customPage->name}}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{route('custom-page.edit',$customPage->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24"></rect>
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
											</span>
                                        </a>

                                        <a href="{{route('custom-page.copy',$customPage->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z" fill="#000000" fill-rule="nonzero"></path>
																	<path d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z" fill="#000000" opacity="0.3"></path>
																</g>
															</svg>
                                                                                    <!--end::Svg Icon-->
											</span>
                                        </a>
										@if($customPages->count() != 1)
                                        <a data-toggle="modal" data-target="#exampleModalLong" data-form="#delete-form{{$customPage->id}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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
										@endif
                                        <form id="delete-form{{$customPage->id}}" action="{{  route('custom-page.destroy',$customPage->id) }}"
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
