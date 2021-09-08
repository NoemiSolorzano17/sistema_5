<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entregable extends Model
{
    protected $table = 'entregable';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'documento','descripcionDocumento','asunto','codigo','fechaCargo','tarea_id' 
    ];
     

    public function  Tareas(){
        return $this->belongsTo('App\Tarea','tarea_id', 'id');
          }
    
      public function TareasV2(){
        return $this->hasOne('App\Tarea','id','tarea_id');                      
        }

    }