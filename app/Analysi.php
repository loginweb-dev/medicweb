<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analysi extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'description', 'order'];

    public function type(){
        return $this->belongsTo('App\AnalysisType');
    }
}
