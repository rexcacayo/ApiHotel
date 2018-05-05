<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Season;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
          $seasons = Season::all()->toArray();
          return response()->json(['status'=>true,'data'=>$seasons],200);
      }catch(\Exception $e){
          Log::critical('No se pudieron obtener los días feriados: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudieron obtener los días feriados: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
          $season = Season::find($id);
          if(!$season){
              return response()->json(['No existe una fecha de temporada alta con dicho id'], 404);
          }
          return response()->json(['status'=>true,'data'=>$season],200);
      }catch(\Exception $e){
          Log::critical('No se pudo obtener la fecha: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudo obtener la fecha: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
