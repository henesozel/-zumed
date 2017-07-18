<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etkinlik extends Model
{
    protected $guarded=[];


    public function etkinlik_odemeleri()
    {
        return $this->hasMany('App\EtkinlikOdeme','etkinlik_odeme_id','etkinlik_id');
        //return $this->belongsTo('App\EtkinlikOdeme','etkinlik_odeme_id','id');
    }
}
