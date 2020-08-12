<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    public $fillable = ['name', 'last_name', 'phones', 'adress', 'location', 'prefix', 'status', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
