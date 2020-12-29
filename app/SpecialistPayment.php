<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialistPayment extends Model
{
    public $fillable = ['specialist_id', 'user_id', 'observations', 'status'];

    public function specialist(){
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function details(){
        return $this->hasMany('App\SpecialistPaymentDetail', 'specialist_payment_id');
    }
}
