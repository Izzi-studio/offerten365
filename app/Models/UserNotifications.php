<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotifications extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','invoice_id','status'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_notifications';
    protected $dates = [
        'created_at'
    ];
}
