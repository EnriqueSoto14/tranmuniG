<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\tb_personal;
use App\tb_actividades;
use App\tb_avisos;
use App\tb_documentos;
use Illuminate\Support\Facades\Hash;
use DB;
use PDF;
use Response;
use Illuminate\Support\Facades\Storage;
class ctrEstadisticos extends Controller{
		public function Graficos(Request $request, $id_rol){
			      $userNombre = '';
			      $msj = "";
        try{
            $userNombre = auth()->user()->name;
        }catch(\Exception $e){
            $msj = "";
            if ($userNombre != ''){
                $msj = "";
            }else{
                $msj = "¡Su sesión a expirado, ingresa de nuevo!";
                return view('/auth/login',compact('msj'));
            }
        }

			return view('EstadisticosDesarrollo',compact('msj','id_rol'));
		}


		public function AjaxEstadisticos(Request $request){
				$userNombre = '';
		        try{
		            $userNombre = auth()->user()->name;
		        }catch(\Exception $e){
		            $msj = "";
		            if ($userNombre != ''){
		                $msj = "";
		            }else{
		                $msj = "¡Su sesión a expirado, ingresa de nuevo!";
		                return view('/auth/login',compact('msj'));
		            }
		        }
        		$iniciado="";
        		$proceso="";
        		$finalizado="";
		        if($request->ajax()){
		        			$id_ROL_area = $request->input('Nombre');

				        	$datosA = [];
				        $query1="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=".$id_ROL_area;
				            $datosQ = DB::SELECT($query1);
				       
				         foreach ($datosQ as $datos) {
				            $iniciado= $datos->estado;  
				       }
				       $query2="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=".$id_ROL_area;
				            $datosQ2 = DB::SELECT($query2);
				       
				         foreach ($datosQ2 as $datos) {
				            $proceso= $datos->estado;  
				       }
				       $query3="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=".$id_ROL_area;
				            $datosQ3 = DB::SELECT($query3);
				       
				         foreach ($datosQ3 as $datos) {
				            $finalizado= $datos->estado;  
				       }

				        array_push($datosA, [
				                'iniciado' => $iniciado,
				                'proceso' => $proceso,
				                'finalizado' => $finalizado,
				                
				            ]);
				    
				    return $datosA;  

		        }
		}

}