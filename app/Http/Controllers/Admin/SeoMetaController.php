<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoMetaTags;

class SeoMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seoMetaTags = SeoMetaTags::where('type','like','system.%')->groupBy('type')->orderBy('type')->get();
        return view('admin.seo-meta.seometa-list',compact(['seoMetaTags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seo-meta.seometa-add');
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
            'type' => ['required', 'unique:seo_meta_tags']
        ]);

        foreach($request->seometa as $locale=>$data){

            SeoMetaTags::create([
                'title' => $data['title'],
                'locale' => $locale,
                'description' => $data['description'],
                'type' => $request->type,
                'item_id' => 0,
            ]);
        }

        return redirect(route('seo-meta.index'))->with('success', __('admin/admin.seo_added'));
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
    public function edit($type)
    {
        $page = SeoMetaTags::whereType($type)->get();
        return view('admin.seo-meta.seometa-edit',compact(['page']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {

        foreach($request->seometa as $locale=>$data){

            $row = SeoMetaTags::whereType($type)->wherelocale($locale)->first();
            $row->update([
                'title' => $data['title'],
                'description' => $data['description'],
            ]);
        }
        return redirect(route('seo-meta.index'))->with('success', __('admin/admin.seo_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type)
    {
        SeoMetaTags::whereType($type)->delete();
        return redirect(route('seo-meta.index'))->with('success', __('admin/admin.seo_deleted'));
    }
}
