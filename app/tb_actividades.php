<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_actividades extends Model
{
    protected $fillable=['id','id_personal','id_departamento','actividad','fecha_inicio','fecha_fin','recursos','conclusiones','estatus'];

}