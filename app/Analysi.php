<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analysi extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'order'];
}
