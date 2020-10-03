<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Controllers
use App\Http\Controllers\LoginWebController as LoginWeb;

// Models
use App\Specialist;
use App\SpecialitySpecialist;
use App\User;
use App\Speciality;
use App\Schedule;

class SpecialistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.specialists.browse');
    }

    public function list($search){
        $query_search = $search != 'all' ? "(name like '%$search%' or last_name like '%$search%' or location like '%$search%')" : 1;
        $especialistas = Specialist::with(['user', 'schedules'])->where('deleted_at', NULL)->whereRaw($query_search)->get();
        return view('admin.specialists.partials.list', compact('especialistas'));
    }

    public function get($search){
        $query_search = $search != 'all' ? "(name like '%$search%' or last_name like '%$search%' or location like '%$search%')" : 1;
        return Specialist::with(['specialities', 'user'])
                    ->whereRaw($query_search)
                    ->orWhereHas('specialities', function($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    })
                    ->where('deleted_at', NULL)
                    ->get();
        // return response()->json(['specialists' => $especialistas]);
    }

    public function specialities($id){
        $especialistas = Specialist::with(['user', 'specialities', 'appointments.rating', 'schedules'])
                            ->whereHas('specialities', function($query)use ($id){
                                $query->where('speciality_id', $id);
                            })
                            ->where('deleted_at', NULL)->get();
        $especialidad = Speciality::find($id)->name;
        $horario_actual = Schedule::where('day', date('N'))->where('start', '<', date('H:i:s'))->where('end', '>', date('H:i:s'))->first();
        return view('dashboard.partials.specialists_list', compact('especialistas', 'especialidad', 'horario_actual'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$especialidades = Speciality::where('deleted_at', NULL)->get();
        $specialist = new Specialist;
        //$ciudades = DB::table('specialists')->select('location')->groupBy('location')->get();
        $horarios = Schedule::where('status', 1)->where('deleted_at', NULL)->orderBy('day')->orderBy('start')->get();
        return view('admin.specialists.form', compact('specialist', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        // Verificar si se hizo check para volver a la misma página
        $route = $request->return ? 'specialists.create' : 'specialists.index';

        $request->validate([
            'name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'phones' => 'required|max:191',
            'location' => 'required|max:191',
            'adress' => 'required',
            'email' => 'required|unique:users|max:50',
            'password' => 'required|max:50',
        ]);


        DB::beginTransaction();
        try {
            $avatar = (new LoginWeb)->save_image($request->avatar, 'users');
            // Crear usuario
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'avatar' => $avatar,
                'role_id' => 5
            ]);

            // Crear especialista
            $especialista = Specialist::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phones' => $request->phones,
                'adress' => $request->adress,
                'location' => $request->location,
                'prefix' => $request->prefix,
                'status' => 1,
                'user_id' => $user->id
            ]);
            // Asignar especialidades
            $especialista->specialities()->attach($request->specialities);
            // Asignar los horarios
            $especialista->schedules()->attach($request->schedules);
            DB::commit();
            return redirect()->route($route)->with(['message' => 'Especialista agregado exitosamente.', 'alert-type' => 'success']);
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
    public function edit(Specialist $specialist)
    {
        $horario_especialista = Specialist::with(['schedules'])->where('id', $specialist->id)->where('deleted_at', NULL)->first()->schedules;
        $horarios = Schedule::where('status', 1)->where('deleted_at', NULL)->orderBy('day')->orderBy('start')->get();
        return view('admin.specialists.form', compact('specialist', 'horarios', 'horario_especialista'));
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

        // Verificar si se hizo check para volver a la misma página
        $route = $request->return ? 'specialists.update' : 'specialists.index';
        $especialista = Specialist::findOrFail($id);
        $request->validate([
            'name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'phones' => 'required|max:191',
            'location' => 'required|max:191',
            'adress' => 'required',
            'email' => 'required|max:50'
        ]);

        DB::beginTransaction();
        try {
            $avatar = (new LoginWeb)->save_image($request->avatar, 'users');
            // dd($avatar);
             // Crear especialista
            $especialista->name = $request->name;
            $especialista->last_name = $request->last_name;
            $especialista->phones = $request->phones;
            $especialista->adress = $request->adress;
            $especialista->location = $request->location;
            $especialista->prefix = $request->prefix;
            $especialista->update();

            //actualizamos el usuario del especialista
            if ($request->password) {
                $especialista->user->update([
                    'password' => Hash::make($request['password'])
                ]);
            }

            if($avatar) {
                $especialista->user->update([
                    'avatar' => $avatar
                ]);
            }
           $especialista->user->update([
               'email' => $request['email']
           ]);

            // Actualizar especialidades
            $especialista->specialities()->sync($request->specialities);

            // Asignar los horarios
            $especialista->schedules()->sync($request->schedules);
            DB::commit();
            return redirect()->route($route)->with(['message' => 'Especialista actualizado exitosamente.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route($route)->with(['message' => 'Ocurrio un error al realizar el registro.', 'alert-type' => 'error']);
        }
    }

    public function edit_status($id, $status){
        try {
            $especialista = Specialist::find($id);
            $especialista->status = $status;
            $especialista->save();
            return response()->json(['data' => $especialista]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error inesperado']);
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
