<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplatesDescription;
use Illuminate\Http\Request;
use App\Models\EmailTemplates;

class EmailTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = EmailTemplates::all();
        return view('admin.email-templates.list',compact(['templates']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.email-templates.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = new EmailTemplates();
        $template->type = 'invoice';
        $template->save();

        foreach($request->template as $locale=>$data){
                 $this->insertDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'subject'=> $data['main']['subject'],
                'content'=> $data['main']['content'],
                'template_id'=>$template->id
            ]);

        }

        return redirect(route('email-templates.index'))->with('success', __('admin/admin.template_added'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  EmailTemplates $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplates $emailTemplate)
    {
        return view('admin.email-templates.edit',compact(['emailTemplate']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   EmailTemplates $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailTemplates $emailTemplate)
    {

        EmailTemplatesDescription::whereTemplateId($emailTemplate->id)
            ->delete();

        foreach($request->template as $locale=>$data){
                 $this->insertDescription([
                'locale'=>$locale,
                'name'=> $data['main']['name'],
                'subject'=> $data['main']['subject'],
                'content'=> $data['main']['content'],
                'template_id'=>$emailTemplate->id
            ]);

        }

        return redirect(route('email-templates.index'))->with('success', __('admin/admin.template_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplates $emailTemplate)
    {
        $emailTemplate->EmailTemplateDescriptionDestroy()->delete();
        $emailTemplate->delete();
        return redirect(route('email-templates.index'))->with('success', __('admin/admin.template_deleted'));
    }

    private function insertDescription(array $data){

        EmailTemplatesDescription::create($data);
    }
}
