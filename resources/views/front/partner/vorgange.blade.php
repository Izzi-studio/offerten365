@extends('layouts.app')
@section('content')
<div class="page__content">
    <section class="account headerHeightMarginTop">
        <div class="container">
            @include('front.partner.top')
            <div class="row">
                <div class="col-lg-4">
                    @include('front.partner.leftmenu')
                    @include('front.partner.prices')
                </div>
                <div class="col-lg-8">
                    <div class="account-content" id="section-account">
                        <div class="account-content__inner acc-billing">
                            <form class="acc-billing__form" action="" method="GET">
                                <div class="row">
                                    <div class="form-field col-lg-5 mt-3">
                                        <select name="year" required>
                                            <option 
                                                value=""
                                            >
                                                Jahr wählen
                                            </option>
                                            <option 
                                                value="{{ now()->year }}" 
                                                {{ strval(now()->year) === request()->year ? 'selected' : '' }} 
                                            >
                                                {{ now()->year }}
                                            </option>
                                            <option 
                                                value="{{ now()->year+1 }}"
                                                {{ strval(now()->year+1) === request()->year ? 'selected' : '' }} 
                                            >
                                                {{ now()->year+1 }}
                                            </option>
                                            <option 
                                                value="{{ now()->year+2 }}"
                                                {{ strval(now()->year+2) === request()->year ? 'selected' : '' }} 
                                            >
                                                {{ now()->year+2 }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 mt-3">
                                        <button class="btn" style="width: 100%">Suchen</button>
                                    </div>
                                </div>
                            </form>
                            <div class="w-ac-table mt-4">
                                <table class="ac-table">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Sum
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->id}}</td>
                                            <td>{{$transaction->amount}} Chf</td>
                                            <td>{{$transaction->status ? 'Success' : 'Failed'}}</td>
                                            <td>{{$transaction->created_at->format('Y-m-d')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
