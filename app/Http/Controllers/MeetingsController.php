<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Appointment;

class MeetingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function join($id){
        $meet = Appointment::where('id', $id)->with(['especialista', 'cliente'])->first();
        if($meet){
            return view('admin.meetings.join', compact('meet'));
        }else{
            return view('admin.meetings.error');
        }
    }
}
