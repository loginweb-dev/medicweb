<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentsPayment extends Model
{
    protected $fillable = ['specialist_id', 'user_id', 'amount', 'count_appointment', 'time_frame', 'observations'];
}
