<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysisCustomer extends Model
{
    protected $table = 'analysis_customer';
    protected $fillable = ['customer_id', 'specialist_id', 'appointment_id', 'observations'];

    public function specialist(){
        return $this->belongsTo('App\Specialist', 'specialist_id');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function details(){
        return $this->hasMany('App\AnalysisCustomerDetail', 'analysis_customer_id');
    }
}
