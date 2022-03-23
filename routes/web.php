<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Partner\PaymentController;
use App\Http\Controllers\Partner\PaymentControllerIdealPay;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BlogCategoriesController as AdminBlogCategoriesController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SeoMetaController;
use App\Http\Controllers\Admin\ProposalController as AdminProposalController;
use App\Http\Controllers\Admin\ReviewMainPageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\CustomPageController as AdminCustomPageController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\InvoiceToUserController;
use App\Helper\GenerateInvoices;
use App\Mail\SendInvoicePartner;
use App\Models\User;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group([
    'prefix'=> LaravelLocalization::setLocale(),
    'middleware'=> ['client', 'localeSessionRedirect', 'localizationRedirect']
], function ($router) {

    Route::get('my-info', [ClientController::class, 'myInfo'])->name('client.myInfo');
    Route::post('my-info', [ClientController::class, 'updateInfo'])->name('client.updateMyInfo');
    Route::get('change-password', [ClientController::class, 'showPasswordForm'])->name('client.showPasswordForm');
    Route::post('change-password', [ClientController::class, 'updatePassword'])->name('client.updatePassword');

    Route::get('offerten_fuer_umzug', [ClientController::class, 'tRequests'])->name('client.getTRequests');
    Route::get('offerten_fuer_umzug_und_reinigung', [ClientController::class, 'tcRequests'])->name('client.getTCRequests');
    Route::get('offerten_fuer_reinigungs', [ClientController::class, 'cRequests'])->name('client.getCRequests');
    Route::get('maler_offerten', [ClientController::class, 'pwRequests'])->name('client.getPWRequests');


    Route::get('offerten-maler', [ClientController::class, 'showFormPaintingWork'])->name('showFormPaintingWork');
    Route::get('offerten-fuer-umzug', [ClientController::class, 'showFormTransfer'])->name('showFormTransfer');
    Route::get('offerten-fuer-reinigung', [ClientController::class, 'showFormСleaning'])->name('showFormСleaning');
    Route::get('offerten-fuer-umzug-und-reinigung', [ClientController::class, 'showFormTransferAndСleaning'])->name('showFormTransferAndСleaning');


    Route::get('profile/{user:profile_slug}/{proposal}', [ClientController::class, 'showProfilePartner'])->name('showProfilePartner');
    Route::post('review/{user:profile_slug}/{proposal}', [ClientController::class, 'writeReview'])->name('writeReview');

    Route::post('add-request', [ProposalController::class, 'store'])->name('formStore');
    Route::get('delete-request/{proposal}', [ProposalController::class, 'delete'])->name('deleteRequest');

	Route::get('proposal/edit/{proposal}', [ProposalController::class, 'edit'])
        ->name('client.editProposals');

	Route::put('proposal/update/{proposal}', [ProposalController::class, 'update'])
        ->name('client.updateProposals');


});


Route::group([
    'prefix'=> LaravelLocalization::setLocale(),
    'middleware'=> ['partner', 'localeSessionRedirect', 'localizationRedirect']
], function ($router) {
    Route::get('info', [PartnerController::class, 'myInfo'])->name('partner.myInfo');

    Route::post('payment', [PaymentControllerIdealPay::class, 'index'])->name('partner.payment-post');
    Route::get('payment', [PaymentControllerIdealPay::class, 'index'])->name('partner.payment');
    Route::get('payment/make-payment', [PaymentController::class, 'makePayment'])->name('partner.payment.make-payment-get');
    Route::post('payment/make-payment', [PaymentController::class, 'makePayment'])->name('partner.payment.make-payment');
    Route::post('payment/callback', [PaymentController::class, 'callback'])->name('partner.payment.callback');
    Route::get('payment/success', [PaymentController::class, 'success'])->name('partner.payment.success');



    Route::post('info', [PartnerController::class, 'updateInfo'])->name('partner.updateMyInfo');

    Route::get('password', [PartnerController::class, 'showPasswordForm'])->name('partner.showPasswordForm');
    Route::post('password', [PartnerController::class, 'updatePassword'])->name('partner.updatePassword');

    Route::get('neue-anfragen', [PartnerController::class, 'newProposals'])->name('partner.getNewRequests');
    Route::get('angenommene', [PartnerController::class, 'acceptedProposals'])->name('partner.getAcceptedRequests');
    Route::get('abgesagte', [PartnerController::class, 'rejectedProposals'])->name('partner.getRejectedRequests');
    Route::get('reviews', [PartnerController::class, 'reviews'])->name('partner.getReviews');

    Route::get('proposal/{proposal}/{action}', [ProposalController::class, 'processProposals'])
        ->where('action', 'accepted|rejected')
        ->name('partner.processProposal');

    Route::get('proposal/{proposal}/download', [ProposalController::class, 'downloadProposals'])
        ->name('partner.downloadProposals');

    Route::get('tts', [ProposalController::class, 'tts'])
        ->name('partner.tts');


});

