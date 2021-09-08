<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public $timestamps = false; 
    protected $table = 'tarea';
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcionTarea','fechaCreacion','fechafinalizacion','estado',
        'estrategia_id',
    ];


   
    public function  RecomendacionesUsuarios(){
        return $this->belongsTo('App\RecomendacionUsuario', 'recomendacionesusuarios_id', 'id');
      }
  public function RecomendacionesUsuariosV2(){
    return $this->hasOne('App\RecomendacionUsuario','id', 'recomendacionesusuarios_id');                      
      }


  public function  Estrategias(){
    return $this->belongsTo('App\Estrategia', 'estrategia_id', 'id');
      }

  public function EstrategiaV2(){
    return $this->hasOne('App\Estrategia','id', 'estrategia_id');                      
    }

    public function  Entregables(){
        return $this->hasMany('App\Entregable','id');
    }
}
