<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Model
use App\Speciality;
use App\Customer;

class HomeController extends Controller
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
    public function index()
    {
        $especialidades = Speciality::with(['specialists:specialist_id'])->where('deleted_at', null)->get();
        // dd($especialidades);
        if(Auth::user()->role_id == 2){
            return view('dashboard.index', compact('especialidades'));
        }else{
            return redirect('admin');
        }
    }

    public function profile()
    {
        $cliente = Customer::with(['user'])
                            ->whereHas('user', function($query) {
                                $query->where('id', Auth::user()->id);
                            })
                            ->first();
        // dd($cliente);
        return view('dashboard.profile', compact('cliente'));
    }
}
