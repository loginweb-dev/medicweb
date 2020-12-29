<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialistPaymentDetail extends Model
{
    public $fillable = ['specialist_payment_id', 'appointment_id'];

    public function specialistpayment(){
        return $this->belongsTo('App\SpecialistPayment', 'specialist_payment_id');
    }

    public function appointment(){
        return $this->belongsTo('App\Appointment', 'appointment_id');
    }
}
