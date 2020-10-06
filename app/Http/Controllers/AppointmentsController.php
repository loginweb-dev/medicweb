<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

// Models
use App\Specialist;
use App\Customer;
use App\Appointment;
use App\User;
use App\Speciality;
use App\AppointmentTracking;
use App\AppointmentsObservation;
use App\AnalysisCustomer;
use App\Prescription;

// Events
use App\Events\StartMeetEvent;
use App\Events\IncomingCallEvent;
use App\Events\IncomingCallSpecialistEvent;
use App\Events\VerifyPaymentEvent;

class AppointmentsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialist = Specialist::whereHas('user', function($q){
            $q->where('id', Auth::user()->id);
        })->first();
        return view('admin.appointments.browse', compact('specialist'));
    }

    public function list($search){
        $query_search = $search != 'all' ? "(name like '%$search%' or last_name like '%$search%')" : 1;
        $citas = Auth::user()->role_id == 5 ?
                    Appointment::whereHas('specialist.user', function($query) {
                            $query->where('id', Auth::user()->id);
                        })
                        ->with(['specialist.user', 'customer', 'tracking'])
                        ->where('deleted_at', NULL)
                        ->whereRaw($query_search)
                        ->where('status', '<>', 'Validar')
                        ->orderBy('date', 'DESC')->orderBy('start', 'DESC')->get() :

                    Appointment::with(['specialist', 'customer', 'tracking'])
                        ->where('deleted_at', NULL)
                        ->whereRaw($query_search)
                        ->orderBy('date', 'DESC')->orderBy('start', 'DESC')->get();
        $specialist = Specialist::whereHas('user', function($q){
            $q->where('id', Auth::user()->id);
        })->first();
        return view('admin.appointments.partials.list', compact('citas', 'specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialistas = Specialist::where('deleted_at', NULL)->get();
        $clientes = Customer::where('deleted_at', NULL)->get();
        return view('admin.appointments.add', compact('especialistas', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verificar si se hizo check para volver a la misma página
        $route = $request->return ? 'appointments.create' : 'appointments.index';

        $response_json = $request->ajax ? 1 : 0;

        $request->validate([
            'specialist_id' => 'required',
            'customer_id' => 'required',
            'date' => 'required',
            'start' => 'required'
        ]);

        DB::beginTransaction();
        try {
            // Calcular hora de finalización de la cita
            $end = Carbon::create($request->date.' '.$request->start);
            $end = $end->addMinutes(setting('citas.duracion'));
            if($request->payment_type == 1){
                $status = 'Validar';
            }else{
                $status = $request->date.' '.$request->start <= date('Y-m-d H:i:s') ? 'Conectando' : 'Pendiente';
            }

            // Crear cita
            $cita = Appointment::create([
                'specialist_id' => $request->specialist_id,
                'customer_id' => $request->customer_id,
                'speciality_id' => $request->speciality_id,
                'amount' => $request->price,
                'amount_add' => $request->price_add,
                'date' => $request->date,
                'start' => $request->start,
                'end' => $end->format('H:i:s'),
                'status' => $status,
                'observations' => $request->observations
            ]);

            $cita = Appointment::find($cita->id);
            $cita->code = date('Ymdhis').$cita->id;
            $cita->save();

            // Eventos
            try {
                $cita = Appointment::with(['specialist.user', 'customer'])->where('id', $cita->id)->first();
                if($status == 'Conectando'){
                    event(new IncomingCallSpecialistEvent($cita, $cita->specialist->user_id));
                }elseif($status == 'Validar'){
                    event(new VerifyPaymentEvent($cita));
                }
            } catch (\Throwable $th) {}

            DB::commit();
            if($response_json){
                return response()->json(['success' => 'Cita médica registrada correctamente.']);
            }else{
                return redirect()->route($route)->with(['message' => 'Cita agregada exitosamente.', 'alert-type' => 'success']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            if($response_json){
                return response()->json(['error' => 'Ocurrió un error inesperado.']);
            }else{
                return redirect()->route($route)->with(['message' => 'Ocurrio un error al realizar el registro.', 'alert-type' => 'error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response_json = $request->ajax ? 1 : 0;

        DB::beginTransaction();
        try {

            // Calcular hora de finalización de la cita
            $end = Carbon::create($request->date.' '.$request->start);
            $end = $end->addMinutes(setting('citas.duracion'));
            $status = $request->date.' '.$request->start <= date('Y-m-d H:i:s') ? 'Conectando' : 'Pendiente';
            
            $cita = Appointment::find($id);
            $cita->date = $request->date;
            $cita->start = $request->start;
            $cita->end = $end;
            $cita->status = $status;
            $cita->save();

            DB::commit();
            if($response_json){
                return response()->json(['success' => 'Cita médica pospuesta correctamente.']);
            }else{
                return redirect()->route('appointments.index')->with(['message' => 'Cita médica pospuesta correctamente.', 'alert-type' => 'success']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            if($response_json){
                return response()->json(['error' => 'Ocurrió un error inesperado.']);
            }else{
                return redirect()->route('appointments.index')->with(['message' => 'Ocurrio un error al posponer la cita médica.', 'alert-type' => 'error']);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  string $status
     * @return \Illuminate\Http\Response
     */
    public function update_status($id, $status = '')
    {
        $status = str_replace('_', ' ', $status);
        $verify_payment = false;
        if(!$status){
            $cita = Appointment::findOrFail($id);
            $status = $cita->date.' '.$cita->start <= date('Y-m-d H:i:s') ? 'Conectando' : 'Pendiente';
            $verify_payment = true;
        }

        DB::beginTransaction();

        try {
            $cita = Appointment::find($id);
            $cita->status = $status;
            $cita->save();

            DB::commit();
            
            // Eventos
            try {
                $cita = Appointment::with(['specialist.user', 'customer'])->where('id', $id)->first();
                event(new StartMeetEvent($cita));
                if($status == 'Conectando' && !$verify_payment){
                    event(new IncomingCallEvent($cita, $cita->customer->user_id));
                }else{
                    event(new IncomingCallSpecialistEvent($cita, $cita->specialist->user_id));
                }
            } catch (\Throwable $th) {}

            return response()->json(['success' => 'Estado de la actualizado.']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Ocurrió un error inesperado.']);
        }
    }

    /**
     * Tracking duration meet.
     *
     * @param  int  $id
     * @return void
     */
    public function tracking_duration($id)
    {
        AppointmentTracking::create(['appointment_id' => $id]);
    }

    /**
     * browse observations appoiments.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function browse_observations($id)
    {
        $observaciones = Appointment::with(['details', 'specialist'])
                            ->whereHas('specialist', function($query) use ($id) {
                                $query->where('id', $id);
                            })
                            ->where('deleted_at', NULL)
                            ->get();
        $recetas = Prescription::with(['details'])
                                ->where('appointment_id', $id)
                                ->get();
        $ordenes = AnalysisCustomer::with(['details.analysis'])
                                ->where('appointment_id', $id)
                                ->get();
        return view('admin.customers.partials.historial', compact('observaciones', 'recetas', 'ordenes'));
    }

    /**
     * Add observations appoiments.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_observations(Request $request)
    {
        DB::beginTransaction();
        try {
            AppointmentsObservation::create([
                'appointment_id' => $request->appointment_id,
                'description' => $request->description
            ]);
            DB::commit();
            return response()->json(['success' => 'Observación registrada correctamente.', 'action' => 'observations']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Ocurrió un error inesperado.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
