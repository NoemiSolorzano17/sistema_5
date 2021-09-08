<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    
    public $timestamps=false;

    protected $fillable=['descripcionDepartamento'];


    public function  Cargos(){
        return $this->hasMany('App\Cargo','departamento_id', 'id');
    }


    public function  Usuario(){
        return $this->hasMany('App\Usuario','departamento_id', 'id');
    }
}
