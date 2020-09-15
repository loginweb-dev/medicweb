<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Models
use App\AnalysisCustomer;
use App\AnalysisCustomerDetail;
use App\Customer;

// Events
use App\Events\OrderAnalysisNewEvent;

class AnalyisisCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response_json = $request->ajax ? 1 : 0;
        DB::beginTransaction();
        try {
            $orden_analisis = AnalysisCustomer::create([
                'customer_id' => $request->customer_id,
                'specialist_id' => $request->specialist_id,
                'appointment_id' => $request->appointment_id,
                'observations' => $request->observations,
            ]);
            for ($i=0; $i < count($request->analysi_id); $i++) { 
                AnalysisCustomerDetail::create([
                    'analysis_customer_id' => $orden_analisis->id,
                    'analysi_id' => $request->analysi_id[$i],
                ]);
            }
            
            DB::commit();

            // Eventos
            try {
                $customer = Customer::find($request->customer_id);
                $order_analysis = AnalysisCustomer::with(['specialist'])->where('id', $orden_analisis->id)->first();
                event(new OrderAnalysisNewEvent($order_analysis, $customer->user_id));
            } catch (\Throwable $th) {}

            if($response_json){
                return response()->json(['success' => 'Orden de laboratorio registrada correctamente.']);
            }else{
                // return redirect()->route('prescriptions.index')->with(['message' => 'Especialista agregado exitosamente.', 'alert-type' => 'success']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            if($response_json){
                return response()->json(['error' => 'Ocurrió un error inesperado.']);
            }else{
                // return redirect()->route('prescriptions.index')->with(['message' => 'Ocurrio un error al realizar el registro.', 'alert-type' => 'error']);
            }
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
