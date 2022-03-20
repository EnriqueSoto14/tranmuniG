<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_personal extends Model
{
    protected $fillable=['id','id_departamento','nombre','apellido_paterno','apellido_materno','colonia','calle','numero','cp','RFC','email','telefono'];

}