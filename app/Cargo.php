<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [  'descripcionCargo', 'departamento_id'];

    public function Departamentos (){
        return $this->belongsTo('App\Departamento','departamento_id', 'id');
    }
    
    public function DepartamentosV2 (){
        return $this->hasOne('App\Departamento','id', 'departamento_id');
    }


    public function  Cargouser(){
        return $this->hasMany('App\CargoUsuario','cargos_id', 'id');
        }

  
}
