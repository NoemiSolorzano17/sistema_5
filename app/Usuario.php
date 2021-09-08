<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps=false;

    protected $fillable = [
        'name', 'apellidos','cedula','sexo','celular', 'email','password','estado','tipousuario_id','departamento_id',
    
    ];

   public function TipoUsuario (){
        return $this->belongsTo('App\TipoUsuario','tipousuario_id', 'id');
    }
    
    public function TipoUsuariov2 (){
        return $this->hasOne('App\TipoUsuario','id', 'tipousuario_id');
    }


    public function Departamentos(){
        return $this->belongsTo('App\Departamento','departamento_id', 'id');
    }
    
    public function DepartamentosV2(){
        return $this->hasOne('App\Departamento','id', 'departamento_id');
    }


    public function  Cargouser(){
        return $this->hasMany('App\CargoUsuario','users_id','id');
     }
//me consulta las recomendaciones asignadas por usuarios
     public function  RecomendacionesUsuarios(){
        return $this->hasMany('App\RecomendacionUsuario','users_id','id')->with('RecomendacionesV2');
     }
}
