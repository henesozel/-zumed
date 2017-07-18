<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EtkinlikOdeme extends Model
{
    protected $guarded=[];


    public function etkinlik()
    {
        //return $this->hasMany('App\Etkinlik');
        return $this->belongsTo('App\Etkinlik','etkinlik_id','etkinkik_id');
    }
}
