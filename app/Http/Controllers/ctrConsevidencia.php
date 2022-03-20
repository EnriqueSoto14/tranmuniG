<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ctrConsevidencia extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function conservar()
    {
        $query="SELECT f.id,
                CONCAT('Foto',f.id) AS nombre_foto 
                FROM fotos f";
        $datosQ=DB::SELECT($query);
        $datosFotos = [];
        foreach ($datosQ as $datos) {
            $id = $datos->id;
            $nombreF = $datos->nombre_foto;
            array_push($datosFotos,[
                'id' => $id,
                'nomF' => $nombreF
            ]);
        }
        return view('conservar',compact('datosFotos'));
    }

    public function verFoto($id)
    {
        $idFoto = $id;
        
        return view('verF',compact('idFoto'));
    }

    public function traerFoto(Request $request)
    {
        if($request->ajax()){
            $id = $request->input('idP');
            $mensaje="";
            if (empty($id)) {
                $mensaje = "No existe el parámetro id en la URL";
            }
            $query = "SELECT foto FROM fotos WHERE id = $id";
            $datosQ = DB::SELECT($query);
            $foto = "";
            foreach ($datosQ as $datos) {
                $foto = $datos->foto;
            }
            if($foto == ''){
                $mensaje= "No se encontro ninguna foto.";
            }else{
                $mensaje= $foto;
            }
            
            return $mensaje;
        }
    }


 
}
