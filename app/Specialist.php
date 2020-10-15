<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    public $fillable = ['name', 'last_name', 'phones', 'adress', 'description', 'location', 'prefix', 'status', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function specialities(){
        return $this->belongsToMany(Speciality::class);
    }

    public function horarios(){
        return $this->belongsToMany(Horario::class,'horario_medicos');
    }

    public function schedules(){
        return $this->belongsToMany(Schedule::class,'schedule_specialist');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->attributes['prefix'].' '.$this->attributes['name'].' '.$this->attributes['last_name'];
    }
}
