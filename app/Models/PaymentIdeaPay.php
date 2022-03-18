<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentIdeaPay extends Model
{
    use HasFactory;
	protected $table = 'payment_idea_pay';
	protected $fillable = ['reference_id','hash','amount','status','user_id','transaction_id','payment_request_id','transaction_uuid'];
	
}