Route::group([
    'middleware'=> ['admin','localeSessionRedirect', 'localizationRedirect'],
    'prefix' =>  LaravelLocalization::setLocale().'/administrator'
], function ($router) {


    Route::get('/',function (){
        return redirect()->route('blog.index');
    });
    Route::resource('blog', AdminBlogController::class);
    Route::resource('blog-categories', AdminBlogCategoriesController::class);
    Route::resource('faq', FaqController::class);

    Route::resource('seo-meta', SeoMetaController::class)->only(['store','index','create']);

    Route::get('seo-meta/{seoMetaTags:type}', [SeoMetaController::class,'edit'])->name('seo-meta.edit');
    Route::put('seo-meta/{seoMetaTags:type}', [SeoMetaController::class,'update'])->name('seo-meta.update');
    Route::delete('seo-meta/{type}', [SeoMetaController::class,'destroy'])->name('seo-meta.destroy');

    Route::resource('proposals', AdminProposalController::class)->only(['update','index','edit','destroy']);
    Route::resource('reviews', ReviewMainPageController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('static-page', StaticPageController::class);
    Route::resource('custom-page', AdminCustomPageController::class);
    Route::get('custom-page/copy/{customPage}', [AdminCustomPageController::class,'copyPage'])->name('custom-page.copy');
    Route::get('partners/request-update/{partner}/{requestCahngePartnerInfo}', [AdminPartnerController::class,'showUpdateRequest'])->name('request-update');
    Route::post('partners/request-update/{partner}/{requestCahngePartnerInfo}', [AdminPartnerController::class,'updateRequest']);
    Route::post('partners/request-update-delete/{requestCahngePartnerInfo}', [AdminPartnerController::class,'updateRequestDelete'])->name('request-update.destroy');
    Route::resource('partners', AdminPartnerController::class);
    Route::resource('invoice', InvoiceToUserController::class);


});

Route::group([
    'prefix'=> LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect']
], function ($router) {

    Auth::routes();

	Route::post('processed-payment', [PaymentControllerIdealPay::class, 'prosessedPayment'])->name('partner.processedPayment');

	Route::get('ss',function(){
		$generator = app()->make(GenerateInvoices::class);
        $generator->generateAndSendInvoices();

	});

    Route::get('partner-werden', [RegisterController::class,'registerPartnerView'])->name('partnerWerden');
    Route::post('register-partner', [RegisterController::class,'registerPartner'])->name('registerPartner');

    Route::post('register-client', [RegisterController::class,'registerClient'])->name('registerClient');
    Route::post('check-email', [RegisterController::class,'checkEmail'])->name('checkEmail');

    Route::get('anfrage-gesendet', [PageController::class,'successRegisterClient'])->name('client.success.register');

    Route::get('/',[PageController::class,'index'])->name('main');


    Route::get('faq',[PageController::class,'faq'])->name('faq');
    //Route::get('how-it-works',[PageController::class,'howItWorks'])->name('howItWorks');
    Route::get('kontakt',[PageController::class,'contacts'])->name('kontakt');

//clients form request
    Route::get('umzug', [RegisterController::class,'showFormTransfer'])->name('registerFormTransfer');
    Route::get('umzug-und-reinigung', [RegisterController::class,'showFormTransferAndСleaning'])->name('registerFormTransferAndCleaning');
    Route::get('reinigung', [RegisterController::class,'showFormСleaning'])->name('registerFormCleaning');
    Route::get('maler', [RegisterController::class,'showFormPaintingWork'])->name('registerFormPaintingWork');
//end clients form request

    Route::get('blog/{blogCategory:slug}', [BlogController::class, 'showCategory'])->name('showCategory');
    Route::get('blog/{blogCategory:slug}/{post:slug}', [BlogController::class, 'showPost'])->name('showPost');

	Route::get('sitemap',[PageController::class,'sitemap'])->name('sitemap');
	Route::get('sitemap.xml',[PageController::class,'sitemapXml'])->name('sitemapXml');

    Route::get('{type_work}/{custompage}',[PageController::class,'customPage'])->name('cutstomPage');
    Route::get('{staticPage:slug}',[PageController::class,'staticPage'])->name('staticPage');
});

