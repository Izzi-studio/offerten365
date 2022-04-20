<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Models\TypesOfJobs;
use App\Models\Setting;
use App\Models\User;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscriptions::all();
        return view('admin.subscriptions.list',compact(['subscriptions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typesOfJobs = TypesOfJobs::all();
        return view('admin.subscriptions.add',compact(['typesOfJobs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subs = Subscriptions::create(['name'=>$request->name]);

        foreach($request->prices as $price){
            Setting::create(['key'=>'system.price.'.$subs->id.'.cost_'.$price['type_job'],'value'=>$price['price'],'type'=>'text']);
        }

        return redirect(route('subscriptions.index'))->with('success', __('admin/admin.subscriptions_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Subscriptions $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriptions $subscription)
    {
        $typesOfJobs = TypesOfJobs::all();

        return view('admin.subscriptions.edit',compact(['typesOfJobs','subscription']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Subscriptions $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriptions $subscription)
    {

        $subscription->update(['name'=>$request->name]);

        Setting::where('key','LIKE','system.price.'.$subscription->id.'%')->delete();

        foreach($request->prices as $price){
            Setting::create(['key'=>'system.price.'.$subscription->id.'.cost_'.$price['type_job'],'value'=>$price['price'],'type'=>'text']);
        }

        return redirect(route('subscriptions.index'))->with('success', __('admin/admin.subscriptions_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subscriptions $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriptions $subscription)
    {
        $isset = User::whereSubscriptionId($subscription->id)->first();

        if($subscription->id == 1){
            return redirect(route('subscriptions.index'))->with('error', __('admin/admin.subscriptions_default_not_delete'));
        }

        if($isset){
            return redirect(route('subscriptions.index'))->with('error', __('admin/admin.subscriptions_have_some_users'));
        }

        $subscription->delete();
        return redirect(route('subscriptions.index'))->with('success', __('admin/admin.subscriptions_deleted'));
    }

}
