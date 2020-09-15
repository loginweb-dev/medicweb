<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentsObservation extends Model
{
    protected $fillable = ['appointment_id', 'description'];
}
