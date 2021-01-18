<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Model
use App\Speciality;
use App\Customer;
use App\Appointment;
use App\Prescription;
use App\AnalysisCustomer;
use App\AppointmentsRating;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $especialidades = Speciality::with(['specialists:specialist_id'])->where('deleted_at', null)->get();
        // Verificar si la cita médica ya fue puntuada
        $meet_id = null;
        if(request('id')){
            $meet_id = AppointmentsRating::where('appointment_id', $meet_id)->first() ? null : request('id');
        }
        
        $intent = '';

        if(Auth::user()->role_id == 2){
            return view('dashboard.index', compact('especialidades', 'meet_id', 'intent'));
        }else{
            return redirect('admin/profile');
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

    public function appointments(){
        $citas = Appointment::whereHas('customer.user', function($query) {
                    $query->where('id', Auth::user()->id);
                })
                ->with(['specialist.user', 'customer', 'tracking'])
                ->where('deleted_at', NULL)
                ->get();
        return view('dashboard.partials.appointments_list', compact('citas'));
    }

    public function prescriptions(){
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $recetas = Prescription::with(['specialist.user', 'details'])
                    ->where('deleted_at', NULL)->where('customer_id', $customer->id)
                    ->orderBy('created_at', 'DESC')->get();
        return view('dashboard.partials.prescriptions_list', compact('recetas'));
    }

    public function prescriptions_details_pdf($id, $type = null){
        $receta = Prescription::with(['specialist.specialities', 'details', 'customer'])
                    ->where('deleted_at', NULL)->where('id', $id)
                    ->orderBy('created_at', 'DESC')->first();
        $vista = view('dashboard.pdf.prescriptions_details', compact('receta'));
        // return $vista;
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista)->setPaper('letter');
        $pdf->loadHTML($vista);
        if ($type) {
            return $pdf->download('Receta '.date('d-m-Y', strtotime($receta->created_at)));
        }else{
            return $pdf->stream();
        }
    }

    public function order_analysis(){
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $analisis = AnalysisCustomer::with(['specialist.user'])
                    ->where('deleted_at', NULL)->where('customer_id', $customer->id)
                    ->orderBy('created_at', 'DESC')->get();
        return view('dashboard.partials.order_analysis_list', compact('analisis'));
    }

    public function order_analysis_details_pdf($id, $type = null){
        $orden_analisis = AnalysisCustomer::with(['specialist.user', 'details', 'customer'])
                        ->where('deleted_at', NULL)->where('id', $id)
                        ->orderBy('created_at', 'DESC')->first();
        $vista = view('dashboard.pdf.order_analysis_details', compact('orden_analisis'));
        // return $vista;
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista)->setPaper('letter');
        $pdf->loadHTML($vista);
        if ($type) {
            return $pdf->download('Orden de analisis '.date('d-m-Y', strtotime($orden_analisis->created_at)));
        }else{
            return $pdf->stream();
        }
    }

    public function checkout(Request $request){
        \Stripe\Stripe::setApiKey(env('STRIPE_PRIVATE_KEY'));

        try {

            $amount = $request->amount;
            $amount *= 100;
            $amount = (int) $amount;
        
            $payment_intent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'USD',
                'description' => 'Sesión de telemedicina - LiveMedic Edgley',
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;

            return response()->json(["intent" => $intent]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th]);
        }
    }

    public function prescription_validate($id){
        $receta = Prescription::with(['specialist.specialities', 'details', 'customer'])
                    ->where('deleted_at', NULL)->where('id', $id)
                    ->orderBy('created_at', 'DESC')->first();
        return view('admin.appointments.validation.prescription', compact('receta'));
    }

    public function analysis_validate($id){
        $orden_analisis = AnalysisCustomer::with(['specialist.user', 'details', 'customer'])
                        ->where('deleted_at', NULL)->where('id', $id)
                        ->orderBy('created_at', 'DESC')->first();
        return view('admin.appointments.validation.analysis', compact('orden_analisis'));
    }
}
