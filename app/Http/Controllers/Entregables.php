<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entregable;
use App\Tarea;
use App\Estrategia;
use Storage;
class Entregables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $tareas=Tarea::with('Entregables')->get();  
     $entregables=Entregable::with('Tareas')->get();  
     return view('GestionEntregables.entregables')->with(['entregables'=>$entregables,
        'tareas'=>$tareas]);
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
        $entregableVar= new Entregable();
        /*
        $documento1=$request->file('documento');
        
        $file_route=time()."-".$documento1->getClientOriginalName();
        Storage::disk('docu')->put($file_route, file_get_contents( $documento1->getRealPath() ));
        $entregableVar->documento= $file_route;
*/
        $entregableVar->documento=$request->documento;
        $entregableVar->descripcionDocumento= $request->descripcionDocumento;
        $entregableVar->asunto= $request->asunto;      
        $entregableVar->codigo= $request->codigo;      
        $entregableVar->fechaCargo= $request->fechaCargo;
        $entregableVar->tarea_id = $request->tarea_id;
        $entregableVar->save();
        /*
        // agregar el porcentaje de la estrategia
        $objTareas = Tarea::find($request->tarea_id);
        $numTareas=Tarea::where('estrategia_id',$objTareas->estrategia_id)->count();
        $porc=(1*100)/$numTareas;
        $estrategia=Estrategia::find($objTareas->estrategia_id);

        // **********************
         */   
            $entregablesall=Entregable::with(['TareasV2'])->find($entregableVar->id);
            return response()->json($entregablesall);
    }

    public function Filtrar($id)
    {
        $entregablesall=Entregable::with(['TareasV2'])->where('tarea_id',$id )->get();
        return response()->json($entregablesall);    
    }

    
    public function preparactualizar($id){

        $entregablesall=Entregable::with(['TareasV2'])->find($id);
           return response()->json($entregablesall);
        }
    
        /*FUNCIÓN PARA MOSTRAR TODOS LOS TAREAS*/
       public function listarEntregables(){   
      
          $entregablesall=Entregable::with(['TareasV2'])->get();
            return response()->json($entregablesall);
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
        $entregableVar=Entregable::find($id);
        $entregableVar->documento= $request->documento;      
        $entregableVar->descripcionDocumento= $request->descripcionDocumento;
        $entregableVar->asunto= $request->asunto;      
        $entregableVar->codigo= $request->codigo;      
        $entregableVar->fechaCargo= $request->fechaCargo;
        //$entregableVar->tarea_id = $request->tarea_id;
        
           
           $entregableVar->save();
            
            $entregablesall=Entregable::with(['TareasV2'])->find($entregableVar->id);
            return response()->json($entregablesall);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entregablesall=Entregable::find($id);
        $entregablesall->delete();
    }
}
