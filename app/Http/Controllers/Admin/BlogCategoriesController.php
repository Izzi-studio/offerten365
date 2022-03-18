<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategories;
use App\Models\BlogCategoryDescription;
use Illuminate\Http\Request;
use App\Models\SeoMetaTags;
use Str;

class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.blog_categories_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.blog_category_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'slug' => ['required', 'unique:blog_categories'],
        ]);

        $blogCategory = new BlogCategories();
        $blogCategory->slug = Str::slug($request->slug);

        $blogCategory->save();

        foreach($request->category as $locale=>$data){

            $this->insertSeoMetaTags([
                'locale'=>$locale,
                'title'=> $data['seo']['title'],
                'description'=> $data['seo']['description'],
                'type'=>$request->type,
                'item_id'=>$blogCategory->id
            ]);

            $this->insertBlogCategoryDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'content'=> $data['main']['content'],
                'category_id'=>$blogCategory->id
            ]);

        }

        return redirect(route('blog-categories.index'))->with('success', __('admin/admin.category_added'));
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
    public function edit(BlogCategories $blogCategory)
    {
        return view('admin.blog.blog_category_edit',compact(['blogCategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategories $blogCategory)
    {
        if (Str::slug($request->slug) != $blogCategory->slug) {
            $this->validate($request, [
                'slug' => ['required', 'unique:blog_categories'],
            ]);
        }

        $blogCategory->slug = Str::slug($request->slug);
        $blogCategory->save();

        SeoMetaTags::where('type',$request->type)
            ->whereItemId($blogCategory->id)
            ->delete();

        BlogCategoryDescription::whereCategoryId($blogCategory->id)
            ->delete();

        foreach($request->category as $locale=>$data){

            $this->insertSeoMetaTags([
                'locale'=>$locale,
                'title'=> $data['seo']['title'],
                'description'=> $data['seo']['description'],
                'type'=>$request->type,
                'item_id'=>$blogCategory->id
            ]);

            $this->insertBlogCategoryDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'content'=> $data['main']['content'],
                'category_id'=>$blogCategory->id
            ]);
        }
        return redirect(route('blog-categories.index'))->with('success', __('admin/admin.category_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategories $blogCategory)
    {
        $blogCategory->blogCategoryDescriptionDestroy()->delete();
        $blogCategory->seoMetaTagsDestroy()->delete();
        $blogCategory->delete();
        return redirect(route('blog-categories.index'))->with('success', __('admin/admin.category_deleted'));
    }

    private function insertSeoMetaTags(array $data){
        return SeoMetaTags::create($data);
    }

    private function insertBlogCategoryDescription(array $data){
        return BlogCategoryDescription::create($data);
    }
}
