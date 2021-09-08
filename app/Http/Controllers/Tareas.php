<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarea;
use App\Estrategia;
class Tareas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas= Tarea::with('Estrategias')->get();
        $estrategias=Estrategia::with('Tareas')->get();
        return view('GestionTareas.tareas')->with(['tareas'=>$tareas,'estrategias'=>$estrategias]);
   
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
        $tareaVar= new Tarea();
        $tareaVar->descripcionTarea= $request->descripcionTarea;  
        $tareaVar->fechaCreacion= $request->fechaCreacion;      
        $tareaVar->fechafinalizacion= $request->fechafinalizacion;
        $tareaVar->estado = $request->estado;
        $tareaVar->estrategia_id = $request->estrategia_id;
        
           $tareaVar->save();
            
            $tareaall=Tarea::with(['EstrategiaV2'])->find($tareaVar->id);
            return response()->json($tareaall);
    }

    public function FiltrarTareas($id)
    {
        $tareaall=Tarea::with(['EstrategiaV2'])->where('estrategia_id',$id )->get();
        return response()->json($tareaall);    
    }

    
    public function preparactualizar($id){

        $tareaall=Tarea::with(['EstrategiaV2'])->find($id);
           return response()->json($tareaall);
        }
    
        /*FUNCIÓN PARA MOSTRAR TODOS LOS TAREAS*/
       public function listarTarea(){   
      
          $tareaall=Tarea::with(['EstrategiaV2'])->get();
            return response()->json($tareaall);
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
        $tarea = Tarea::all();
        $estrategias=Estrategia::find($id);
  
        return view('GestionTareas.tareas')->with(['edit' => true,'tarea' =>$tarea,
        'estrategias'=>$estrategias]);
    
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
        $tareaVar=Tarea::find($id);
        $tareaVar->descripcionTarea= $request->descripcionTarea;      
        $tareaVar->fechaCreacion= $request->fechaCreacion;      
        $tareaVar->fechafinalizacion= $request->fechafinalizacion;
        //$tareaVar->estado = $request->estado;
       // $tareaVar->estrategia_id = $request->estrategia_id;
        
           
           $tareaVar->save();
            
            $tareaall=Tarea::with(['EstrategiaV2'])->find($tareaVar->id);
            return response()->json($tareaall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tareaall =Tarea::find($id);
        $tareaall->delete();
    }
}
