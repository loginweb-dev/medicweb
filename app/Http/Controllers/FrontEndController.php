<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class FrontEndController extends Controller
{
  function default(){
      return view('layouts.frontend.welcome');        
   }
}
