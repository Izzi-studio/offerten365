<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key','value'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'setting';
    public $timestamps = false;

    public function scopeAdminSetting($query){
        return $query->where('key', 'LIKE', 'system.setting.%');
    }

    public function scopegetByKey($query,$key){
        return $query->where('key', $key)->value('value');
    }
}
