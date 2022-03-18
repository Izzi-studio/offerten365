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
                                @if(Request::is('angenommene'))
                                    <form class="acc-billing__form" action="" method="GET">
                                        <div style="position: relative;">
                                            <input class="acc-billing__form-field" type="text" id="minisearch" placeholder="Suche nach Region">
                                            <button class="acc-billing__form-btn" type="button">
                                                <svg class="ico search">
                                                    <use xlink:href="/images/sprite.svg#search"></use>
                                                </svg>
                                            </button>
                                        </div>
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
                                            <div class="form-field col-lg-5 mt-3">
                                                <select name="month" required>
                                                    <option
                                                        value=""
                                                    >
                                                        Monat wählen
                                                    </option>
                                                    <option
                                                        value="1"
                                                        {{ '1' === request()->month ? 'selected' : '' }} 
                                                    >
                                                        Januar
                                                    </option>
                                                    <option
                                                        value="2"
                                                        {{ '2' === request()->month ? 'selected' : '' }}
                                                    >
                                                        Februar
                                                    </option>
                                                    <option
                                                        value="3"
                                                        {{ '3' === request()->month ? 'selected' : '' }}
                                                    >
                                                        März
                                                    </option>
                                                    <option
                                                        value="4"
                                                        {{ '4' === request()->month ? 'selected' : '' }}
                                                    >
                                                        April
                                                    </option>
                                                    <option
                                                        value="5"
                                                        {{ '5' === request()->month ? 'selected' : '' }}
                                                    >
                                                        Mai
                                                    </option>
                                                    <option
                                                        value="6"
                                                        {{ '6' === request()->month ? 'selected' : '' }}
                                                    >
                                                        Juni
                                                    </option>
                                                    <option
                                                        value="7"
                                                        {{ '7' === request()->month ? 'selected' : '' }}
                                                    >
                                                        Juli
                                                    </option>
                                                    <option
                                                        value="8"
                                                        {{ '8' === request()->month ? 'selected' : '' }}
                                                    >
                                                        August
                                                    </option>
                                                    <option
                                                        value="9"
                                                        {{ '9' === request()->month ? 'selected' : '' }}
                                                    >
                                                        September
                                                    </option>
                                                    <option
                                                        value="10"
                                                        {{ '10' === request()->month ? 'selected' : '' }}
                                                    >
                                                        Oktober
                                                    </option>
                                                    <option
                                                        value="11"
                                                        {{ '11' === request()->month ? 'selected' : '' }}
                                                    >
                                                        November
                                                    </option>
                                                    <option
                                                        value="12"
                                                        {{ '12' === request()->month ? 'selected' : '' }}
                                                    >
                                                        Dezember
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 mt-3">
                                                <button class="btn" style="width: 100%">Suchen</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form class="acc-billing__form" action="#" onSubmit="return false">
                                        <input class="acc-billing__form-field" type="text" id="minisearch" placeholder="Suche nach Region">
                                        <button class="acc-billing__form-btn" type="button">
                                            <svg class="ico search">
                                                <use xlink:href="/images/sprite.svg#search"></use>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                @error('no_coin')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>Unzureichende Finanzmittel. Jetzt <a href="{{route('partner.payment')}}">Guthaben aufladen</a></strong>
                                    </div>
                                @enderror
                                @error('no_paid_invoice')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @if(auth()->user()->status == 2)
                                    <div class="invalid-feedback" role="alert">
                                        <strong> {{__('front.block_account')}}</strong>
                                    </div>
                                @endif
                                <div class="acc-billing__inner">
                                    @if(auth()->user()->status != 2)
                                    @foreach($proposals as $proposal)
                                        <div class="acc-billing-item acc-billing__acc-billing-item">
                                            @if($showAdditionalInfo)
                                            <button class="acc-billing-item__btn-info">Anfrage Details</button>
                                            @endif
                                            @if($proposal->type_job_id == 1)
                                                @include('front.includes.transfer',[
                                                    'date_start'=> $proposal->date_start,
                                                    'additional_info'=> $proposal->additional_info,
                                                    'from'=>__('front.'.$proposal->getRegion->name),
                                                    'showactionbuttons'=>$showactionbuttons,
                                                    'proposal_id'=>$proposal->id,
                                                    'comments'=>$proposal->description,
                                                    'client'=> $proposal->getUser,
                                                    'add_info'=>$showAdditionalInfo
                                                ])

                                            @endif
                                            @if($proposal->type_job_id == 2)
                                                @include('front.includes.cleaning',[
                                                    'additional_info'=> $proposal->additional_info,
                                                    'region'=>__('front.'.$proposal->getRegion->name),
                                                    'date_start'=> $proposal->date_start,
                                                    'showactionbuttons'=>$showactionbuttons,
                                                    'proposal_id'=>$proposal->id,
                                                    'comments'=>$proposal->description,
                                                    'client'=> $proposal->getUser,
                                                    'add_info'=>$showAdditionalInfo
                                                    ])
                                            @endif
                                            @if($proposal->type_job_id == 3)
                                                @include('front.includes.transfer-cleaning',[
                                                    'date_start'=> $proposal->date_start,
                                                    'additional_info'=> $proposal->additional_info,
                                                    'from'=>__('front.'.$proposal->getRegion->name),
                                                    'showactionbuttons'=>$showactionbuttons,
                                                    'proposal_id'=>$proposal->id,
                                                    'comments'=>$proposal->description,
                                                    'client'=> $proposal->getUser,
                                                    'add_info'=>$showAdditionalInfo
                                                ])
                                            @endif
                                            @if($proposal->type_job_id == 4)
                                                @include('front.includes.painting-work',[
                                                    'date_start'=> $proposal->date_start,
                                                    'additional_info'=> $proposal->additional_info,
                                                    'region'=>__('front.'.$proposal->getRegion->name),
                                                    'showactionbuttons'=>$showactionbuttons,
                                                    'proposal_id'=>$proposal->id,
                                                    'comments'=>$proposal->description,
                                                    'client'=> $proposal->getUser,
                                                    'add_info'=>$showAdditionalInfo
                                                ])
                                            @endif
                                    </div>
                                    @endforeach
                                    @endif

                                    @if(Request::is('angenommene'))
                                        {{ $proposals->appends(request()->query())->links('pagination.default') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
