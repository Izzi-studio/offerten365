<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReviewsOnMainPage;
use App\Models\ReviewsOnMainPageDescription;
use Illuminate\Http\Request;
use Str;
use Intervention\Image\ImageManagerStatic as Image;

class ReviewMainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = ReviewsOnMainPage::orderBy('id','DESC')->get();
        return view('admin.reviews.review-list',compact(['reviews']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reviews.review-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new ReviewsOnMainPage();
        $review->date = $request->date;
        $review->rating = $request->rating;
		$review->company = $request->company;

        if ($request->hasFile('image')) {
            $review->avatar = $this->saveReviewAvatar($request->file('image'));
        }

        $review->save();

        foreach($request->review as $locale=>$data){
            $this->insertReviewDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'message'=> $data['main']['message'],
                'review_id'=>$review->id
            ]);
        }
        return redirect(route('reviews.index'))->with('success', __('admin/admin.review_added'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  ReviewsOnMainPage $reviewsOnMainPage
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewsOnMainPage $review)
    {
        return view('admin.reviews.review-edit',compact(['review']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ReviewsOnMainPage $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewsOnMainPage $review)
    {

        $review->date = $request->date;
        $review->company = $request->company;
        $review->rating = $request->rating;

        if ($request->hasFile('image')) {
            $review->avatar = $this->saveReviewAvatar($request->file('image'));
        }
        $review->save();

        ReviewsOnMainPageDescription::whereReviewId($review->id)
            ->delete();

        foreach($request->review as $locale=>$data){
            $this->insertReviewDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'], 
                'message'=> $data['main']['message'],
                'review_id'=>$review->id
            ]);
        }
        return redirect(route('reviews.index'))->with('success', __('admin/admin.review_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewsOnMainPage $review)
    {
        $review->reviewDescriptionDestroy()->delete();
        $review->delete();
        return redirect(route('reviews.index'))->with('success', __('admin/admin.review_deleted'));
    }

    private function insertReviewDescription(array $data){
        return ReviewsOnMainPageDescription::create($data);
    }

    private function saveReviewAvatar($image){
        $name_file = Str::random(15).'.jpg';
        $image_save = Image::make($image->getRealPath());
        $image_save->resize(170, 200);
        $image_save->save(storage_path(env('LOCAL_PATH_REVIEW_IMAGE') . $name_file));
        return $name_file;
    }
}
