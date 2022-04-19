<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogDescription;
use App\Models\SeoMetaTags;
use Illuminate\Http\Request;
use App\Models\Blog;
use Intervention\Image\ImageManagerStatic as Image;
use Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $blogs = Blog::all();
       return view('admin.blog.bloglist',compact(['blogs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.blog_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();

        $this->validate($request, [
            'slug' => ['required', 'unique:blog'],
            'category_id' => ['required']
        ]);

        $blog->slug = Str::slug($request->slug);
        $blog->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $blog->image = $this->saveBlogImage($request->file('image'));
        }

        $blog->save();

        foreach($request->blog as $locale=>$data){

            $this->insertSeoMetaTags([
                'locale'=>$locale,
                'title'=> $data['seo']['title'],
                'description'=> $data['seo']['description'],
                'type'=>$request->type,
                'item_id'=>$blog->id
            ]);

            $this->insertBlogDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'content'=> $data['main']['content'],
                'link_text'=> $data['main']['link_text'],
                'blog_id'=>$blog->id
            ]);

        }

        return redirect(route('blog.index'))->with('success', __('admin/admin.post_added'));
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
    public function edit(Blog $blog)
    {

        return view('admin.blog.blog_edit',compact(['blog']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if (Str::slug($request->slug) != $blog->slug) {
            $this->validate($request, [
                'slug' => ['required', 'unique:blog'],
                'category_id' => ['required']
            ]);
        }

        $blog->slug = Str::slug($request->slug);
        $blog->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $blog->image = $this->saveBlogImage($request->file('image'));
        }

        $blog->save();

        SeoMetaTags::where('type',$request->type)
            ->whereItemId($blog->id)
            ->delete();

        BlogDescription::whereBlogId($blog->id)
            ->delete();

        foreach($request->blog as $locale=>$data){

            $this->insertSeoMetaTags([
                'locale'=>$locale,
                'title'=> $data['seo']['title'],
                'description'=> $data['seo']['description'],
                'type'=>$request->type,
                'item_id'=>$blog->id
            ]);

            $this->insertBlogDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'content'=> $data['main']['content'],
                'link_text'=> $data['main']['link_text'],
                'blog_id'=>$blog->id
            ]);

        }
        return redirect(route('blog.index'))->with('success', __('admin/admin.post_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->blogDescriptionDestroy()->delete();
        $blog->seoMetaTagsDestroy()->delete();
        $blog->delete();
        return redirect(route('blog.index'))->with('success', __('admin/admin.post_deleted'));
    }

    private function insertSeoMetaTags(array $data){
       return SeoMetaTags::create($data);
    }

    private function insertBlogDescription(array $data){
        return BlogDescription::create($data);
    }

    private function saveBlogImage($image){

        $name_file = Str::random(15).'.jpg';
        $image_save = Image::make($image->getRealPath());
        $image_save->fit(1920, 1080, function ($constraint) {
            $constraint->upsize();
        });
        $image_save->save(storage_path(env('LOCAL_PATH_BLOG_IMAGE') . $name_file));

        return $name_file;
    }
}
