<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentTracking extends Model
{
    protected $table = 'appointment_tracking';
    protected $fillable = ['appointment_id'];
}
