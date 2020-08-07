<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FrontEndController extends Controller
{
  function default(){
      return view('layouts.frontend.welcome');        
  }

  public function account(){
    return view('layouts.frontend.admin.account');        
  }
}
