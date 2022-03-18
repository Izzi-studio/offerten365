@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.form.edit')}} "{{__('admin/admin.'.$page[0]->type)}}"</h1>
            </div>
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body pt-2 pb-0 mt-n3">
                    <p></p>
                    <br/>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if($loop->index == 0) active @endif" id="blog-{{ $localeCode }}"
                                   data-toggle="tab" href="#{{ $localeCode }}" role="tab"
                                   aria-controls="blog-{{ $localeCode }}" aria-selected="true">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <form action="{{route('seo-meta.update',$page[0]->type)}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="tab-content mt-5" id="myTabContent">
                            @csrf
                            <input type="hidden" name="type" value="{{$page[0]->type}}"/>
                            <input type="hidden" name="_method" value="PUT"/>

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($loop->index == 0) @php $flag = true @endphp @endif
                                @foreach($page as $item)
                                    @if($item->locale == $localeCode)
                                        <div class="tab-pane fade @if($flag) show active @endif" id="{{ $localeCode }}"
                                             role="tabpanel" aria-labelledby="blog-{{ $localeCode }}">
                                            <div class="form-group">
                                                <label>
                                                    {{__('admin/admin.form.meta-title')}}:
                                                </label>
                                                <input required="required" class="form-control" type="text"
                                                       name="seometa[{{ $localeCode }}][title]"
                                                       value="@if(isset($item->title)){{$item->title}}@endif"/>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    {{__('admin/admin.form.meta-desc')}}:
                                                </label>
                                                <input required="required" class="form-control" type="text"
                                                       name="seometa[{{ $localeCode }}][description]"
                                                       value="@if(isset($item->description)){{$item->description}}@endif"/>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @php $flag = false @endphp
                            @endforeach

                        </div>
                        <input type="submit" value="{{__('admin/admin.form.submit')}}" class="btn btn-success font-weight-bold btn-lg mr-2"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
