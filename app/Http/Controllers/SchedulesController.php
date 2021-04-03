<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Schedule;

class SchedulesController extends Controller
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
        //
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

    public function schedules_details($id){
        $horario = Schedule::find($id);
        
        $price_add = 0;
        $hora_inicio = setting('horarios.hora_inicio');
        $hora_fin = setting('horarios.hora_fin');

        // Verificar si está dentro del horario especial
        if(date('H') >= date('H', strtotime($hora_inicio)) || (date('H') > 0 && date('H') < date('H', strtotime($hora_fin))) || date('w') == 0){
            $price_add = setting('horarios.precio_adiciaonal');
        }
        return view('admin.schedules.partials.list_day', compact('horario', 'price_add'));
    }

    public function schedules_store(Request $request){
        try {
            $schedule = Schedule::firstOrNew([
                'day' => $request->day,
                'start' => $request->start,
                'end' => $request->end,
            ]);
            if (!$schedule->exists) {
                $schedule->fill([
                    'status' => 1
                ])->save();
            }
    
            return response()->json(['schedule' => $schedule]);
        } catch (\Throwable $th) {
            return null;
        }
    }
}
