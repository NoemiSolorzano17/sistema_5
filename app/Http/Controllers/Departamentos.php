<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
class Departamentos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento=Departamento::all();
        return view ('GestionDepartamento.Departamentos')->with(['departamento'=>$departamento]);
    }


    public function  cargarDepartamento(){
        $departamento=Departamento::all();
         return response()->json($departamento);
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
        $departamentoVar= new Departamento();
        $departamentoVar->descripcionDepartamento = $request->descripcionDepartamento;
            
            if ($departamentoVar->save()) {
                
                 return response()->json($departamentoVar);
            }else{
                return back()->with('errormsj', '¡Error al guardar los datos!');
    
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
        $departamento=Departamento::find($id);
        return response()->json($departamento);
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
        $departamentoVar=Departamento::find($id);
        $departamentoVar->descripcionDepartamento = $request->descripcionDepartamento;
        $departamentoVar->save();
        return response()->json($departamentoVar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento=Departamento::find($id);
        $departamento->delete();
    }
}
