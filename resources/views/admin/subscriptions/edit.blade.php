@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.form.edit')}} "{{$subscription->name}}"</h1>
            </div>
            <div class="card card-custom card-stretch gutter-b">
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-header border-0 pt-5">
                        <form action="{{route('subscriptions.update',$subscription->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.name')}}</label>
                                <input class="form-control" type="text" name="name" value="{{$subscription->name}}">
                            </div>
                            @foreach($typesOfJobs as $job)
                            <input type="hidden" name="prices[{{$job->id}}][type_job]" value="{{$job->name}}">
                            <div class="form-group">
                                <label>{{__('admin/admin.system.setting.cost_'.$job->name)}}</label>
                                <input 
                                    type="number"
                                    required 
                                    class="form-control"
                                    name="prices[{{$job->id}}][price]"
                                    value="{{Setting::getByKey('system.price.'.$subscription->id.'.cost_'.$job->name)}}"
                                />
                            </div>
                            @endforeach
                            <input type="submit" value="{{__('admin/admin.form.submit')}}" class="btn btn-success font-weight-bold btn-lg mr-2" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection