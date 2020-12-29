<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $fillable = ['specialist_id', 'customer_id', 'speciality_id', 'date', 'start', 'end', 'status', 'code', 'amount', 'amount_add', 'paid', 'amount_paid', 'observations'];

    public function specialist(){
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function tracking(){
        return $this->hasMany('App\AppointmentTracking');
    }

    public function rating(){
        return $this->hasMany('App\AppointmentsRating');
    }

    public function details(){
        return $this->hasMany('App\AppointmentsObservation');
    }

    public function analysis(){
        return $this->hasMany('App\AnalysisCustomer', 'appointment_id');
    }

    public function prescription(){
        return $this->hasMany('App\Prescription', 'appointment_id');
    }
}
