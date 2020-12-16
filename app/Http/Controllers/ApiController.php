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
        $specialities = Speciality::with(['specialists.user', 'specialists.appointments.rating'])->where('deleted_at', null)->get();
        return response()->json(['specialities' => $specialities]);
    }

    public function historial($customer_id){
        $appointments = Appointment::with(['customer', 'specialist.user', 'details', 'analysis.details.analysis.type', 'prescription.details'])
                            ->where('customer_id', $customer_id)
                            ->orderBy('id', 'DESC')
                            ->get();
        return response()->json(['appointments' => $appointments]);
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
