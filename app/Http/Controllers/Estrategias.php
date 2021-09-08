<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estrategia;
use App\RecomendacionUsuario;
class Estrategias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $recousuarios= RecomendacionUsuario::with('Estrategias')->get();
    $estrategia= Estrategia::with('Recousuarios')->get();
    return view('GestionEstrategia.estrategias')->with(['estrategia'=>$estrategia,'recousuarios'=>$recousuarios ]);
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
        $estrategiaVar= new Estrategia();
        $estrategiaVar->descripcionEstrategia= $request->descripcionEstrategia;
        $estrategiaVar->fechaCreacion= $request->fechaCreacion;
        $estrategiaVar->porcentajecumplido="0";
        $estrategiaVar->fecha= $request->fecha;
        $estrategiaVar->estado="Sin asignar"; 
        $estrategiaVar->Observacion=NULL;           
        $estrategiaVar->recomendacionesusuarios_id= $request->recomendacionesusuarios_id;
        $estrategiaVar->save();
        $estrategiaall=Estrategia::with(['RecousuariosV2'])->find($estrategiaVar->id);
        return response()->json($estrategiaall);
           

    }


    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



/*FUNCIÓN PARA BUSCAR EL ACTIVIDAD A ACTUALIZAR */
public function preparactualizarEstrategia($id){

    $estrategiaall=Estrategia::with(['RecousuariosV2'])->find($id);
       return response()->json($estrategiaall);
    }

    /*FUNCIÓN PARA MOSTRAR TODOS LOS TAREAS*/
   public function listarEstrategias(){   
  
    $estrategiaall=Estrategia::with(['RecousuariosV2'])->get();
    return response()->json($estrategiaall);
    }



    public function FiltrarEstrategias($id)
    {
        $estrategiaall=Estrategia::with(['RecousuariosV2'])->where('recomendacionesusuarios_id',$id )->get();
        return response()->json($estrategiaall);    
    }

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
        $recousuarios=RecomendacionUsuario::all();
        $estrategias=Estrategia::find($id);
        return view('GestionEstrategia.estrategias')->with(['edit'=>true,'estrategia'=>$estrategia,
        'recousuarios'=>$recousuarios ]);
           
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
        $estrategiaVar=Estrategia::find($id);
        $estrategiaVar->descripcionEstrategia= $request->descripcionEstrategia;
        $estrategiaVar->fechaCreacion= $request->fechaCreacion;
        $estrategiaVar->porcentajecumplido="0";
        $estrategiaVar->fecha= $request->fecha;
        $estrategiaVar->estado="Sin asignar"; 
        //$estrategiaVar->Observacion=NULL;            
        //$estrategiaVar->recomendacionesusuarios_id= $request->recomendacionesusuarios_id;
        
        
        if ($estrategiaVar->save()) {
            $estrategiaall=Estrategia::with(['RecousuariosV2'])->find($estrategiaVar->id);
              return response()->json($estrategiaall);
    
            }else{
                return back()->with('errormsj', '¡Error al guardar los datos!');
    
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estrategiaall=Estrategia::find($id);
        $estrategiaall->delete();
    }
}
