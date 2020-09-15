<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnalysisType extends Model
{
    use SoftDeletes;

    protected $fillable = ['analysis_type_id', 'name', 'description', 'order'];

    public function analisis(){
        return $this->hasMany('App\Analysi');
    }
}
