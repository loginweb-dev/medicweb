<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Models
use App\Specialist;
use App\SpecialitySpecialist;
use App\User;
use App\Speciality;

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
        $especialistas = Specialist::with(['user'])->where('deleted_at', NULL)->whereRaw($query_search)->get();
        return view('admin.specialists.partials.list', compact('especialistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Speciality::where('deleted_at', NULL)->get();
        $ciudades = DB::table('specialists')->select('location')->groupBy('location')->get();
        return view('admin.specialists.add', compact('especialidades', 'ciudades'));
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
            // Crear usuario
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
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
            foreach ($request->speciality_id as $value) {
                SpecialitySpecialist::create([
                    'speciality_id' => $value,
                    'specialist_id' => $especialista->id
                ]);
            }
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
