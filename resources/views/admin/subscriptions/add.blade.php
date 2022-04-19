@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{__('admin/admin.form.add-subscriptions')}}</h1>
            </div>
            <div class="card card-custom card-stretch gutter-b">
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-header border-0 pt-5">
                        <form action="{{route('subscriptions.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>{{__('admin/admin.form.name')}}</label>
                                <input class="form-control" type="text" name="name">
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