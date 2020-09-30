<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentAccount extends Model
{
    protected $fillable = ['title', 'image', 'number', 'name', 'type', 'ci', 'currency'];
}
