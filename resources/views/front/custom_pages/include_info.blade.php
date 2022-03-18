<div class="page__content">
    <section class="main-banner main-banner_bg_black main-banner_color_white" style="background-image: url('{{env('FRONT_PATH_CUSTOMPAGE_IMAGE').$customPage->getCustomPageDescription->b1_image}}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
					{!! $customPage->getCustomPageDescription->b1_text!!}
                    <a class="btn mt-2" href="#section-steps">{{$customPage->getCustomPageDescription->b1_btn}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="container">
            <div class="row">
					{!! $customPage->getCustomPageDescription->b2_title!!}
            </div>
            <div class="row step-by-step how-it-work__step-by-step">
					{!! $customPage->getCustomPageDescription->b2_content!!}
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('{{env('FRONT_PATH_CUSTOMPAGE_IMAGE').$customPage->getCustomPageDescription->b3_image}}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">{{$customPage->getCustomPageDescription->b3_text}}</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="#section-steps">{{$customPage->getCustomPageDescription->b3_btn}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="reviews">
        <div class="js-temporary-wrap">
            @foreach($reviews as $review)
            <div class="review reviews__review">
                <p class="review__date">{{$review->date}}</p>
                <p class="review__title mt-2">{{$review->company}}</p>
                <p class="review__txt">{!! $review->getReviewDescription->message !!}</p>
                <div class="review__bottom mt-2">
                    <p class="review__name">{{$review->getReviewDescription->name}}</p>
                    <div class="stars-rating stars-rating_fullness_{{$review->rating}} review__stars-rating"></div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="container">
            <h2 class="section-title">Das sagen unsere Kunden</h2>
            <div class="row">
                <div class="col-md-4 reviews__l"></div>
                <div class="col-md-4 reviews__c"></div>
                <div class="col-md-4 reviews__r"></div>
            </div>
            <button class="reviews__btn-more">MEHR BEWERTUNGEN</button>
        </div>
    </section>

    <section class="info mt-5" style="background-image: url('{{env('FRONT_PATH_CUSTOMPAGE_IMAGE').$customPage->getCustomPageDescription->b4_image}}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title info__title_white">{{$customPage->getCustomPageDescription->b4_text}}</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="#section-steps">{{$customPage->getCustomPageDescription->b3_btn}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="advantages">
        <div class="container">
            <h2 class="section-title advantages__section-title" style="text-transform: none">{{$customPage->getCustomPageDescription->b5_title}}
                365</h2>
            <div class="row advantages__inner">
				{!!$customPage->getCustomPageDescription->b5_content!!}
            </div>
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('{{env('FRONT_PATH_CUSTOMPAGE_IMAGE').$customPage->getCustomPageDescription->b6_image}}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title section-title_color_white">{{$customPage->getCustomPageDescription->b6_text}}
                    </h2>
                    <a class="btn info__btn mt-4 ml-auto mr-auto" href="#section-steps">{{$customPage->getCustomPageDescription->b6_btn}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-txt">
        <div class="container">
			{!!$customPage->getCustomPageDescription->b7_seo_text!!}
        </div>
    </section>
    <section class="info mt-5" style="background-image: url('{{env('FRONT_PATH_CUSTOMPAGE_IMAGE').$customPage->getCustomPageDescription->b8_image}}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="info__title">{{$customPage->getCustomPageDescription->b8_text}}</h2>
                    <a class="btn info__btn ml-auto mr-auto" href="#section-steps">{{$customPage->getCustomPageDescription->b8_btn}}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="faq pt-5 pb-3">
        <div class="container">
            <h2 class="section-title faq__section-title">FAQ</h2>
            <div class="faq__inner">
                @foreach($faqs as $faq)
                <div class="faq-item">
                    <div class="faq-item__inner">
                        <h3 class="faq-item__title">{{$faq->getFaqDescription->heading}}</h3>
                        <div class="faq-item__content">
                            {!! $faq->getFaqDescription->content !!}
                        </div>
                        <button class="faq-item__btn" data-show-content="Mehr lesen" data-hide-content="Weniger">Mehr lesen</button>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>