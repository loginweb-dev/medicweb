<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionDetail extends Model
{
    public $fillable = ['prescription_id', 'medicine_name', 'medicine_description'];
}
