<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_avisos extends Model
{
    protected $fillable=['id','titulo_aviso','aviso','fecha_publi','ruta_archivo','id_user_publica'];

}