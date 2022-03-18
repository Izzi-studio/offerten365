<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
	protected $table = 'payments';
	protected $fillable = ['json_data_payment','customer_id','amount'];
}
