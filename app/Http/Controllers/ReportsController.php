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
                        ->whereYear('date', '>=', date('Y', strtotime($request->start)))
                        ->whereMonth('date', '>=', date('m', strtotime($request->start)))
                        ->whereDay('date', '>=', date('d', strtotime($request->start)))
                        ->whereYear('date', '<=', date('Y', strtotime($request->finish)))
                        ->whereMonth('date', '<=', date('m', strtotime($request->finish)))
                        ->whereDay('date', '<=', date('d', strtotime($request->finish)))
                        ->whereRaw($query_search)
                        // ->where('deleted_at', NULL)
                        ->orderBy('date', 'DESC')->orderBy('start', 'DESC')->get();
        return view('admin.reports.appointments_list', compact('citas'));
    }

    public function payments(){
        return view('admin.reports.payments');
    }

    public function payments_list(Request $request){
        $query_search = $request->specialist_id ? "specialist_id = ".$request->specialist_id: 1;
        $pagos = SpecialistPayment::with(['specialist', 'user', 'details.appointment'])
                    ->whereYear('created_at', '>=', date('Y', strtotime($request->start)))
                    ->whereMonth('created_at', '>=', date('m', strtotime($request->start)))
                    ->whereDay('created_at', '>=', date('d', strtotime($request->start)))
                    ->whereYear('created_at', '<=', date('Y', strtotime($request->finish)))
                    ->whereMonth('created_at', '<=', date('m', strtotime($request->finish)))
                    ->whereDay('created_at', '<=', date('d', strtotime($request->finish)))
                    ->whereRaw($query_search)
                    ->get();
        // dd($pagos);
        return view('admin.reports.payments_list', compact('pagos'));
    }
}
