@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b">
                <h1>{{$proposal->getUser->name}} ({{$proposal->getUser->email}})</h1>
            </div>
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body pt-2 pb-0 mt-n3">
                    <p></p>
                    <br/>


                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                            crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.js"
                            integrity="sha512-X1iMoI6a2IoZFOheUVf3ZmcD1L7zN/eVtig6enIq8yBlwDcbPVao/LG8+/SdjcVn72zF+A/viRLPSxfXLu/rbQ=="
                            crossorigin="anonymous"></script>
                    <link rel="stylesheet"
                          href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.css"
                          integrity="sha512-2sFkW9HTkUJVIu0jTS8AUEsTk8gFAFrPmtAxyzIhbeXHRH8NXhBFnLAMLQpuhHF/dL5+sYoNHWYYX2Hlk+BVHQ=="
                          crossorigin="anonymous"/>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.4.0/jquery.quicksearch.js"
                            integrity="sha512-U+KdQxKTQfGIQJBs2QyDiU3PxJoSu+ffUJV5AAuMmwSFs1CjBz5Xk3/qWrT0mBHOM/C15q3DMko6HJL+37MYNA=="
                            crossorigin="anonymous"></script>
                    <style>
                        .ms-container {
                            width: 100%;
                        }
                    </style>


                    <form name="proposal-update" method="POST" action="{{route('proposals.update',$proposal->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT"/>
                        <div class="form-group">
                        <select multiple name="invitations[]" id="custom-headers">
                            @foreach($suitableUsers as $invited)


                                <option value="{{$invited->user_id}}"
                                        @if($invited->checked == true) selected @endif>{{$invited->company}}
                                    ({{$invited->name}} {{$invited->lastname}})
                                </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group add_info">
                        
                            <br />
                            <div class="form-group">
                                <label>{{__('admin/admin.form.name')}}</label>
                                <input type="text" class="form-control" name="name" value="{{$proposal->getUser->name}}" readonly/>
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.lastname')}}</label>
                                <input type="text" class="form-control" name="lastname" value="{{$proposal->getUser->lastname}}" readonly/>
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.email')}}</label>
                                <input type="text" class="form-control" name="email" value="{{$proposal->getUser->email}}" readonly/>
                            </div>
                            <div class="form-group">
                                <label>{{__('admin/admin.form.phone')}}</label>
                                <input type="text" class="form-control" name="phone" value="{{$proposal->getUser->phone}}" readonly/>
                            </div>

                        </div>

                        <input type="submit" value="{{__('admin/admin.form.submit')}}" class="btn btn-success font-weight-bold btn-lg mr-2"/>
                    </form>


                    <script>
                        $('[name="invitations[]"]').multiSelect({
                            minWidth: 200,
                            selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='{{__('admin/admin.form.name')}}'>",
                            selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='{{__('admin/admin.form.name')}}'>",
                            afterInit: function (ms) {
                                var that = this,
                                    $selectableSearch = that.$selectableUl.prev(),
                                    $selectionSearch = that.$selectionUl.prev(),
                                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                                    .on('keydown', function (e) {
                                        if (e.which === 40) {
                                            that.$selectableUl.focus();
                                            return false;
                                        }
                                    });

                                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                                    .on('keydown', function (e) {
                                        if (e.which == 40) {
                                            that.$selectionUl.focus();
                                            return false;
                                        }
                                    });
                            },
                            afterSelect: function () {
                                this.qs1.cache();
                                this.qs2.cache();
                            },
                            afterDeselect: function () {
                                this.qs1.cache();
                                this.qs2.cache();
                            }
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>

    <style>
        .add_info .acc-billing-item__characteristic,
        .add_info .acc-billing-item__top-line{
            display: flex;
            align-items: center;
        }
        .add_info .acc-billing-item__top-line{
            margin-bottom: 15px;
        }
        .add_info .acc-billing-item__top-line h4,
        .add_info .acc-billing-item__characteristic p,
        .add_info .acc-billing-item__top-line p{
            margin: 0;
            margin-right: 45px;
            font-size: 16px;
        }
        .add_info .acc-billing-item__top-line h4{
            font-weight: bold;
        }
        .add_info .acc-billing-item__slide-content{
            display: flex;
            align-items: center;
            width: 100%;
            flex-wrap: wrap;
            margin-top: 15px;
        }
        .add_info .acc-billing-item__slide-content>div{
            width: 100%;
            display: flex;
            font-size: 16px;
        }
        .add_info .acc-billing-item__slide-content>div .acc-billing-item__slide-content-l:after{
            content: ':';
        }
        .add_info .acc-billing-item__slide-content>div .acc-billing-item__slide-content-l{
            padding-right: 10px;
            font-weight: bold;
        }
    </style>

@stop
