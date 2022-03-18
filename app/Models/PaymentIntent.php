<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentIntent extends Model
{
    use HasFactory;
	protected $table = 'payment_intents';
	protected $fillable = ['payment_intent_id','payment_intent_client_secret','amount','status','user_id'];
	

}
