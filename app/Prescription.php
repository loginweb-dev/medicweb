<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public $fillable = ['customer_id', 'specialist_id', 'appointment_id'];
}
