<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Appointment;
use App\SpecialistPayment;

class ReportsController extends Controller
{
    public function appointments(){
        return view('admin.reports.appointments');
    }

    public function appointments_list(Request $request){
        $query_search = $request->specialist_id ? "specialist_id = ".$request->specialist_id: 1;
        $citas = Appointment::with(['specialist', 'customer', 'tracking'])
                        ->whereDate('date', '>=', date('Y-m-d', strtotime($request->start)))
                        ->whereDate('date', '<=', date('Y-m-d', strtotime($request->finish)))
                        ->orderBy('date', 'DESC')->orderBy('start', 'DESC')->get();
        return view('admin.reports.appointments_list', compact('citas'));
    }

    public function payments(){
        return view('admin.reports.payments');
    }

    public function payments_list(Request $request){
        $query_search = $request->specialist_id ? "specialist_id = ".$request->specialist_id: 1;
        $pagos = SpecialistPayment::with(['specialist', 'user', 'details.appointment'])
                    ->whereDate('created_at', '>=', date('Y-m-d', strtotime($request->start)))
                    ->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->finish)))
                    ->whereRaw($query_search)
                    ->get();
        // dd($pagos);
        return view('admin.reports.payments_list', compact('pagos'));
    }

    public function charts(){
        return view('admin.reports.charts');
    }
}
