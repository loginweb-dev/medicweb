<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function appointments(){
        return view('admin.reports.appointments');
    }
}
