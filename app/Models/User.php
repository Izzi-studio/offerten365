<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Str;
use Carbon\Carbon;
use App\Notifications\ResetPasswordNotification;
use Hash;
class User extends Authenticatable
{
    use HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'lastname',
        'password',
        'role_id',
        'company',
        'phone',
        'availability',
        'coins',
        'profile_slug',
        'status',
        'status_pay',
		'active',
        'postcode',
        'city',
        'street',
        'house',
        'subscription_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function isAdmin(){
        return $this->role_id == 0 ? true : false;
    }

    public function isClient(){
        return $this->role_id == 1 ? true : false;
    }

    public function isPartner(){
        return $this->role_id == 2 ? true : false;
    }
    /**
     * Get Matching Users
     *
     * @param int $regionId,
     * @param int $typeJobId
     * @return $query
     */
    public function scopeGetMatchingConditionUsers($query, $regionId, $typeJobId)
    {
        return $query->join('partner_want_jobs as pwj','pwj.user_id','users.id')
            ->join('partner_regions as pr','pr.user_id','users.id')
            ->where('pwj.type_job_id',$typeJobId)
            ->where('pr.region_id',$regionId)
            ->where('users.active',1)
            ->select('users.id as user_id','users.name','users.email','users.company');

    }

    /**
     * Get Matching Users
     *
     * @param int $regionId,
     * @param int $typeJobId
     * @return $query
     */
    public function scopegetPartners($query)
    {

        $result = $query
            ->where('role_id',2)
            ->leftJoin('request_change_partner_info','users.id','=','request_change_partner_info.user_id')
            ->selectRaw('users.*, (select  count(request_change_partner_info.id) AS `count` from request_change_partner_info where request_change_partner_info.status = 1 and users.id = request_change_partner_info.user_id) AS `count`')
            ->groupBy('users.id')
            ->orderBy('count','DESC')
            ->orderBy('id','DESC');

        $queryStr = request()->get('search',null);

        if ($queryStr){
            $result = $result->where('company','LIKE','%'.$queryStr.'%')
                ->orWhere('name','LIKE','%'.$queryStr.'%')
                ->orWhere('users.id',$queryStr)
                ->orWhere('email','LIKE','%'.$queryStr.'%');
        }


        return   $result->paginate(200);

    }

    /**
     * Get Proposals to Partner  by status
     *
     * @param  int $status 0,1,2
     * @return $query
     */
    public function getProposalsByStatus($status){

		$startDate = Carbon::now()->format('Y/m/d');

        return $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
            'user_id','id','id','proposal_id')
            ->where('proposals_to_partner.status',$status)
			->where('date_start','>=',$startDate)
            ->orderBy('id','DESC');
    }

    /**
     * Get Proposals to Partner  by status
     *
     * @param  int $status 0,1,2
     * @return $query
     */
    public function getProposalsByStatusAdmin($status){


        return $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
            'user_id','id','id','proposal_id')
            ->where('proposals_to_partner.status',$status)
            ->orderBy('id','DESC');
    }

    /**
     * Get Proposals to Partner  by status
     *
     * @param  int $status 0,1,2
     * @return $query
     */
    public function getProposalsByStatusCabinet($status, $year = null, $month = null){
        if($year != null && $month != null){
            $datastart = Carbon::create()->startOfMonth()->month($month)->year($year)->startOfMonth()->format('Y-m-d 00:00:00');
            $dataend = Carbon::create()->endOfMonth()->month($month)->year($year)->startOfMonth()->format('Y-m-d 00:00:00');

            return $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
                'user_id','id','id','proposal_id')
                ->where('proposals_to_partner.status',$status)
                ->whereBetween('proposals_to_partner.created_at',[$datastart, $dataend])
                ->orderBy('id','DESC');
        }
        return $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
            'user_id','id','id','proposal_id')
            ->where('proposals_to_partner.status',$status)
            ->orderBy('id','DESC');
    }

    /**
     * Get Proposals to Partner
     *
     * @return $query
     */
    public function getProposals(){

        return $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
            'user_id','id','id','proposal_id');
    }
	/**
     * Get Proposals to Partner
     *
     * @return $query
     */
    public function getProposalsToPartner(){

        return $this->hasMany( 'App\Models\ProposalToPartner', 'user_id','id');
    }

	/**
     * Get Proposals to Partner
     *
     * @return $query
     */
    public function getProposalsCabinet(){
        return $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
            'user_id','id','id','proposal_id')->whereStatus('<>',0);
    }

	/**
     * Get Proposals to Partner
     *
     * @return $query
     */
    public function getCountProposalsCabinet(){

		$startDate = Carbon::now()->format('Y/m/d');

		$new = $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
            'user_id','id','id','proposal_id')->whereStatus('<>',0)->where('date_start','>=',$startDate)->count();

		$accepted = $this->hasManyThrough('App\Models\Proposal', 'App\Models\ProposalToPartner',
            'user_id','id','id','proposal_id')->whereStatus(1)->count();

        return $new + $accepted;
    }


    /**
     * Get Users Proposals by Type Job
     *
     * @param  int $typeJobId 1,2,3,4
     * @return $query
     */
    public function getProposalsByTypeJob($typeJobId){
        return $this->hasMany('App\Models\Proposal','user_id','id')
            ->where('type_job_id',$typeJobId)
            ->orderBy('id','DESC');
    }
    /**
     * Get Reviews

     * @return $query
     */
    public function getReviews(){
        return $this->hasOne('App\Models\Review','user_id_to','id')
            ->orderBy('id','DESC')
            ->withDefault(['*' => null]);
    }

    public function getInvoices()
    {
        return $this->hasOne('App\Models\InvoiceToUser', 'user_id', 'id');
    }

    public function getTransaction()
    {
        return $this->hasMany('App\Models\PaymentIdeaPay');
    }

    public function regions()
    {
        return $this->hasMany('App\Models\PartnerRegions');
    }

    public function typesJobs()
    {
        return $this->hasMany('App\Models\PartnerWantJobs');
    }

    public function requestChangeInfo()
    {
        return $this->hasMany('App\Models\RequestCahngePartnerInfo')->orderBy('id','desc');
    }
    public function requestChangeInfoNew()
    {
        return $this->hasMany('App\Models\RequestCahngePartnerInfo')->whereStatus(1)->count();
    }


	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPasswordNotification($token));
	}
}
