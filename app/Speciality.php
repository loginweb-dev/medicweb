<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public $fillable = ['name', 'description', 'icon'];
}
