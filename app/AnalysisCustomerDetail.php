<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysisCustomerDetail extends Model
{
    protected $table = 'analysis_customer_details';
    protected $fillable = ['analysis_customer_id', 'analysi_id'];

    public function analysis(){
        return $this->belongsTo('App\Analysi', 'analysi_id');
    }
}
