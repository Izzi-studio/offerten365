
<style>
    /* body, html {
        margin: 0;
        padding: 0;
    } */

    .acc-billing-item__date, .acc-billing-item__path, .acc-billing-item__characteristic {
        display: none;
    }

    h4, p {
        font-family: 'Poppins', sans-serif;
        color: #000;
        font-style: normal;
        font-size: 14px;
        line-height: 21px;
    }

    h4 {
        font-weigth: bold;
    }

    p  {
        font-style: normal;
    }

    .acc-billing-item__slide-content-l {
        font-weight: bold;
        text-indent: 5px;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .acc-billing-item__slide-content-l span {
        display: block;
        width: 6px;
        height: 6px;
        border-radius: 3px;
        background-color: #F81A1A;
        float: left;
        transform: translateY(9px);
    }
    
    .acc-billing-item__slide-content-r {
        margin-top: 0;
        padding-top: 0;
    }

    .pdf-bottom {
        padding: 20px 0;
        width: 100%;
        font-weight: bold;
        font-size: 18px;
        line-height: 27px;
        color: #000000;
    }

    .pdf-bottom span {
        color: #F81A1A;
    }
</style>
<img src="{{ env('APP_URL') }}/images/logo-red.webp" width="230px" alt="">
<hr>
@if($proposal->type_job_id == 1)
    @include('front.includes.transfer',[
        'date_start'=> $proposal->date_start,
        'additional_info'=> $proposal->additional_info,
        'from'=>__('front.'.$proposal->getRegion->name),
        'showactionbuttons'=>false,
        'showdownloadbuttons'=>false,
        'proposal_id'=>$proposal->id,
        'client'=> $proposal->getUser,
        'add_info'=>true
    ])

@endif
@if($proposal->type_job_id == 2)
    @include('front.includes.cleaning',[
        'additional_info'=> $proposal->additional_info,
        'region'=>__('front.'.$proposal->getRegion->name),
        'date_start'=> $proposal->date_start,
        'showactionbuttons'=>false,
        'showdownloadbuttons'=>false,
        'proposal_id'=>$proposal->id,
        'comments'=>$proposal->description,
        'client'=> $proposal->getUser,
        'add_info'=>true
        ])
@endif
@if($proposal->type_job_id == 3)
    @include('front.includes.transfer-cleaning',[
        'date_start'=> $proposal->date_start,
        'additional_info'=> $proposal->additional_info,
        'from'=>__('front.'.$proposal->getRegion->name),
        'showactionbuttons'=>false,
        'showdownloadbuttons'=>false,
        'proposal_id'=>$proposal->id,
        'comments'=>$proposal->description,
        'client'=> $proposal->getUser,
        'add_info'=>true
    ])
@endif
@if($proposal->type_job_id == 4)
    @include('front.includes.painting-work',[
        'date_start'=> $proposal->date_start,
        'additional_info'=> $proposal->additional_info,
        'region'=>__('front.'.$proposal->getRegion->name),
        'showactionbuttons'=>false,
        'showdownloadbuttons'=>false,
        'proposal_id'=>$proposal->id,
        'comments'=>$proposal->description,
        'client'=> $proposal->getUser,
        'add_info'=>true
    ])
@endif
<p class="pdf-bottom">Kosten: <span>{{$cost}} CHF</span></p>
