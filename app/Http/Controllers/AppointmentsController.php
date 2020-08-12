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

// Events
use App\Events\StartMeetEvent;

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
        return view('admin.appointments.browse');
    }

    public function list($search){
        $query_search = $search != 'all' ? "(name like '%$search%' or last_name like '%$search%')" : 1;
        $citas = Auth::user()->role_id == 5 ?
                    Appointment::whereHas('especialista.user', function($query) {
                            $query->where('id', Auth::user()->id);
                        })
                        ->with(['especialista.user', 'cliente'])
                        ->where('deleted_at', NULL)
                        ->whereRaw($query_search)
                        ->orderBy('date', 'DESC')->orderBy('start', 'DESC')->get() :

                    Appointment::with(['especialista', 'cliente'])
                        ->where('deleted_at', NULL)
                        ->whereRaw($query_search)
                        ->orderBy('date', 'DESC')->orderBy('start', 'DESC')->get();
        return view('admin.appointments.partials.list', compact('citas'));
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

        $request->validate([
            'specialist_id' => 'required',
            'customer_id' => 'required',
            'date' => 'required',
            'start' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $end = Carbon::create($request->date.' '.$request->start);
            $end = $end->addMinutes(setting('citas.duracion'));
            $status = $request->date.' '.$request->start <= date('Y-m-d H:i:s') ? 'En curso' : 'Pendiente';

            // Crear cita
            $cita = Appointment::create([
                'specialist_id' => $request->specialist_id,
                'customer_id' => $request->customer_id,
                'date' => $request->date,
                'start' => $request->start,
                'end' => $end->format('H:i:s'),
                'status' => $status,
                'observations' => $request->observations
            ]);

            $cita = Appointment::find($cita->id);
            $cita->code = date('Ymdhis').$cita->id;
            $cita->save();

            DB::commit();
            return redirect()->route($route)->with(['message' => 'Cita agregada exitosamente.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route($route)->with(['message' => 'Ocurrio un error al realizar el registro.', 'alert-type' => 'error']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  string $status
     * @return \Illuminate\Http\Response
     */
    public function update_status($id, $status)
    {
        $status = str_replace('_', ' ', $status);
        DB::beginTransaction();
        try {
            $cita = Appointment::find($id);
            $cita->status = $status;
            $cita->save();

            DB::commit();
            
            try {
                $cita = Appointment::with(['especialista', 'cliente'])->where('id', $id)->first();
                event(new StartMeetEvent($cita));
            } catch (\Throwable $th) {}

            return response()->json(['success' => 'Estado de la actualizado.']);
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
