@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.menu.settings')}}</h1>
            </div>
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-header border-0 pt-5">

                    <form action="{{route('setting.store')}}" method="POST">
                        @csrf
                        @foreach($settings as $setting)
                            @if($setting->type == 'text')
                                <div class="form-group">
                                <label>{{__('admin/admin.'.$setting->key)}}</label>
                                <input type="{{$setting->type}}" class="form-control"
                                       name="setting[{{$setting->type}}][{{$setting->key}}]"
                                       value="{{$setting->value}}"/>
                                </div>
                            @endif

                            @if($setting->type == 'radio')
                                <div class="form-group">
                                <label>{{__('admin/admin.'.$setting->key)}}</label>
                                    <div class="radio-inline">
                                        <label class="radio">
                                                <input type="{{$setting->type}}"
                                                       name="setting[{{$setting->type}}][{{$setting->key}}]" value="1"
                                                       @if ($setting->value == 1) checked @endif/>
                                            <span></span>
                                            {{__('admin/admin.form.yes')}}
                                        </label>
                                        <label class="radio">
                                            <input type="{{$setting->type}}"
                                                      name="setting[{{$setting->type}}][{{$setting->key}}]" value="0"
                                                      @if ($setting->value == 0) checked @endif/>
                                            <span></span>
                                            {{__('admin/admin.form.no')}}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <input type="submit" value="{{__('admin/admin.form.submit')}}" class="btn btn-success font-weight-bold btn-lg mr-2" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
