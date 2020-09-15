<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

// Models
use App\Appointment;
use App\PrescriptionDetail;
use App\AnalysisType;

class MeetingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function join($id){
        if(Auth::user()->role_id == 2){
            $meet = Appointment::where('id', $id)
                ->with(['especialista', 'cliente'])
                ->whereHas('cliente', function(Builder $query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->where('status', '<>', 'Finalizada')->first();
        }else{
            $meet = Appointment::where('id', $id)->with(['especialista', 'cliente'])->where('deleted_at', NULL)->first();
        }
        
        $medicines = PrescriptionDetail::where('deleted_at', NULL)->groupBy('medicine_name')->get();
        $analisis = AnalysisType::with(['analisis'])
                        ->whereHas('analisis', function(Builder $query) {
                            $query->where('deleted_at', NULL)->orderBy('order', 'ASC');
                        })
                        ->where('deleted_at', NULL)->orderBy('order', 'ASC')->get();
        if($meet){
            return view('admin.meetings.join', compact('meet', 'medicines', 'analisis'));
        }else{
            return view('admin.meetings.error');
        }
    }
}
