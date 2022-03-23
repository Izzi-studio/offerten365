<?php

namespace App\Http\Controllers;

use App\Models\ReviewsOnMainPage;
use App\Models\StaticPage;
use App\Models\CustomPage;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\Regions;
use Illuminate\Http\Request;
use App\Models\SeoMetaTags;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\Faq;
use Auth;
class PageController extends Controller
{

    /**
     * Show staticpage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function staticPage(StaticPage $staticPage)
    {

        app()->make(SeoMetaTags::class)->setMeta('static_page',$staticPage->id);
        return view('front.static_pages.'.$staticPage->layout,compact(['staticPage']));
    }

    /**
     * Show custompage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customPage(Request $request, $type ,$customPage)
    {

        $types = [
            1 => 'umzug',
            2 => 'reinigung',
            3 => 'umzug-und-reinigung',
            4 => 'maler'
        ];

        $job_id = array_search($type,$types);

        $customPage = CustomPage::whereTypeJobId($job_id)->whereSlug($customPage)->first();

		if(is_null($customPage)){
			return abort(404);
		}

        app()->make(SeoMetaTags::class)->setMeta('custom_page',$customPage->id);

		//dd($customPage->getCustomPageDescription);

		 switch ($customPage->type_job_id) {
            case 1:
                $templ = 'transfer';
				$faqs = Faq::transfer()->get();
                break;
            case 2:
                 $templ = 'cleaning';
				 $faqs = Faq::cleaning()->get();
                break;
            case 3:
                $templ = 'transfer_cleaning';
				$faqs = Faq::transferCleaning()->get();
                break;
            case 4:
                 $templ = 'malar';
				 $faqs = Faq::malar()->get();
                break;
            default:
                Log::info('Render error. Wrong Job Type: '.$customPage->type_job_id);
        }

		$zip = $request->zip;
        $regions = Regions::all();
        $action = Auth::user() ? route('formStore') : route('registerClient');

		$reviews = ReviewsOnMainPage::all();




        return view('front.custom_pages.'.$templ,compact(['customPage','action','regions','zip','reviews','faqs']));
    }

    /**
     * Show mainpage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        app()->make(SeoMetaTags::class)->setMeta('system.main_page');
        $reviews = ReviewsOnMainPage::orderBy('id','DESC')->get();
		$faqs = Faq::take(4)->get();
        return view('welcome',compact(['reviews','faqs']));
    }

    /**
     * Show faq.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.faq');
        $faqs = Faq::orderBy('type_job_id')->get();
        return view('front.faq',compact(['faqs']));
    }

    /**
     * Show sitemapXml.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function sitemapXml()
    {
		$slug[] = route('main').'@2022-01-03@1.0';
		$slug[] = route('faq').'@2022-01-04@0.9';
		$slug[] = route('kontakt').'@2022-01-05@0.9';
		$slug[] = route('partnerWerden').'@2022-01-06@0.9';
		$slug[] = route('registerFormTransfer').'@2022-01-07@0.9';
		$slug[] = route('registerFormTransferAndCleaning').'@2022-01-08@0.9';
		$slug[] = route('registerFormCleaning').'@2022-01-09@0.9';
		$slug[] = route('registerFormPaintingWork').'@2022-01-10@0.9';
		$slug[] = route('sitemap').'@2022-01-11@0.9';

		foreach(BlogCategories::all() as $blogCat){
			$slug[] = route('showCategory',$blogCat->slug).'@'.$blogCat->created_at->format('Y-m-d').'@0.9';
		};

		foreach(Blog::all() as $blog){
			$slug[] = route('showPost',[$blog->getBlogCategory->slug,$blog->slug]).'@'.$blog->created_at->format('Y-m-d').'@0.9';
		};

		foreach(StaticPage::all() as $spage){
			$slug[] = route('staticPage',$spage->slug).'@'.$spage->created_at->format('Y-m-d').'@0.9';
		};

		foreach(CustomPage::all() as $cpage){
			$slug[] = route('cutstomPage',[$cpage->getTypeSlug(),$cpage->slug]).'@'.$cpage->created_at->format('Y-m-d').'@0.9';
		};

		return response()->view('front.sitemap',['slug'=>$slug])->header('Content-Type', 'text/xml');
	}
		/**
     * Show sitemap.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function sitemap()
    {
		$pages = CustomPage::orderBy('type_job_id')->get();

		$result = [];
		foreach($pages as $page){
			$result[__('front.'.$page->getTypeSlug())][] = [
				'name'=>$page->name,
				'url' =>route('cutstomPage',[$page->getTypeSlug(),$page->slug])
			];
		}

        app()->make(SeoMetaTags::class)->setMeta('system.sitemap');
        return view('sitemap',compact(['result']));
    }

    /**
     * Show contacts.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contacts()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.contacts');
        return view('front.contacts');
    }

    /**
     * Show contacts.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function successRegisterClient()
    {
        app()->make(SeoMetaTags::class)->setMeta('system.success-register-client');
        return view('front.client.thanks');
    }
}
