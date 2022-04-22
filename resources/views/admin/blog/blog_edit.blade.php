@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.form.edit')}} "{{$blog->getBlogDescription->name}}"</h1>
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
                                   aria-controls="blog-{{ $localeCode }}" aria-selected="true">{{$properties['native']}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="tab-content mt-5" id="myTabContent">
                            @csrf
                            <input type="hidden" name="type" value="blog"/>
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="form-group">
                                <label>
                                    {{__('admin/admin.form.alias')}}:
                                </label>
                                <input required="required" class="form-control" type="text" name="slug" value="{{ $blog->slug}}"/>
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
                                    <div class="col-2" id="noimg" @if(!$blog->image) style="display: none" @endif>
                                        <img id="previmg" @if($blog->image) src="{{env('FRONT_PATH_BLOG_IMAGE')}}{{ $blog->image}}" @endif>
                                        <br />
                                        <br />
                                    </div>
                                    <div class="col-10">
                                        <div></div>
                                        <div class="custom-file" id="customfile">
                                            <input class="custom-file-input" type="file" id="image_input" name="image"/>
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
                                    <option value="{{ $category->id}}"
                                            @if ($blog->category_id == $category->id) selected @endif>{{$category->getCategoryDescription->name}}</option>
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
                                        <input required="required" class="form-control" type="text" name="blog[{{ $localeCode }}][main][name]"
                                                 value="@if(isset($blog->getBlogDescriptionByLocale($localeCode)->name)){{$blog->getBlogDescriptionByLocale($localeCode)->name}}@endif"/>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.content')}}:
                                        </label>
                                        <textarea class="summernote" name="blog[{{ $localeCode }}][main][content]">
                                            @if(isset($blog->getBlogDescriptionByLocale($localeCode)->content)){{$blog->getBlogDescriptionByLocale($localeCode)->content}}@endif
                                        </textarea>
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
                                            value="@if(isset($blog->getBlogDescriptionByLocale($localeCode)->link_text)){{$blog->getBlogDescriptionByLocale($localeCode)->link_text}}@endif"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.meta-title')}}:
                                        </label>
                                        <input class="form-control" type="text" name="blog[{{ $localeCode }}][seo][title]"
                                                       value="@if(isset($blog->getSeoMetaTagsByLocale($localeCode)->title)){{ $blog->getSeoMetaTagsByLocale($localeCode)->title}}@endif"/>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{__('admin/admin.form.meta-desc')}}:
                                        </label>
                                        <input class="form-control" type="text" name="blog[{{ $localeCode }}][seo][description]"
                                                             value="@if(isset($blog->getSeoMetaTagsByLocale($localeCode)->description)){{ $blog->getSeoMetaTagsByLocale($localeCode)->description}}@endif"/>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <input value="{{__('admin/admin.form.submit')}}" type="submit" class="btn btn-success font-weight-bold btn-lg mr-2" />
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
