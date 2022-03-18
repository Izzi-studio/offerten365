<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqDescription;
use Illuminate\Http\Request;
use App\Models\Faq;
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.faq-list',compact(['faqs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.faq-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $faq = new Faq();
		$faq->type_job_id = $request->type_job_id;
        $faq->save();

        foreach($request->faq as $locale=>$data) {
            $this->insertFaqDescription([
                'locale' => $locale,
                'heading' => $data['main']['heading'],
                'content' => $data['main']['content'],
                'faq_id' => $faq->id
            ]);
        }
        return redirect(route('faq.index'))->with('success', __('admin/admin.faq_added'));
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
    public function edit(Faq $faq)
    {
        return view('admin.faq.faq-edit',compact(['faq']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
		$faq->type_job_id = $request->type_job_id;
		 $faq->save();
        FaqDescription::whereFaqId($faq->id)
            ->delete();

        foreach($request->faq as $locale=>$data) {
            $this->insertFaqDescription([
                'locale' => $locale,
                'heading' => $data['main']['heading'],
                'content' => $data['main']['content'],
                'faq_id' => $faq->id
            ]);
        }
        return redirect(route('faq.index'))->with('success', __('admin/admin.faq_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->faqDescriptionDestroy()->delete();
        $faq->delete();
        return redirect(route('faq.index'))->with('success', __('admin/admin.faq_deleted'));
    }

    private function insertFaqDescription(array $data){
        return FaqDescription::create($data);
    }
}
