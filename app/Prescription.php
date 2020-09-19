<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public $fillable = ['customer_id', 'specialist_id', 'appointment_id'];

    public function details(){
        return $this->hasMany('App\PrescriptionDetail');
    }

    public function specialist(){
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }
}
