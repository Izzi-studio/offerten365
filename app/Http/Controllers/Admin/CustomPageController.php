<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomPage;
use App\Models\CustomPageDescription;
use Intervention\Image\ImageManagerStatic as Image;
use Str;
use App\Models\SeoMetaTags;
class CustomPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customPages = CustomPage::orderBy('id','DESC')->get(); 
       return view('admin.custom_page.list',compact(['customPages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.custom_page.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  CustomPage $customPage
     * @return \Illuminate\Http\Response
     */
    public function copyPage(CustomPage $customPage)
    {
		
        $newPage  = $customPage->replicate();
		$newPage->slug = $newPage->slug.'-copy';
		$newPage->save();
		
		$descriptions = $customPage->getCustomPageDescriptionAll();
		$seoTags = $customPage->getSeoMetaTagsAll();
		
		foreach($descriptions->get() as $description){
			$newDecr = $description->replicate();
			$newDecr->custom_page_id = $newPage->id;
			$newDecr->save();
		}

		foreach($seoTags->get() as $tag){
			$newTag = $tag->replicate();
			$newTag->item_id = $newPage->id;
			$newTag->save();
		}
		
		return redirect(route('custom-page.index'))->with('success', __('admin/admin.post_added'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomPage $customPage)
    {
       return view('admin.custom_page.edit',compact(['customPage']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomPage $customPage)
    {
	//dd($request->file('custom_page')['de']['b1_image']->getClientOriginalName());
		
		$descriptions = $customPage->getCustomPageDescriptionAll();
		
		
        if (Str::slug($request->slug) != $customPage->slug) {
            $this->validate($request, [
                'slug' => ['required', 'unique:custom_pages']
            ]);
        }
		
		$customPage->name = $request->name;
		$customPage->slug = Str::slug($request->slug);
		$customPage->type_job_id = $request->type_job_id;
		$customPage->show_front = $request->show_front;
		$customPage->save();
		
		
		 SeoMetaTags::where('type',$request->type)
            ->whereItemId($customPage->id)
            ->delete();
			

		$newInsertDescriptions = [];
		
		foreach($request->custom_page as $locale=>$data){
            $this->insertSeoMetaTags([
                'locale'=>$locale,
                'title'=> $data['seo']['title'],
                'description'=> $data['seo']['description'],
                'type'=>$request->type,
                'item_id'=>$customPage->id
            ]);
			

			$description = $descriptions->whereLocale($locale)->first();
			
			if (isset($request->file('custom_page')[$locale]['b1_image'])) {
				$b1_image = $this->saveImage($request->file('custom_page')[$locale]['b1_image']);
			}else{
				$b1_image = $description->b1_image;
			}

			if (isset($request->file('custom_page')[$locale]['b3_image'])) {
				$b3_image = $this->saveImage($request->file('custom_page')[$locale]['b3_image']);
			}else{
				$b3_image = $description->b3_image;
			}

			if (isset($request->file('custom_page')[$locale]['b4_image'])) {
				$b4_image = $this->saveImage($request->file('custom_page')[$locale]['b4_image']);
			}else{
				$b4_image = $description->b4_image;
			}

			if (isset($request->file('custom_page')[$locale]['b6_image'])) {
				$b6_image = $this->saveImage($request->file('custom_page')[$locale]['b6_image']);
			}else{
				$b6_image = $description->b6_image;
			}

			if (isset($request->file('custom_page')[$locale]['b8_image'])) {
				$b8_image = $this->saveImage($request->file('custom_page')[$locale]['b8_image']);
			}else{
				$b8_image = $description->b8_image;
			}
			

			$descriprionInsert = $this->insertCustomPageDescription([
                'locale'=>$locale,
                'custom_page_id'=>$customPage->id,
                'b1_text'=> $data['b1_text'],
                'b1_btn'=> $data['b1_btn'],
                'b2_title'=> $data['b2_title'],
                'b2_content'=> $data['b2_content'],
                'b3_text'=> $data['b3_text'],
                'b3_btn'=> $data['b3_btn'],
                'b4_text'=> $data['b4_text'],
                'b4_btn'=> $data['b4_btn'],
                'b5_title'=> $data['b5_title'],
                'b5_content'=> $data['b5_content'],
                'b6_text'=> $data['b6_text'],
                'b6_btn'=> $data['b6_btn'],
                'b7_seo_text'=> $data['b7_seo_text'],
                'b8_text'=> $data['b8_text'],
                'b8_btn'=> $data['b8_btn'],
				
                'b1_image'=> $b1_image,
                'b3_image'=> $b3_image,
                'b4_image'=> $b4_image,
                'b6_image'=> $b6_image,
                'b8_image'=> $b8_image,
				

            ]);
			
			$newInsertDescriptions[] = $descriprionInsert->id;
		}
		
		 CustomPageDescription::whereCustomPageId($customPage->id)->whereNotIn('id',$newInsertDescriptions)->delete();	
		
		 return redirect(route('custom-page.index'))->with('success', __('admin/admin.post_added'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CustomPage $customPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomPage $customPage)
    {
        $customPage->customPageDescriptionDestroy()->delete();
        $customPage->seoMetaTagsDestroy()->delete();
        $customPage->delete();
        return redirect(route('custom-page.index'))->with('success', __('admin/admin.post_deleted'));
    }
	
	private function insertSeoMetaTags(array $data){
       return SeoMetaTags::create($data);
    }
	
	private function insertCustomPageDescription(array $data){
        return CustomPageDescription::create($data);
    }
	
	private function saveImage($image){

        $name_file = $image->getClientOriginalName();
        $image_save = Image::make($image->getRealPath());

        $image_save->save(storage_path(env('LOCAL_PATH_CUSTOMPAGE_IMAGE') . $name_file));

        return $name_file;
    }
}
