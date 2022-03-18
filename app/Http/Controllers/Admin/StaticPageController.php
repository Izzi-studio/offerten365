<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMetaTags;
use App\Models\StaticPage;
use App\Models\StaticPageDescription;
use Illuminate\Http\Request;
use Str;
use Intervention\Image\ImageManagerStatic as Image;
class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staticPages = StaticPage::all();
        return view('admin.static-page.page-list',compact(['staticPages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layouts = $this->getLayouts();
        return view('admin.static-page.page-add',compact(['layouts']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staticPage = new StaticPage();
        if (Str::slug($request->slug) != $staticPage->slug) {
            $this->validate($request, [
                'slug' => ['required', 'unique:static_page'],
                'layout' => ['required']
            ]);
        }

        $staticPage->slug = Str::slug($request->slug);
        $staticPage->layout = $request->layout;

        if ($request->hasFile('image')) {
            $staticPage->image = $this->saveStaticPageImage($request->file('image'));
        }

        $staticPage->save();

        foreach($request->static as $locale=>$data){

            $this->insertSeoMetaTags([
                'locale'=>$locale,
                'title'=> $data['seo']['title'],
                'description'=> $data['seo']['description'],
                'type'=>$request->type,
                'item_id'=>$staticPage->id
            ]);

            $this->insertStaticPageDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'content'=> $data['main']['content'],
                'static_page_id'=>$staticPage->id
            ]);
        }

        return redirect(route('static-page.index'))->with('success', __('admin/admin.static_page_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticPage $staticPage)
    {
        $layouts = $this->getLayouts();
        return view('admin.static-page.page-edit',compact(['staticPage','layouts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaticPage $staticPage)
    {
        if (Str::slug($request->slug) != $staticPage->slug) {
            $this->validate($request, [
                'slug' => ['required', 'unique:static_page'],
                'layout' => ['required']
            ]);
        }

        $staticPage->slug = Str::slug($request->slug);
        $staticPage->layout = $request->layout;

        if ($request->hasFile('image')) {
            $staticPage->image = $this->saveStaticPageImage($request->file('image'));
        }

        $staticPage->save();

        SeoMetaTags::where('type',$request->type)
            ->whereItemId($staticPage->id)
            ->delete();

        StaticPageDescription::whereStaticPageId($staticPage->id)
            ->delete();

        foreach($request->static as $locale=>$data){

            $this->insertSeoMetaTags([
                'locale'=>$locale,
                'title'=> $data['seo']['title'],
                'description'=> $data['seo']['description'],
                'type'=>$request->type,
                'item_id'=>$staticPage->id
            ]);

            $this->insertStaticPageDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'content'=> $data['main']['content'],
                'static_page_id'=>$staticPage->id
            ]);
        }
        return redirect(route('static-page.index'))->with('success', __('admin/admin.static_page_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaticPage $staticPage)
    {
        $staticPage->staticPageDescriptionDestroy();
        $staticPage->seoMetaTagsDestroy();
        $staticPage->delete();
        return redirect(route('static-page.index'))->with('success', __('admin/admin.static_page_deleted'));
    }

    private function insertSeoMetaTags(array $data){
        return SeoMetaTags::create($data);
    }

    private function insertStaticPageDescription(array $data){
        return StaticPageDescription::create($data);
    }

    private function saveStaticPageImage($image){

        $name_file = Str::random(15).'.jpg';
        $image_save = Image::make($image->getRealPath());
        $image_save->fit(1920, 1080, function ($constraint) {
            $constraint->upsize();
        });
        $image_save->save(storage_path(env('LOCAL_PATH_STATIC_IMAGE') . $name_file));

        return $name_file;
    }

    private function getLayouts(){
        $full_path = base_path().env('STATIC_PAGE_LAYOUTS');
        $layouts = scandir($full_path);
        unset($layouts[0]);
        unset($layouts[1]);
        foreach($layouts as $index => $file){
            $layouts[$index] = str_replace('.blade.php','',$file);
        }

        return $layouts;
    }
}
