<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Model
use App\User;
use App\Customer;
use App\Speciality;

class ApiController extends Controller
{

    // Auth

    public function login(Request $request){
        $user = null;
        $token = null;

        if($request->social_login){
            $user = User::with('customer')->where('email', $request->email)->first() ?? $this->newCustomer($request);
            $token = $user->createToken('livemedic')->accessToken;
        }else{
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::attempt($credentials)) {
                $auth = Auth::user();
                $token = $auth->createToken('livemedic')->accessToken;
                $user = User::with('customer')->where('id', $auth->id)->first();
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

    public function newCustomer($data){
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'avatar' => $data->avatar,
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
