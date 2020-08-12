<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = ['name', 'last_name', 'phones', 'adress', 'location', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
