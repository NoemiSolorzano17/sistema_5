<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Departamento;
use App\TipoUsuario;

class Usuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos=Departamento::with('Usuario')->get();
        $tipoUsuario=TipoUsuario::with('Usuario')->get();
        $User=Usuario::with('TipoUsuario','Departamentos')->get();
        return view('GestionUsuario.usuario')->with(['User'=>$User,'tipoUsuario'=> $tipoUsuario,
        'departamentos'=> $departamentos]);
    }

    public function  cargarUsuario(){
        $User=Usuario::with('TipoUsuariov2')->get();         
        return response()->json($User);
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
        $UseVar = new Usuario();
        $UseVar->name= $request->name;
        $UseVar->apellidos= $request->apellidos;
        $UseVar->cedula= $request->cedula;
        $UseVar->sexo= $request->sexo;
        $UseVar->celular= $request->celular;
        $UseVar->email= $request->email;
        $UseVar->password= bcrypt($request->password);
        $UseVar->estado="Activo";
        $UseVar->tipousuario_id= $request->tipousuario_id;
        $UseVar->departamento_id= $request->departamento_id;

         
        $UseVar->save();

         $usuarioall=Usuario::with(['TipoUsuariov2','DepartamentosV2'])->find($UseVar->id);
           return response()->json($usuarioall);
    }


    public function preparactualizarusuario($id){
     $usuarioall=Usuario::with(['TipoUsuariov2','DepartamentosV2'])->find($id);
        return response()->json($usuarioall);
     }
      /*FUNCIÓN PARA MOSTRAR TODOS LOS SUBTEMA*/
    public function listausuario(){
    $usuarioall=Usuario::with(['TipoUsuariov2','DepartamentosV2'])->where ('estado','Activo')->get();
         return response()->json($usuarioall);   
      
      }
      
    public function edit($id)
    {
        $tipoUsuario=TipoUsuario::all();
        $User=Usuario::find($id);     
        return view('GestionUsuario.usuario')->with(['User'=>$User,'tipoUsuario'=> $tipoUsuario,
        'departamentos'=> $departamentos]);    
    
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
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $UseVar = Usuario::find($id);
           $UseVar->name= $request->name;
           $UseVar->apellidos= $request->apellidos;
           $UseVar->cedula= $request->cedula;
           $UseVar->sexo= $request->sexo;
           $UseVar->celular= $request->celular;
           $UseVar->email= $request->email;
           $UseVar->password= bcrypt($request->password);
          // $UseVar->tipousuario_id= $request->tipousuario_id;
           //$UseVar->departamento_id= $request->departamento_id;
           $UseVar->save();
            
            $usuarioall=Usuario::with(['TipoUsuariov2','DepartamentosV2'])->find($UseVar->id);
              return response()->json($usuarioall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarusuario($id){
        $UseVar=Usuario::find($id);
        $UseVar->estado="Inactivo";
       $UseVar->save();
        return response()->json($UseVar);
      }

  public function destroy($id)
   {     $User=Usuario::find($id);
        $User->delete();
    }

  public function vergeneral(){
      return view('Gestiongeneral.general');
  }


////me consulta las recomendaciones asignadas por usuarios
  public function MisRecomendaciones($id){

    $consulta=Usuario:: with('RecomendacionesUsuarios')->where('id',$id)->firstOrFail();
    //dd($consulta);
    return response()->json($consulta);
   }

}
