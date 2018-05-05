<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Extra;

class ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try{
          $extras = Extra::all()->toArray();
          Log::critical($extras);
          return response()->json(['status'=>true,'data'=>$extras],200);
      }catch(\Exception $e){
          Log::critical('No se pudieron obtener los extras: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudieron obtener los extras: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
          $extra = Extra::with('extras')->find($id);
          if(!$extra){
              return response()->json(['No existe un extra con dicho id'], 404);
          }
          return response()->json(['status'=>true,'data'=>$extra],200);
      }catch(\Exception $e){
          Log::critical('No se pudo obtener el extra: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage());
          return response('No se pudo obtener el extra: ' . $e->getCode() . ', ' . $e->getLine() . ', ' . $e->getMessage(), 500);
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
