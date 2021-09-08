<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cargo;
use App\Departamento;

class Cargos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos=Departamento::with('Cargos')->get();
        $cargos=Cargo::with('Departamentos')->get();
        return view('GestionCargos.Cargos')->with(['cargos'=>$cargos,'departamentos'=> $departamentos]);
    }

    
    public function  cargarCargos(){
        $cargos=Cargo::with('DepartamentosV2')->get();         
        return response()->json($cargos);
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
        $cargosVar = new Cargo();
        $cargosVar->descripcionCargo = $request->descripcionCargo;
        $cargosVar->departamento_id=$request->departamento_id;
        $cargosVar->save();

        $cargosall=Cargo::with(['DepartamentosV2'])->find($cargosVar->id);
          return response()->json($cargosall);
    }



    public function preparactualizarCargos($id){
        $cargosall=Cargo::with(['DepartamentosV2'])->find($id);
           return response()->json($cargosall);
        }
         /*FUNCIÓN PARA MOSTRAR TODOS LOS SUBTEMA*/
       public function listarCargos(){
       $cargosall=Cargo::with(['DepartamentosV2'])->get();
        return response()->json($cargosall);   
         
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
        $departamentos=Departamento::all();
        $cargos=Cargo::find($id);     
        return view('GestionCargos.Cargos')->with(['edit' => true,'cargos'=>$cargos,'departamentos'=> $departamentos]);
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
        $cargosVar =Cargo::find($id);
        $cargosVar->descripcionCargo = $request->descripcionCargo;
        //$cargosVar->departamento_id=$request->departamento_id;
        $cargosVar->save();

        $cargosall=Cargo::with(['DepartamentosV2'])->find($cargosVar->id);
          return response()->json($cargosall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargosVar=Cargo::find($id);
        $cargosVar->delete();
    }
}
