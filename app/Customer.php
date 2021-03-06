<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = ['name', 'last_name', 'phones', 'address', 'location', 'user_id'];

    protected $with= ['user:id,name,email,avatar,firebase_token'];
    
    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->attributes['name'].' - '.$this->attributes['last_name'];
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
