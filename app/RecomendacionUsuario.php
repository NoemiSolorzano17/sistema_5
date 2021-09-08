<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecomendacionUsuario extends Model
{
    public $timestamps = false; 
    protected $table = 'recomendacionesusuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'estadoRecomendacionUsuario','porcentajeCumplimiento', 'fechaInicio','fechaFin','fecha',
        'codigoDocumento','recomendacion_id', 'users_id',
    ];


    public function Recomendaciones(){
        return $this->belongsTo('App\Recomendacion','recomendacion_id', 'id');
        }

        
    public function RecomendacionesV2(){
        return $this->hasOne('App\Recomendacion','id', 'recomendacion_id');                     
    }
        
    
    public function Usuarios(){
        return $this->belongsTo('App\Usuario','users_id', 'id');
        }

        
    public function UsuariosV2(){
        return $this->hasOne('App\Usuario','id', 'users_id');                      
    }

    
    public function Estrategias()
    {    
      return $this->hasMany('App\Estrategia','id');
    }
    
     
}
