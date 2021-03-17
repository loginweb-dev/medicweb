<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Controllers
use App\Http\Controllers\LoginWebController as LoginWeb;

// Models
use App\Customer;
use App\User;
use App\Speciality;
use App\Appointment;

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
            'address' => 'required',
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
                'address' => $request->address,
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
    public function show(Customer $customer)
    {
        $id = $customer->id;
        $observaciones = Appointment::with(['details', 'specialist', 'analysis.details', 'prescription.details'])
                            ->whereHas('customer', function($query) use ($id) {
                                $query->where('id', $id);
                            })
                            ->where('deleted_at', NULL)
                            ->orderBy('id', 'DESC')
                            ->get();
        // return $observaciones;
        return view('admin.customers.show', compact('customer', 'observaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {  
        return view('admin.customers.edit',compact('customer'));
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
      
        $customer = Customer::findOrFail($id);
         // Verificar si se hizo check para volver a la misma página
        $route = $request->return ? 'customers.edit' : 'customers.index';

        $response_json = $request->ajax ? 1 : 0;

        
        $request->validate([
            'name' => 'required|max:191',
            'last_name' => 'required|max:191',
            // 'phones' => 'required|max:191'
        ]);
         
        DB::beginTransaction();
        try {
            $customer->name = $request->name;
            $customer->last_name = $request->last_name;
            $customer->phones = $request->phones;
            $customer->address = $request->address;
            $customer->update();
            
            if($request->change_password){
                if($request->password){
                    if($request->new_password){
                        $credentials = $request->only('email', 'password');
                        if (Auth::attempt($credentials)) {
                            $customer->user->update([
                                'password'=> Hash::make($request['new_password'])
                            ]);
                        }else{
                            return response()->json(['error' => 'La contraseña actual es incorrecta.']);
                        }
                    }else{
                        return response()->json(['error' => 'Debes ingresar una nueva contraseña válida.']);
                    }
                }
                if($request->new_password && !$request->password){
                    return response()->json(['error' => 'Debes ingresar tu contraseña actual para validarla.']);
                }
            }elseif ($request->password) {
                $customer->user->update([
                    'password'=> Hash::make($request['password'])
                ]);
            }

            if($request->avatar) {
                 # codigo...
            }
            if($request->email) {
                $customer->user->update([
                    'email'=> $request['email']
                ]);
            }

            DB::commit();
            if($response_json){
                return response()->json(['success' => 'Información actualizada correctamente.']);
            }else{
                return redirect()->route($route)->with(['message' => 'Cliente actualizado exitosamente.', 'alert-type' => 'success']);
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

    public function update_avatar(Request $request){
        $avatar = (new LoginWeb)->save_image($request->avatar, 'users');
        if($avatar){
            $cliente = Customer::findOrFail($request->id);
            $cliente->user->update([
                'avatar' => $avatar
            ]);
            return response()->json(['avatar' => $avatar]);
        }
        return response()->json(['error' => 'Ocurrió un error inesperado al guardar la imagen.']);
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
