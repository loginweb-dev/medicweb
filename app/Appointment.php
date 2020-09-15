<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $fillable = ['specialist_id', 'customer_id', 'date', 'start', 'end', 'status', 'code', 'observations'];

    public function especialista(){
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }

    public function cliente(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function tracking(){
        return $this->hasMany('App\AppointmentTracking');
    }

    public function observaciones(){
        return $this->hasMany('App\AppointmentsObservation');
    }
}
