<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Models
use App\Customer;
use App\User;
use App\Speciality;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customers.browse');
    }

    public function list($search){
        $query_search = $search != 'all' ? "(name like '%$search%' or last_name like '%$search%')" : 1;
        $cliente = Customer::with(['user'])->where('deleted_at', NULL)->whereRaw($query_search)->get();
        return view('admin.customers.partials.list', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.add');
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
        $route = $request->return ? 'customers.create' : 'customers.index';

        $request->validate([
            'name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'phones' => 'required|max:191',
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

            // Crear cliente
            Customer::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phones' => $request->phones,
                'adress' => $request->adress,
                'location' => $request->location,
                'user_id' => $user->id
            ]);

            DB::commit();
            return redirect()->route($route)->with(['message' => 'Cliente agregado exitosamente.', 'alert-type' => 'success']);
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
