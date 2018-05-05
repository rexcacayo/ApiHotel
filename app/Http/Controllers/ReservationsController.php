<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Reservation;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
          $reservations = Reservation::all()->toArray();
          return response()->json(['status'=>true,'data'=>$reservations],200);
      }catch(\Exception $e){
          Log::critical('No se pudieron obtener las reservaciones: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudieron obtener las reservaciones: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
      }
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
      try{
          $reservation = new Reservation([
              'nombre' => $request->input('nombre'),
              'comentarios' => $request->input('comentarios'),
              'fecha_entrada' => $request->input('fecha_entrada'),
              'fecha_salida' => $request->input('fecha_salida'),
              'precio' => $request->input('precio'),
              'room_id' => $request->input('room_id'),
          ]);
          $reservation->save();
          return response()->json(['status'=>true,'data'=>'ok'],200);
      }catch(\Exception $e){
          Log::critical('No se pudo crear el empleado: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudo crear el empleado: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
      try{
          $reservation = Reservation::find($id);
          if(!$reservation){
              return response()->json(['No existe una reservación con dicho id'], 404);
          }
          return response()->json(['status'=>true,'data'=>$reservation],200);
      }catch(\Exception $e){
          Log::critical('No se pudo obtener la reservación: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudo obtener la reservación: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
      }
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
