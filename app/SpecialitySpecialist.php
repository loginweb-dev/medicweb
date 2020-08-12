<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialitySpecialist extends Model
{
    protected $table = 'speciality_specialist';
    public $fillable = ['speciality_id', 'specialist_id'];
}
