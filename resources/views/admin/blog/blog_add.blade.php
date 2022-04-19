@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.form.add-blog-item')}}</h1>
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
                    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="tab-content mt-5" id="myTabContent">
                            @csrf
                            <input type="hidden" name="type" value="blog"/>
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.alias')}}:
                                </label>
                                <input required="required" class="form-control" type="text" name="slug" value=""/>
                                @error('slug')
                                <div id="toast-container" class="toast-bottom-right">
                                    <div class="toast toast-error" aria-live="polite" style="">
                                        <div class="toast-message">{{$message}}</div>
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.image')}}:
                                </label>
                                <div class="row">
                                    <div class="col-2" id="noimg" style="display: none">
                                        <img id="previmg" src="">
                                        <br />
                                        <br />
                                    </div>
                                    <div class="col-10">
                                        <div></div>
                                        <div class="custom-file" id="customfile">
                                            <input class="custom-file-input" type="file" id="image_input"  name="image"/>
                                            <label class="custom-file-label" for="customfile">{{__('admin/admin.form.choose-file')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.category')}}:
                                </label>
                                <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id}}">{{$category->getCategoryDescription->name}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="tab-pane fade @if($loop->index == 0) show active @endif"
                                     id="{{ $localeCode }}" role="tabpanel" aria-labelledby="blog-{{ $localeCode }}">
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.name')}}:
                                        </label>
                                        <input required="required" class="form-control" type="text" name="blog[{{ $localeCode }}][main][name]" value=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.content')}}:
                                        </label>
                                        <textarea class="summernote" name="blog[{{ $localeCode }}][main][content]"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.text-btn')}}:
                                        </label>
                                        <input 
                                            required 
                                            class="form-control" 
                                            type="text" 
                                            name="blog[{{ $localeCode }}][main][link_text]"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.meta-title')}}:
                                        </label>
                                        <input class="form-control" type="text" name="blog[{{ $localeCode }}][seo][title]" value=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.meta-desc')}}:
                                        </label>
                                        <input class="form-control" type="text" name="blog[{{ $localeCode }}][seo][description]" value=""/>
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
