<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inasistencia extends Model
{
    protected $table = 'insistencias';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'descripcionInsistencia','documento','codigoDocumento','recomendacionesusuarios_id',
    ];
    public function  RecomendacionUsuario(){
        return $this->belongsTo('App\RecomendacionUsuario','recomendacionesusuarios_id', 'id');
    }

    public function  Recousuarios(){
        return $this->hasOne('App\RecomendacionUsuario','id','recomendacionesusuarios_id');
    }

}
