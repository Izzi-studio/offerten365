@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.form.add-review')}}</h1>
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
                    <form action="{{route('reviews.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="tab-content mt-5" id="myTabContent">
                            @csrf
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.rating')}}:
                                </label>
                                <input class="form-control" type="text" name="rating" value=""/>
                            </div>
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.date')}}:
                                </label>
                                    <input class="form-control" type="text" name="date" value=""/>
                            </div>
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.company')}}:
                                </label>
                                <input class="form-control" type="text" name="company" value=""/>
                            </div>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="tab-pane fade @if($loop->index == 0) show active @endif"
                                     id="{{ $localeCode }}" role="tabpanel" aria-labelledby="blog-{{ $localeCode }}">
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.name')}}:
                                        </label>
                                        <input required="required" class="form-control" type="text" name="review[{{ $localeCode }}][main][name]" value=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.message')}}:
                                        </label>
                                        <textarea class="summernote" name="review[{{ $localeCode }}][main][message]"></textarea>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <input type="submit" value="{{__('admin/admin.form.submit')}}" class="btn btn-success font-weight-bold btn-lg mr-2" />
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
