<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Speciality extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $fillable = ['name', 'description', 'icon'];
    
    public function specialists(){
        return $this->belongsToMany(Specialist::class);
    }
}
