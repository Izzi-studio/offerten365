<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceToUser extends Model
{
    use HasFactory;
    protected $fillable = ['status','user_id','invoice_number','total','period','num_month','year','bonus','full_date','pay_type_generated'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_to_user';

    public function getPartner()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
