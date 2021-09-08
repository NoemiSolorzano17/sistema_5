<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ Inasistencia;
use App\ RecomendacionUsuario;

class Inasistencias extends Controller
{
    public function index()
    {
    $recousuarios= RecomendacionUsuario::with('Inacistencia')->get();
    $inasistencia= Inasistencia::with('RecomendacionUsuario')->get();
    return view('GestionInasistencia.inasistencia')->with(['inasistencia'=>$inasistencia,'recousuarios'=>$recousuarios ]);
    }

public function store(Request $request)
    {
        $Varinasistencia= new Inasistencia();
        
      $Varinasistencia->descripcionInsistencia=$request->descripcionInsistencia;
      $Varinasistencia->documento= $request->documento;
       $Varinasistencia->codigoDocumento= $request->codigoDocumento; 
      $Varinasistencia->recomendacionesusuarios_id= $request->recomendacionesusuarios_id;     
      $Varinasistencia->save();

            
      $inasistenciasall=Inasistencia::with(['Recousuarios'])->find($Varinasistencia->id);
            return response()->json($inasistenciasall);
    }
    
    public function preparactualizarInasistencia($id){

        $inasistenciasall=Inasistencia::with(['Recousuarios'])->find($id);
           return response()->json($inasistenciasall);
    }
    public function listarInasistencia(){   
  
            $inasistenciasall=Inasistencia::with(['Recousuarios'])->get();
            return response()->json($inasistenciasall);
    }
    public function FiltrarInasistencia($id)
    {
        $inasistenciasall=Inasistencia::with(['Recousuarios'])->where('recomendacionesusuarios_id',$id )->get();
        return response()->json($inasistenciasall);    
    }

    public function edit($id)
    {       
        $recousuarios=RecomendacionUsuario::all();
        $inasistencia=Inasistencia::find($id);
        return view('GestionInasistencia.inasistencia')->with(['edit'=>true,'inasistencia'=>$inasistencia,'recousuarios'=>$recousuarios ]);
           
    }
    public function update(Request $request, $id)
    {
        $Varinasistencia=Inasistencia::find($id);
        
      $Varinasistencia->descripcionInsistencia=$request->descripcionInsistencia;
      $Varinasistencia->documento= $request->documento;
       $Varinasistencia->codigoDocumento= $request->codigoDocumento; 
      $Varinasistencia->recomendacionesusuarios_id= $request->recomendacionesusuarios_id;     
      $Varinasistencia->save();

            
      $inasistenciasall=Inasistencia::with(['Recousuarios'])->find($Varinasistencia->id);
            return response()->json($inasistenciasall);
        
    }
    public function destroy($id)
    {
        $inasistenciasall=Inasistencia::find($id);
        $inasistenciasall->delete();
    }


}
