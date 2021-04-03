<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Controllers
use App\Http\Controllers\AppointmentsController as Appointments;

// Model
use App\User;
use App\Customer;
use App\Speciality;
use App\PaymentAccount;
use App\Appointment;
use App\Specialist;
use App\Service;

class ApiController extends Controller
{

    // Auth

    public function login(Request $request){
        $user = null;
        $token = null;

        if($request->social_login){
            $user = User::with('customer')->where('email', $request->email)->first() ?? $this->newCustomer($request);
            $token = $user->createToken('livemedic')->accessToken;

            // Actualizar token de firebase
            if($request->firebase_token){
                User::where('id', $user->id)->update([
                    'firebase_token' => $request->firebase_token
                ]);
            }
        }else{
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($credentials)) {
                $auth = Auth::user();
                $token = $auth->createToken('livemedic')->accessToken;
                $user = User::with('customer')->where('id', $auth->id)->first();

                // Actualizar token de firebase
                if($request->firebase_token){
                    $user_update = User::find($user->id);
                    $user_update->firebase_token = $request->firebase_token;
                    $user_update->save();
                }
            }
        }

        if($user && $token){
            return response()->json(['user' => $user, 'token' => $token]);
        }else{
            return response()->json(['error' => "credentials don't exist"]);
        }
    }

    public function register(Request $request){
        
            $user = $this->newCustomer($request);
            if(!$user){
                return response()->json(['error' => "email exist"]);
            }
            $token = $user->createToken('livemedic')->accessToken;
            
            if($user && $token){
                return response()->json(['user' => $user, 'token' => $token]);
            }else{
                return response()->json(['error' => "registration failed"]);
            }
        
    }
    
    public function index(){
        $specialities = Speciality::with(['specialists.user', 'specialists.appointments.rating', 'specialists.schedules'])->where('deleted_at', null)->get();

        $price_add = 0;
        $hora_inicio = setting('horarios.hora_inicio');
        $hora_fin = setting('horarios.hora_fin');

        // Verificar si está dentro del horario especial
        if(date('H') >= date('H', strtotime($hora_inicio)) || (date('H') > 0 && date('H') < date('H', strtotime($hora_fin))) || date('w') == 0){
            $price_add = setting('horarios.precio_adiciaonal');
        }
        return response()->json(['specialities' => $specialities, 'price_add' => $price_add]);
    }

    public function historial($customer_id){
        $appointments = Appointment::with(['customer', 'specialist.user', 'details', 'analysis.details.analysis.type', 'prescription.details'])
                            ->where('customer_id', $customer_id)
                            ->orderBy('id', 'DESC')
                            ->get();
        return response()->json(['appointments' => $appointments]);
    }

    public function validate_appointment($id, Request $request){
        $dia = $request->day;
        $hora = $request->start;

        $fecha = date('Y-m-d');
        $dia_actual = date('N');

        // Buscar la fecha más próxima al día seleccionado
        if($dia != $dia_actual){
            $cont = 0;
            while ($cont < 7) {
                $fecha = date('Y-m-d', strtotime($fecha."+ 1 days"));
                if(date('N', strtotime($fecha)) == $dia){
                    break;
                }
                $cont++;
            }
        }

        $especialista = Specialist::with(['schedules' => function($q) use($dia){
            return $q->where('day',$dia);
        }])->where('id', $id)->first();

        // Verificar si el especialista atiende en ese rango de tiempo
        $disponible = 0;
        foreach ($especialista->schedules as $schedul) {
            if(substr($schedul->start, 0, -3) <= $hora && substr($schedul->end, 0, -3) >= $hora){
                $disponible = 1;
            }
        }

        if($disponible){
            // Todas la citas del día
            $citas_pendientes = Appointment::where('status', 'Pendiente')
                                ->where('date', $fecha)->where('specialist_id', $id)->get();

            $cita_actual = Appointment::where('status', 'Pendiente')
                                ->where('date', $fecha)->where('start', $hora)->where('specialist_id', $id)->get();

            if(count($cita_actual)){
                return response()->json(['error' => 'El horario seleccionado ya se encuentra reservado para otra consulta médica, por favor elija otro horario.', 'appointments_queue' => $citas_pendientes]);
            }else{

                $price_add = 0;
                $hora_inicio = setting('horarios.hora_inicio');
                $hora_fin = setting('horarios.hora_fin');

                // Verificar si está dentro del horario especial
                if(date('H', strtotime($hora)) >= date('H', strtotime($hora_inicio)) || (date('H', strtotime($hora)) > 0 && date('H', strtotime($hora)) < date('H', strtotime($hora_fin))) || date('w', strtotime($fecha)) == 0){
                    $price_add = setting('horarios.precio_adiciaonal');
                }

                return response()->json(['success' => 'disponible', 'date' => $fecha, 'price_add' => $price_add]);
            }

        }else{
            $especialista = Specialist::with(['schedules'])->where('id', $id)->first();
            return response()->json(['error' => 'Lo sentimos, el/la '.$especialista->full_name.' no realiza atención médica el día seleccionado, por favor elija otro día.']);
        }

    }

    public function appointment_store(Request $request){
        $res = (new Appointments)->store($request);
        return $res;
    }

    public function get_last_appointment_active($customer_id){
        $appointment = Appointment::with('specialist.user')->where('customer_id', $customer_id)->where('status', 'En curso')->orderBy('id', 'DESC')->first();
        $server = 'https://'.setting('server-streaming.url_server');
        return response()->json(['appointment' => $appointment, 'server' => $server]);
    }

    // Metodos functionales
    public function payment_accounts_index(){
        $payment_accounts = PaymentAccount::all();
        return response()->json(['paymentAccounts' => $payment_accounts]);
    }

    public function services_index(){
        $services = Service::where('deleted_at', NULL)->get();
        return response()->json(['services' => $services]);
    }

    public function newCustomer($data){
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'avatar' => $data->avatar,
                'firebase_token' => $data->firebase_token
            ]);

            $customer = Customer::create([
                'name' => $data->name,
                'last_name' => $data->last_name,
                'phones' => $data->phones,
                'address' => $data->address,
                'user_id' => $user->id,
            ]);

            DB::commit();

            return User::with('customer')->where('id', $user->id)->first();

        } catch (\Throwable $th) {
            DB::rollback();
            return null;
        }
    }
}
