<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentsRating extends Model
{
    protected $fillable = ['appointment_id', 'user_id', 'rating', 'comment'];
}
