<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmailTemplatesCollection;
use App\Http\Resources\EmailTemplatesResource;
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
        $type= request()->get('type',null);
        return new EmailTemplatesCollection(EmailTemplates::whereType($type)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EmailTemplates $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(EmailTemplates $emailTemplate)
    {
        return new EmailTemplatesResource($emailTemplate);
    }

}
