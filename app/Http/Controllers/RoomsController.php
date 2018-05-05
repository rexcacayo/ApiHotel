<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Room;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
          $rooms = Room::with('extras')
          ->get();
          Log::critical($rooms);
          return response()->json(['status'=>true,'data'=>$rooms],200);
      }catch(\Exception $e){
          Log::critical('No se pudieron obtener las habitaciones: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudieron obtener las habitaciones: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
      try{
          $room = Room::with('extras')->find($id);
          if(!$room){
              return response()->json(['No existe una habitación con dicho id'], 404);
          }
          return response()->json(['status'=>true,'data'=>$room],200);
      }catch(\Exception $e){
          Log::critical('No se pudo obtener la habitación: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudo obtener la habitación: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
