<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Models
use App\Appointment;
use App\PrescriptionDetail;
use App\AnalysisType;
use App\Customer;
use App\AppointmentsRating;

// Events
use App\Events\DivertCallEvent;

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
                ->with(['specialist', 'customer'])
                ->whereHas('customer', function(Builder $query) {
                    $query->where('user_id', Auth::user()->id);
                })
                ->where('status', '<>', 'Finalizada')->first();
        }else{
            $meet = Appointment::where('id', $id)->with(['specialist.user', 'customer'])->where('deleted_at', NULL)->first();
        }
        
        $medicines = PrescriptionDetail::where('deleted_at', NULL)->groupBy('medicine_name')->get();
        $analisis = AnalysisType::with(['analisis'])
                        ->whereHas('analisis', function(Builder $query) {
                            $query->where('deleted_at', NULL)->orderBy('order', 'ASC');
                        })
                        ->where('deleted_at', NULL)->orderBy('order', 'ASC')->get();
        // return $meet;
        if($meet){
            return view('admin.meetings.join', compact('meet', 'medicines', 'analisis'));
        }else{
            return view('admin.meetings.error');
        }
    }

    public function divert_call(Request $request){
        $meet = Appointment::with(['specialist.user'])->where('id', $request->id)->first();
        try {
            // Eventos
            event(new DivertCallEvent($request->message, $meet->id));
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function rating_store(Request $request){
        DB::beginTransaction();
        try {
            AppointmentsRating::create([
                'appointment_id' => $request->id,
                'user_id' => Auth::user()->id,
                'rating' => $request->rating,
                'comment' => $request->comment
            ]);
            DB::commit();
            return response()->json(['success' => 'Gracias por tu puntuación!', 'message' => 'Esto nos ayuda a brindarte un mejor servicio.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Ocurrió un error!', 'message' => 'Ha ocurrido un error inesperado en nuestro servidor.']);
        }
    }
}
