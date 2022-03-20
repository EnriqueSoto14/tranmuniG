<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_documentos extends Model
{
    protected $fillable=['id_subio','id_departamento','id_actividad','nombre_doc','ruta_doc'];

}