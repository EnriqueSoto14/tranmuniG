<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
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
    public function index()
    {
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

        $rol_session = auth()->user()->ID_ROL_LLAVE_FK;
         $query="SELECT a.titulo_aviso,a.aviso,date_format(a.fecha_publi,'%Y-%m-%d') AS FECHA, a.ruta_archivo,a.created_at,u.name
                    FROM tb_avisos a
                    LEFT JOIN users u ON u.id=a.id_user_publica
                    LEFT JOIN roles r ON r.ID_ROL = u.ID_ROL_LLAVE_FK
                    WHERE r.ID_ROL = $rol_session or a.id_user_publica = 4
                  ";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            foreach ($datosQ as $datos) {
                $aviso  = $datos->aviso;
                $titulo_aviso  = $datos->titulo_aviso;
                $fecha_publi = $datos->FECHA;
                $nombre = $datos->name;
                $ruta_archivo = $datos->ruta_archivo;
                $created_at = $datos->created_at;
                array_push($objDatos, [
                    'aviso' => $aviso,
                    'titulo_aviso' => $titulo_aviso,
                    'fecha_publi' => $fecha_publi,
                    'nombre' => $nombre,
                    'ruta_archivo' => $ruta_archivo,
                    'created_at' => $created_at,
                  ]);
            }
        return view('home',compact('objDatos'));
    }

   public function ActualizaGrafica(Request $request)
    {
        $id_ROL_area = auth()->user()->ID_ROL_LLAVE_FK;
        $datosA = [];
        $iniciado='';
        $proceso='';
        $finalizado='';

        if($id_ROL_area==1 || $id_ROL_area==2){



        $query1="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=3";
            $datosQ = DB::SELECT($query1);

         foreach ($datosQ as $datos) {
            $iniciado3= $datos->estado;
       }
       $query2="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=3";
            $datosQ2 = DB::SELECT($query2);

         foreach ($datosQ2 as $datos) {
            $proceso3= $datos->estado;
       }
       $query3="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=3";
            $datosQ3 = DB::SELECT($query3);

         foreach ($datosQ3 as $datos) {
            $finalizado3= $datos->estado;
       }
        $query4="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=4";
            $datosQ = DB::SELECT($query4);

         foreach ($datosQ as $datos) {
            $iniciado4= $datos->estado;
       }
       $query5="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=4";
            $datosQ2 = DB::SELECT($query5);

         foreach ($datosQ2 as $datos) {
            $proceso4= $datos->estado;
       }
       $query6="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=4";
            $datosQ3 = DB::SELECT($query6);

         foreach ($datosQ3 as $datos) {
            $finalizado4= $datos->estado;
       }
        $query7="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=5";
            $datosQ = DB::SELECT($query7);

         foreach ($datosQ as $datos) {
            $iniciado5= $datos->estado;
       }
       $query8="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=5";
            $datosQ2 = DB::SELECT($query8);

         foreach ($datosQ2 as $datos) {
            $proceso5= $datos->estado;
       }
       $query9="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=5";
            $datosQ3 = DB::SELECT($query9);

         foreach ($datosQ3 as $datos) {
            $finalizado5= $datos->estado;
       }
           $query10="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=6";
            $datosQ = DB::SELECT($query10);

         foreach ($datosQ as $datos) {
            $iniciado6= $datos->estado;
       }
       $query11="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=6";
            $datosQ2 = DB::SELECT($query11);

         foreach ($datosQ2 as $datos) {
            $proceso6= $datos->estado;
       }
       $query12="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=6";
            $datosQ3 = DB::SELECT($query12);

         foreach ($datosQ3 as $datos) {
            $finalizado6= $datos->estado;
       }
           $query13="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=7";
            $datosQ = DB::SELECT($query13);

         foreach ($datosQ as $datos) {
            $iniciado7= $datos->estado;
       }
       $query14="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=7";
            $datosQ2 = DB::SELECT($query14);

         foreach ($datosQ2 as $datos) {
            $proceso7= $datos->estado;
       }
       $query15="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=7";
            $datosQ3 = DB::SELECT($query15);

         foreach ($datosQ3 as $datos) {
            $finalizado7= $datos->estado;
       }
           $query16="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=8";
            $datosQ = DB::SELECT($query16);

         foreach ($datosQ as $datos) {
            $iniciado8= $datos->estado;
       }
       $query17="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=8";
            $datosQ2 = DB::SELECT($query17);

         foreach ($datosQ2 as $datos) {
            $proceso8= $datos->estado;
       }
       $query18="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=8";
            $datosQ3 = DB::SELECT($query18);

         foreach ($datosQ3 as $datos) {
            $finalizado8= $datos->estado;
       }
           $query19="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=9";
            $datosQ = DB::SELECT($query19);

         foreach ($datosQ as $datos) {
            $iniciado9= $datos->estado;
       }
       $query20="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=9";
            $datosQ2 = DB::SELECT($query20);

         foreach ($datosQ2 as $datos) {
            $proceso9= $datos->estado;
       }
       $query21="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=9";
            $datosQ3 = DB::SELECT($query21);

         foreach ($datosQ3 as $datos) {
            $finalizado9= $datos->estado;
       }
           $query22="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=10";
            $datosQ = DB::SELECT($query22);

         foreach ($datosQ as $datos) {
            $iniciado10= $datos->estado;
       }
       $query23="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=10";
            $datosQ2 = DB::SELECT($query23);

         foreach ($datosQ2 as $datos) {
            $proceso10= $datos->estado;
       }
       $query24="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=10";
            $datosQ3 = DB::SELECT($query24);

         foreach ($datosQ3 as $datos) {
            $finalizado10= $datos->estado;
       }
           $query25="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=11";
            $datosQ = DB::SELECT($query25);

         foreach ($datosQ as $datos) {
            $iniciado11= $datos->estado;
       }
       $query26="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=11";
            $datosQ2 = DB::SELECT($query26);

         foreach ($datosQ2 as $datos) {
            $proceso11= $datos->estado;
       }
       $query27="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=11";
            $datosQ3 = DB::SELECT($query27);

         foreach ($datosQ3 as $datos) {
            $finalizado11= $datos->estado;
       }
           $query28="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=12";
            $datosQ = DB::SELECT($query28);

         foreach ($datosQ as $datos) {
            $iniciado12= $datos->estado;
       }
       $query29="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=12";
            $datosQ2 = DB::SELECT($query29);

         foreach ($datosQ2 as $datos) {
            $proceso12= $datos->estado;
       }
       $query30="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=12";
            $datosQ3 = DB::SELECT($query30);

         foreach ($datosQ3 as $datos) {
            $finalizado12= $datos->estado;
       }
           $query31="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=13";
            $datosQ = DB::SELECT($query31);

         foreach ($datosQ as $datos) {
            $iniciado13= $datos->estado;
       }
       $query32="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=13";
            $datosQ2 = DB::SELECT($query32);

         foreach ($datosQ2 as $datos) {
            $proceso13= $datos->estado;
       }
       $query33="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=13";
            $datosQ3 = DB::SELECT($query33);

         foreach ($datosQ3 as $datos) {
            $finalizado13= $datos->estado;
       }
           $query34="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=14";
            $datosQ = DB::SELECT($query34);

         foreach ($datosQ as $datos) {
            $iniciado14= $datos->estado;
       }
       $query35="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=14";
            $datosQ2 = DB::SELECT($query35);

         foreach ($datosQ2 as $datos) {
            $proceso14= $datos->estado;
       }
       $query36="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=14";
            $datosQ3 = DB::SELECT($query36);

         foreach ($datosQ3 as $datos) {
            $finalizado14= $datos->estado;
       }
           $query37="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=15";
            $datosQ = DB::SELECT($query37);

         foreach ($datosQ as $datos) {
            $iniciado15= $datos->estado;
       }
       $query38="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=15";
            $datosQ2 = DB::SELECT($query38);

         foreach ($datosQ2 as $datos) {
            $proceso15= $datos->estado;
       }
       $query39="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=15";
            $datosQ3 = DB::SELECT($query39);

         foreach ($datosQ3 as $datos) {
            $finalizado15= $datos->estado;
       }
           $query40="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=16";
            $datosQ = DB::SELECT($query40);

         foreach ($datosQ as $datos) {
            $iniciado16= $datos->estado;
       }
       $query41="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=16";
            $datosQ2 = DB::SELECT($query41);

         foreach ($datosQ2 as $datos) {
            $proceso16= $datos->estado;
       }
       $query42="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=16";
            $datosQ3 = DB::SELECT($query42);

         foreach ($datosQ3 as $datos) {
            $finalizado16= $datos->estado;
       }
           $query43="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=17";
            $datosQ = DB::SELECT($query43);

         foreach ($datosQ as $datos) {
            $iniciado17= $datos->estado;
       }
       $query44="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=17";
            $datosQ2 = DB::SELECT($query44);

         foreach ($datosQ2 as $datos) {
            $proceso17= $datos->estado;
       }
       $query45="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=17";
            $datosQ3 = DB::SELECT($query45);

         foreach ($datosQ3 as $datos) {
            $finalizado17= $datos->estado;
       }
           $query46="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='INICIADO' AND a.id_personal IS NOT NULL and a.id_departamento=18";
            $datosQ = DB::SELECT($query46);

         foreach ($datosQ as $datos) {
            $iniciado18= $datos->estado;
       }
       $query47="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal IS NOT NULL and a.id_departamento=18";
            $datosQ2 = DB::SELECT($query47);

         foreach ($datosQ2 as $datos) {
            $proceso18= $datos->estado;
       }
       $query48="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=18";
            $datosQ3 = DB::SELECT($query48);

         foreach ($datosQ3 as $datos) {
            $finalizado18= $datos->estado;
       }
        array_push($datosA, [
                'iniciado3' => $iniciado3,
                'proceso3' => $proceso3,
                'finalizado3' => $finalizado3,
                'iniciado4' => $iniciado4,
                'proceso4' => $proceso4,
                'finalizado4' => $finalizado4,
                'iniciado5' => $iniciado5,
                'proceso5' => $proceso5,
                'finalizado5' => $finalizado5,
                'iniciado6' => $iniciado6,
                'proceso6' => $proceso6,
                'finalizado6' => $finalizado6,
                'iniciado7' => $iniciado7,
                'proceso7' => $proceso7,
                'finalizado7' => $finalizado7,
                'iniciado8' => $iniciado8,
                'proceso8' => $proceso8,
                'finalizado8' => $finalizado8,
                'iniciado9' => $iniciado9,
                'proceso9' => $proceso9,
                'finalizado9' => $finalizado9,
                'iniciado10' => $iniciado10,
                'proceso10' => $proceso10,
                'finalizado10' => $finalizado10,
                'iniciado11' => $iniciado11,
                'proceso11' => $proceso11,
                'finalizado11' => $finalizado11,
                'iniciado12' => $iniciado12,
                'proceso12' => $proceso12,
                'finalizado12' => $finalizado12,
                'iniciado13' => $iniciado13,
                'proceso13' => $proceso13,
                'finalizado13' => $finalizado13,
                'iniciado14' => $iniciado14,
                'proceso14' => $proceso14,
                'finalizado14' => $finalizado14,
                'iniciado15' => $iniciado15,
                'proceso15' => $proceso15,
                'finalizado15' => $finalizado15,
                 'iniciado16' => $iniciado16,
                'proceso16' => $proceso16,
                'finalizado16' => $finalizado16,
                 'iniciado17' => $iniciado17,
                'proceso17' => $proceso17,
                'finalizado17' => $finalizado17,
                'iniciado18' => $iniciado18,
                'proceso18' => $proceso18,
                'finalizado18' => $finalizado18,
                
            ]);

        }else{

      $query1="SELECT count(distinct a.actividad)
                estado FROM tb_actividades a WHERE a.estatus='INICIADO'
                AND a.id_personalc IS NOT NULL and a.id_departamento=".$id_ROL_area;
            $datosQ = DB::SELECT($query1);

         foreach ($datosQ as $datos) {
            $iniciado= $datos->estado;
       }
       $query2="SELECT ount(distinct a.actividad) estado FROM
                tb_actividades a WHERE a.estatus='EN PROCESO' AND a.id_personal
                IS NOT NULL and a.id_departamento=$id_ROL_area";
            $datosQ2 = DB::SELECT($query2);

         foreach ($datosQ2 as $datos) {
            $proceso= $datos->estado;
       }
       $query3="SELECT count(distinct a.actividad) estado FROM tb_actividades a WHERE a.estatus='FINALIZADO' AND a.id_personal IS NOT NULL and a.id_departamento=$id_ROL_area";
            $datosQ3 = DB::SELECT($query3);
       
         foreach ($datosQ3 as $datos) {
            $finalizado= $datos->estado;
       }

        array_push($datosA, [
                'iniciado' => $iniciado,
                'proceso' => $proceso,
                'finalizado' => $finalizado,

            ]);
    }
        return $datosA;
    }

    public function showEncargadosPanel(Request $request)
    {
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

        $id_ROL_area = auth()->user()->ID_ROL_LLAVE_FK;

        if($id_ROL_area == 1){
            $query="SELECT u.id,
                     u.name,
                     r.NOMBRE_ROL AS AREA_ASIGNADA
                      FROM users u
                      LEFT JOIN roles r ON r.ID_ROL = u.ID_ROL_LLAVE_FK ";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            foreach ($datosQ as $datos) {
                $nombre  = $datos->name;
                $area = $datos->AREA_ASIGNADA;
                array_push($objDatos, [
                    'nombre' => $nombre,
                    'area' => $area]);
            }
            $area = 'ADMINISTRACIÓN';
        }elseif ($id_ROL_area == 2) {
          $query="SELECT u.id,u.name,
                     (case when r.ID_ROL=2 then 'COORDINACIÓN DE TRANSICIÓN ADJUNTA' else r.NOMBRE_ROL end) AS AREA_ASIGNADA
                      FROM users u
                      LEFT JOIN roles r ON r.ID_ROL = u.ID_ROL_LLAVE_FK WHERE r.ID_ROL!= 1";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            foreach ($datosQ as $datos) {
                $nombre  = $datos->name;
                $area =$datos->AREA_ASIGNADA;

                $area = $datos->AREA_ASIGNADA;
                array_push($objDatos, [
                    'nombre' => $nombre,
                    'area' => $area]);
            }


        } else{
            $query="SELECT u.id,
                     u.name,
                     r.NOMBRE_ROL AS AREA_ASIGNADA
                      FROM users u
                      LEFT JOIN roles r ON r.ID_ROL = u.ID_ROL_LLAVE_FK
                      WHERE r.ID_ROL = $id_ROL_area ";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            foreach ($datosQ as $datos) {
                $nombre  = $datos->name;
                $area = $datos->AREA_ASIGNADA;
                array_push($objDatos, [
                    'nombre' => $nombre,
                    'area' => $area]);
            }
        }


            return view('encargadosPanel', compact('objDatos','area'));
    }


     public function showActividadesPanel(Request $request,$id_rol)
    {
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

        $id_ROL_area = auth()->user()->ID_ROL_LLAVE_FK;

        if($id_ROL_area == 1 || $id_ROL_area == 2){
            /*$query="SELECT a.id,a.id_personal,(case WHEN p.nombre IS NULL then u.name ELSE concat(p.nombre,' ',p.apellido_paterno,' ',p.apellido_materno) end) AS name,p.nombre,p.apellido_paterno,p.apellido_materno,a.id_departamento,r.NOMBRE_ROL,a.actividad,
            /*a.fecha_inicio fi,* /
            DATE_FORMAT(a.fecha_inicio,'%d/%m/%Y %H:%i:%s') AS fi,
            /*a.fecha_fin ff,* /
            DATE_FORMAT(a.fecha_fin,'%d/%m/%Y %H:%i:%s') AS ff,
            a.recursos,a.estatus,(SELECT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_rol AND d.ID_ACTIVIDAD =a.actividad GROUP BY d.ID_ACTIVIDAD) AS docs FROM tb_actividades a
              LEFT JOIN tb_personals p ON p.id = a.id_personal
              LEFT JOIN roles r ON r.ID_ROL = a.id_departamento
              LEFT JOIN users u ON u.id = a.id_personal
                      WHERE a.id_departamento= $id_rol and a.id_personal is not null";*/
            $query ="SELECT DISTINCT
                (SELECT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_rol
                    AND p.actividad = a.actividad GROUP BY p.actividad) AS name,
                p.nombre,
                p.apellido_paterno,
                p.apellido_materno,
                a.id_departamento,
                r.NOMBRE_ROL,
                a.actividad,
                a.id,
            /*a.fecha_inicio fi,*/
            DATE_FORMAT(a.fecha_inicio,'%d/%m/%Y %H:%i:%s') AS fi,
            /*a.fecha_fin ff,*/
            DATE_FORMAT(a.fecha_fin,'%d/%m/%Y %H:%i:%s') AS ff,
            a.recursos,a.estatus,(SELECT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_rol AND d.ID_ACTIVIDAD =a.actividad GROUP BY d.ID_ACTIVIDAD) AS docs
                FROM tb_actividades a
              LEFT JOIN tb_personals p ON p.id = a.id_personal
              LEFT JOIN roles r ON r.ID_ROL = a.id_departamento
              LEFT JOIN users u ON u.id = a.id_personal
                      WHERE a.id_departamento= $id_rol and a.id_personal is not null";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            $area='';
            $departamento='';
            foreach ($datosQ as $datos) {
                $id_actividad = $datos->id;
                $nombre  = $datos->name;
                $area = $datos->NOMBRE_ROL;
                $actividad = $datos->actividad;
                $fecha_inicio = $datos->fi;
                $fecha_fin = $datos->ff;
                $recursos = $datos->recursos;
                $estatus = $datos->estatus;
                $docs = $datos->docs;
                array_push($objDatos, [
                    'id_actividad'=>$id_actividad,
                    'nombre' => $nombre,
                    'area' => $area,
                    'actividad' => $actividad,
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_fin' => $fecha_fin,
                    'recursos' => $recursos,
                    'estatus' => $estatus,
                    'docs' => $docs,
                  ]);
            }
             $query2="SELECT r.NOMBRE_ROL FROM roles r  WHERE r.ID_ROL = $id_rol";
            $datosQ2 = DB::SELECT($query2);

            foreach ($datosQ2 as $datos2) {
                $departamento  = $datos2->NOMBRE_ROL;

            }



        }else{
            /*$query="SELECT a.id,a.id_personal,(case WHEN p.nombre IS NULL then u.name ELSE concat(p.nombre,' ',p.apellido_paterno,' ',p.apellido_materno) end) AS name,p.nombre,p.apellido_paterno,p.apellido_materno,a.id_departamento,r.NOMBRE_ROL,a.actividad,
                /*a.fecha_inicio fi,* /
                DATE_FORMAT(a.fecha_inicio,'%d/%m/%Y %H:%i:%s') AS fi,
                /*a.fecha_fin ff,* /
                DATE_FORMAT(a.fecha_fin,'%d/%m/%Y %H:%i:%s') AS ff,
            a.recursos,a.estatus,(SELECT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_rol AND d.ID_ACTIVIDAD =a.actividad GROUP BY d.ID_ACTIVIDAD) AS docs FROM tb_actividades a
              LEFT JOIN tb_personals p ON p.id = a.id_personal
              LEFT JOIN roles r ON r.ID_ROL = a.id_departamento
              LEFT JOIN users u ON u.id = a.id_personal
                      WHERE a.id_departamento = $id_rol and a.id_personal is not null ";*/
            $query = "SELECT DISTINCT
                (SELECT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_rol
                    AND p.actividad = a.actividad GROUP BY p.actividad) AS name,
                p.nombre,
                p.apellido_paterno,
                p.apellido_materno,
                a.id_departamento,
                r.NOMBRE_ROL,
                a.actividad,
                a.id,
            /*a.fecha_inicio fi,*/
            DATE_FORMAT(a.fecha_inicio,'%d/%m/%Y %H:%i:%s') AS fi,
            /*a.fecha_fin ff,*/
            DATE_FORMAT(a.fecha_fin,'%d/%m/%Y %H:%i:%s') AS ff,
            a.recursos,a.estatus,(SELECT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_rol AND d.ID_ACTIVIDAD =a.actividad GROUP BY d.ID_ACTIVIDAD) AS docs
                FROM tb_actividades a
              LEFT JOIN tb_personals p ON p.id = a.id_personal
              LEFT JOIN roles r ON r.ID_ROL = a.id_departamento
              LEFT JOIN users u ON u.id = a.id_personal
                      WHERE a.id_departamento= $id_rol and a.id_personal is not null";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            $area='';
            foreach ($datosQ as $datos) {
                $id_actividad = $datos->id;
                $nombre  = $datos->name;
                $area = $datos->NOMBRE_ROL;
                $actividad = $datos->actividad;
                $fecha_inicio = $datos->fi;
                $fecha_fin = $datos->ff;
                $recursos = $datos->recursos;
                $estatus = $datos->estatus;
                $docs = $datos->docs;
                array_push($objDatos, [
                    'id_actividad'=>$id_actividad,
                    'nombre' => $nombre,
                    'area' => $area,
                    'actividad' => $actividad,
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_fin' => $fecha_fin,
                    'recursos' => $recursos,
                    'estatus' => $estatus,
                    'docs' => $docs,
                  ]);
            }

              $query3="SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL= $id_rol";
            $datosQ3 = DB::SELECT($query3);

            foreach ($datosQ3 as $datos3) {
                $departamento  = $datos3->NOMBRE_ROL;

            }
        }


            $query6 = "SELECT u.name FROM users u WHERE u.ID_ROL_LLAVE_FK = $id_rol";
            $datosQ6 = DB::SELECT($query6);
            $objDatosQ6 = [];
            $nombres='';

             if($id_rol==3){
                 $nombres='ENRIQUE DE JESUS SEGURA SANTIAGO | ANDREA CISNEROS CANSECO |';
                }else{
                 $nombres='';
                }

            foreach ($datosQ6 as $datos) {
                $name = $datos->name;




                array_push($objDatosQ6,[
                    'name' => $name,

                ]);
            }



            return view('ActividadesPanel', compact('objDatos','area','id_ROL_area','id_rol','departamento','objDatosQ6','nombres'));
    }


     public function showPersonalPanel(Request $request,$id_rol)
    {
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

        $id_ROL_area = auth()->user()->ID_ROL_LLAVE_FK;

            $query="
   SELECT p.id,p.id_departamento,r.NOMBRE_ROL,p.nombre,p.apellido_paterno,p.apellido_materno,p.colonia,p.calle,p.numero,p.cp,p.RFC,p.email,p.telefono FROM tb_personals p
   LEFT JOIN roles r on p.id_departamento=r.ID_ROL
   WHERE p.id_departamento = $id_rol ";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            $area='';
            foreach ($datosQ as $datos) {

                $nombre  = $datos->nombre." ".$datos->apellido_paterno." ".$datos->apellido_materno;
                $area = $datos->NOMBRE_ROL;
                $direccion = $datos->colonia." ".$datos->calle." ".$datos->numero.",".$datos->cp;
                $rfc = $datos->RFC;
                $email = $datos->email;
                $telefono = $datos->telefono;

                array_push($objDatos, [
                    'nombre' => $nombre,
                    'area' => $area,
                    'direccion' => $direccion,
                    'rfc' => $rfc,
                    'email' => $email,
                    'telefono' => $telefono,

                  ]);
            }

               $query3="SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL= $id_rol";
            $datosQ3 = DB::SELECT($query3);

            foreach ($datosQ3 as $datos3) {
                $departamento  = $datos3->NOMBRE_ROL;

            }

            $query4 = "SELECT u.name FROM users u WHERE u.ID_ROL_LLAVE_FK = $id_rol";
            $datosQ4 = DB::SELECT($query4);
            $objDatosQ4 = [];
             $nombres='';

             if($id_rol==3){
                 $nombres='ENRIQUE DE JESUS SEGURA SANTIAGO | ANDREA CISNEROS CANSECO |';
                }else{
                 $nombres='';
                }



            foreach ($datosQ4 as $datos) {
                $name = $datos->name;
                array_push($objDatosQ4,[
                    'name' => $name]);
            }



            return view('personalPanel', compact('objDatos','area','id_ROL_area','id_rol','departamento','objDatosQ4','nombres'));
    }
      public function avisosCaptura(Request $request)
    {
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

      $fecha_actual=date("Y-m-d");
      $msj2='';


        return view('avisosCaptura',compact('fecha_actual','msj2'));
    }

    public function downloadDoc1(Request $request)
    {
        $titulo_aviso = $request->get('titulo_aviso');
        $ruta_archivo = $request->get('ruta_archivo');
        $pathtoFile = Storage::path($ruta_archivo);
        //return $ruta;
        //return response()->download($ruta,$nom_doc);
        return response()->download($pathtoFile,$titulo_aviso);
        //return( Response::download( $download_path ) );
        //return Storage::disk('public')->download($ruta, $nom_doc);
    }

    public function traerDocsXUni(Request $request)
    {
        if($request->ajax()){
            $actividad = $request->input('actividad');
            $id_uni = $request->input('id_uni');

            $query = "SELECT * FROM tb_documentos d
                        where d.ID_DEPARTAMENTO = $id_uni
                        and d.ID_ACTIVIDAD = '$actividad'";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            foreach ($datosQ as $datos) {
                $NOMBRE_DOC = $datos->NOMBRE_DOC;
                $RUTA_DOC = $datos->RUTA_DOC;
                array_push($objDatos, [
                    'NOMBRE_DOC' =>$NOMBRE_DOC,
                    'RUTA_DOC' => $RUTA_DOC
                ]);
            }
            return $objDatos;
        }
    }

    public function descargarPDF($uni)
    {
        $query ="SELECT a.id,a.id_personal,(case WHEN p.nombre IS NULL then u.name ELSE concat(p.nombre,' ',p.apellido_paterno,' ',p.apellido_materno) end) AS name,p.nombre,p.apellido_paterno,p.apellido_materno,a.id_departamento,r.NOMBRE_ROL,a.actividad,
        DATE_FORMAT(a.fecha_inicio,'%d/%m/%Y %H:%i:%s') AS fi,
        DATE_FORMAT(a.fecha_fin,'%d/%m/%Y %H:%i:%s') AS ff,
        a.recursos,a.estatus,(SELECT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $uni AND d.ID_ACTIVIDAD =a.actividad GROUP BY d.ID_ACTIVIDAD) AS docs,a.created_at FROM tb_actividades a
              LEFT JOIN tb_personals p ON p.id = a.id_personal
              LEFT JOIN roles r ON r.ID_ROL = a.id_departamento
              LEFT JOIN users u ON u.id = a.id_personal
                      WHERE a.id_departamento = $uni and a.id_personal is not null
                      ORDER BY a.created_at";
            $datosQ = DB::SELECT($query);
            $objDatos = [];
            $area='';
            $unidad='';
            foreach ($datosQ as $datos) {
                $id_actividad = $datos->id;
                $nombre  = $datos->name;
                $area = $datos->NOMBRE_ROL;
                $actividad = $datos->actividad;
                $fecha_inicio = $datos->fi;
                $fecha_fin = $datos->ff;
                $recursos = $datos->recursos;
                $estatus = $datos->estatus;
                $docs = $datos->docs;
                array_push($objDatos, [
                    'id_actividad'=>$id_actividad,
                    'nombre' => $nombre,
                    'area' => $area,
                    'actividad' => $actividad,
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_fin' => $fecha_fin,
                    'recursos' => $recursos,
                    'estatus' => $estatus,
                    'docs' => $docs,
                  ]);
            }
            $query2 = "SELECT * FROM roles r WHERE r.ID_ROL = $uni";
            $datosQ2 = DB::SELECT($query2);
            foreach ($datosQ2 as $datos) {
                $unidad = $datos->NOMBRE_ROL;
            }

            $pdf = \PDF::loadView('ActPanelPDF', compact('objDatos','unidad'))->setPaper('letter','portrait');
                $nombrepdf = "PANEL-ACTIVIDADES-".$unidad.".pdf";
            return $pdf->download($nombrepdf);


        //return $objDatos;
    }

    public function descargarPDFGeneral(Request $request,$estatus,$id_p,$id_dep)
    {
        //return $estatus.' '.$id_p.' '.$id_dep;
        $arreglo = [];
        if($id_dep == 'Seleccione una opción' || $id_dep == 'TODO'){
            $query2 = "SELECT DISTINCT
                    ac.actividad,
                    ac.fecha_inicio,
                    ac.fecha_fin,
                    ac.recursos,
                    ac.estatus,
                    ac.id_departamento,
                    (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = ac.id_departamento AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                    (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = ac.id_departamento
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                    FROM tb_actividades ac
                    LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                    INNER JOIN users user ON user.id=ac.id_personal
                    ORDER BY ac.actividad";
            $datosQ2 = DB::SELECT($query2);
            foreach ($datosQ2 as $datos2) {
                                    $actividad= strtoupper($datos2->actividad);
                                    $fecha_inicio= $datos2->fecha_inicio;
                                    $fecha_fin= $datos2->fecha_fin;
                                    $recursos= $datos2->recursos;
                                    $estatus= $datos2->estatus;
                                    $id_departamento= $datos2->id_departamento;
                                    $NOMBRE_DOC= $datos2->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos2->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'id_departamento' => $id_departamento,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre
                                    ]);
                            }
        }else{
            if($id_p == 'TODO'){
                if($estatus == 'TODO'){
                    $query = "SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_dep AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_dep
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento=".$id_dep."
                                         ORDER BY ac.actividad";
                                         $datosQ = DB::SELECT($query);
                                        foreach ($datosQ as $datos) {
                                            $actividad= $datos->actividad;
                                            $fecha_inicio= $datos->fecha_inicio;
                                            $fecha_fin= $datos->fecha_fin;
                                            $recursos= $datos->recursos;
                                            $estatus= $datos->estatus;
                                            $id_departamento= $datos->id_departamento;
                                            $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                            if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                            $nombre= $datos->nombre;
                                            array_push($arreglo, [
                                                'actividad' => $actividad,
                                                'fecha_inicio' => $fecha_inicio,
                                                'fecha_fin' => $fecha_fin,
                                                'recursos' => $recursos,
                                                'estatus' => $estatus,
                                                'id_departamento' => $id_departamento,
                                                'NOMBRE_DOC' => $NOMBRE_DOC,
                                                'nombre' => $nombre
                                            ]);
                                    }
                }else{
                    $query = "SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_dep AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_dep
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento= $id_dep AND estatus='".$estatus."'
                                         ORDER BY ac.actividad";
                                 $datosQ = DB::SELECT($query);
                                foreach ($datosQ as $datos) {
                                    $actividad= $datos->actividad;
                                    $fecha_inicio= $datos->fecha_inicio;
                                    $fecha_fin= $datos->fecha_fin;
                                    $recursos= $datos->recursos;
                                    $estatus= $datos->estatus;
                                    $id_departamento= $datos->id_departamento;
                                    $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'id_departamento' => $id_departamento,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre
                                    ]);
                            }
                }
            }else{
                if($estatus == 'TODO'){
                    $query = "SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_dep AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_dep
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento= $id_dep AND id_personal=".$id_p."
                                         ORDER BY ac.actividad";
                                         $datosQ = DB::SELECT($query);
                                        foreach ($datosQ as $datos) {
                                            $actividad= $datos->actividad;
                                            $fecha_inicio= $datos->fecha_inicio;
                                            $fecha_fin= $datos->fecha_fin;
                                            $recursos= $datos->recursos;
                                            $estatus= $datos->estatus;
                                            $id_departamento= $datos->id_departamento;
                                            $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                            if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                            $nombre= $datos->nombre;
                                            array_push($arreglo, [
                                                'actividad' => $actividad,
                                                'fecha_inicio' => $fecha_inicio,
                                                'fecha_fin' => $fecha_fin,
                                                'recursos' => $recursos,
                                                'estatus' => $estatus,
                                                'id_departamento' => $id_departamento,
                                                'NOMBRE_DOC' => $NOMBRE_DOC,
                                                'nombre' => $nombre
                                            ]);
                                    }
                }else{
                    $query = "SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_dep AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT distinct GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_dep
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento= $id_dep AND ac.id_personal=".$id_p."  AND ac.estatus='".$estatus."'
                                         ORDER BY ac.actividad";
                                 $datosQ = DB::SELECT($query);
                                foreach ($datosQ as $datos) {
                                    $actividad= $datos->actividad;
                                    $fecha_inicio= $datos->fecha_inicio;
                                    $fecha_fin= $datos->fecha_fin;
                                    $recursos= $datos->recursos;
                                    $estatus= $datos->estatus;
                                    $id_departamento= $datos->id_departamento;
                                    $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'id_departamento' => $id_departamento,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre
                                    ]);
                            }
                }
            }
        }





        $pdf = \PDF::loadView('PanelEstadisticosPdf', compact('estatus','arreglo'))->setPaper('letter','portrait');
                $nombrepdf = "PANEL-ACTIVIDADES.pdf";
            return $pdf->download($nombrepdf);
    }

    public function PanelGeneral(Request $request)
    {
        $query = "SELECT r.ID_ROL, r.NOMBRE_ROL FROM roles r
                    where r.ID_ROL NOT IN(1)
                     AND r.ID_ROL NOT IN(2)";
        $datosQ = DB::SELECT($query);
        $objQ = [];
        foreach ($datosQ as $datos) {
            $ID_ROL = $datos->ID_ROL;
            $NOMBRE_ROL = $datos->NOMBRE_ROL;
            array_push($objQ, [
                'ID_ROL' => $ID_ROL,
                'NOMBRE_ROL' => $NOMBRE_ROL]);
        }
        $arreglo = [];
                    $query2 = "SELECT DISTINCT
                    ac.actividad,
                    ac.fecha_inicio,
                    ac.fecha_fin,
                    ac.recursos,
                    ac.estatus,
                    ac.id_departamento,
                    (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC SEPARATOR' <br> ') AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = ac.id_departamento AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                    (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = ac.id_departamento
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                    FROM tb_actividades ac
                    LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                    INNER JOIN users user ON user.id=ac.id_personal;";
                             $datosQ2 = DB::SELECT($query2);
                            foreach ($datosQ2 as $datos2) {
                                    $actividad= strtoupper($datos2->actividad);
                                    $fecha_inicio= $datos2->fecha_inicio;
                                    $fecha_fin= $datos2->fecha_fin;
                                    $recursos= $datos2->recursos;
                                    $estatus= $datos2->estatus;
                                    $id_departamento= $datos2->id_departamento;
                                    $NOMBRE_DOC= $datos2->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos2->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'id_departamento' => $id_departamento,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre
                                    ]);
                            }
        return view('PanelGeneral',compact('objQ','arreglo'));
    }
    public function ajaxNombresEncargadosDepartamentos(Request $request){
        if($request->ajax()){
            $id_departamento = $request->input('Nombre');
             $query="";
            if($id_departamento==3){
                    $query="SELECT * FROM (SELECT DISTINCT
                                us.id,
                                us.name
                                FROM users us
                                where us.ID_ROL_LLAVE_FK=3
                                AND us.id NOT IN(81)
                        UNION ALL
                            SELECT DISTINCT
                            us.id,
                            us.name
                            FROM users us
                            where us.ID_ROL_LLAVE_FK=2
                            AND us.id NOT IN(81)
                            ) t
                            order by t.name";
            }else{
               $query="SELECT
                    us.id,
                    us.name
                    FROM users us where us.ID_ROL_LLAVE_FK=".$id_departamento."
                     AND us.id NOT IN(81) ORDER BY us.name ASC";
            }
            $arreglo_encargados_departamento = [];
            $datosQ = DB::SELECT($query);
            foreach ($datosQ as $datos) {
                    $id_encargado= $datos->id;
                    $nombre_encargado= $datos->name;
                    array_push($arreglo_encargados_departamento, [
                                'id_encargado' => $id_encargado,
                                'nombre_encargado' => $nombre_encargado
                            ]);
            }
            return $arreglo_encargados_departamento;
        }
    }

        public function arregloDATOSTODOS(Request $request){
            if($request->ajax()){
            $id_departamento = $request->input('id_depa');
            $arreglo= [];
            if($id_departamento=="TODO" ||$id_departamento=='TODO'){
                $query = "SELECT DISTINCT
                    ac.actividad,
                    ac.fecha_inicio,
                    ac.fecha_fin,
                    ac.recursos,
                    ac.estatus,
                    ac.id_departamento,
                    (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = ac.id_departamento AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                    (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = ac.id_departamento
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                    FROM tb_actividades ac
                    LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                    ";
                             $datosQ = DB::SELECT($query);
                           foreach ($datosQ as $datos) {
                                    $actividad= $datos->actividad;
                                    $fecha_inicio= $datos->fecha_inicio;
                                    $fecha_fin= $datos->fecha_fin;
                                    $recursos= $datos->recursos;
                                    $estatus= $datos->estatus;
                                    $id_departamento= $datos->id_departamento;
                                    $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre,
                                        'id_departamento' => $id_departamento
                                    ]);
                            }
                            return $arreglo;
                    }
                }
            }
    public function ajaxDatosActividades(Request $request){
        if($request->ajax()){
            $id_departamento = $request->input('id_depa');
            $id_personal = $request->input('id_encargado');
            $estatus_in = $request->input('estatus');
            $arreglo= [];
            if($id_personal=='TODO'||$id_personal=="TODO" ){
                if($estatus_in=='TODO'||$estatus_in=="TODO"){
                $query = "SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_departamento AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_departamento
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento= $id_departamento";
                                         $datosQ = DB::SELECT($query);
                                        foreach ($datosQ as $datos) {
                                            $actividad= $datos->actividad;
                                            $fecha_inicio= $datos->fecha_inicio;
                                            $fecha_fin= $datos->fecha_fin;
                                            $recursos= $datos->recursos;
                                            $estatus= $datos->estatus;
                                            $id_departamento= $datos->id_departamento;
                                            $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                            if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                            $nombre= $datos->nombre;
                                            array_push($arreglo, [
                                                'actividad' => $actividad,
                                                'fecha_inicio' => $fecha_inicio,
                                                'fecha_fin' => $fecha_fin,
                                                'recursos' => $recursos,
                                                'estatus' => $estatus,
                                                'id_departamento' => $id_departamento,
                                                'NOMBRE_DOC' => $NOMBRE_DOC,
                                                'nombre' => $nombre
                                            ]);
                                    }
                        }else{
                            //sentencia en where estatus y departamento
                                 $query = "SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_departamento AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_departamento
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento= $id_departamento AND estatus='".$estatus_in."'";
                                 $datosQ = DB::SELECT($query);
                                foreach ($datosQ as $datos) {
                                    $actividad= $datos->actividad;
                                    $fecha_inicio= $datos->fecha_inicio;
                                    $fecha_fin= $datos->fecha_fin;
                                    $recursos= $datos->recursos;
                                    $estatus= $datos->estatus;
                                    $id_departamento= $datos->id_departamento;
                                    $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'id_departamento' => $id_departamento,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre
                                    ]);
                            }//termina foreach
                        }//termina else interno
            }else{
                 if($estatus_in=='TODO'||$estatus_in=="TODO"){
                                 $query = "SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_departamento AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_departamento
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento= $id_departamento AND id_personal=".$id_personal;
                                 $datosQ = DB::SELECT($query);
                                foreach ($datosQ as $datos) {
                                    $actividad= $datos->actividad;
                                    $fecha_inicio= $datos->fecha_inicio;
                                    $fecha_fin= $datos->fecha_fin;
                                    $recursos= $datos->recursos;
                                    $estatus= $datos->estatus;
                                    $id_departamento= $datos->id_departamento;
                                    $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'id_departamento' => $id_departamento,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre
                                    ]);
                            }
                 }else{
                        //cuando no cumple ninguna de las condiciones...
                            //aquí iran los 3 filtros
                                    $query="SELECT DISTINCT
                                        ac.actividad,
                                        ac.fecha_inicio,
                                        ac.fecha_fin,
                                        ac.recursos,
                                        ac.estatus,
                                        ac.id_departamento,
                                        (SELECT DISTINCT GROUP_CONCAT(d.NOMBRE_DOC) AS c FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_departamento AND d.ID_ACTIVIDAD = ac.actividad  GROUP BY d.ID_ACTIVIDAD) AS NOMBRE_DOC,
                                        (SELECT DISTINCT distinct GROUP_CONCAT((case WHEN pp.nombre IS NULL then u.name ELSE concat(pp.nombre,' ',pp.apellido_paterno,' ',pp.apellido_materno) end)) AS c
                    FROM tb_actividades p
                    LEFT JOIN tb_personals pp ON pp.id = p.id_personal
                    LEFT JOIN users u ON u.id = p.id_personal
                    WHERE p.id_departamento = $id_departamento
                    AND p.actividad = ac.actividad GROUP BY p.actividad) AS nombre
                                        FROM tb_actividades ac
                                        LEFT JOIN tb_documentos doc ON doc.ID_SUBIO=ac.id_personal
                                        INNER JOIN users user ON user.id=ac.id_personal
                                         where ac.id_departamento= $id_departamento  AND ac.id_personal=".$id_personal."  AND ac.estatus='".$estatus_in."'";
                                 $datosQ = DB::SELECT($query);
                                foreach ($datosQ as $datos) {
                                    /*$id_actividad= $datos->id;*/
                                    $actividad= $datos->actividad;
                                    /*$id_personal= $datos->id_personal;*/
                                    $fecha_inicio= $datos->fecha_inicio;
                                    $fecha_fin= $datos->fecha_fin;
                                    $recursos= $datos->recursos;
                                    $estatus= $datos->estatus;
                                    $id_departamento= $datos->id_departamento;
                                    $NOMBRE_DOC= $datos->NOMBRE_DOC;
                                    if($NOMBRE_DOC == null){
                                                $NOMBRE_DOC = '';
                                            }
                                    $nombre= $datos->nombre;
                                    array_push($arreglo, [
                                        'actividad' => $actividad,
                                        'fecha_inicio' => $fecha_inicio,
                                        'fecha_fin' => $fecha_fin,
                                        'recursos' => $recursos,
                                        'estatus' => $estatus,
                                        'id_departamento' => $id_departamento,
                                        'NOMBRE_DOC' => $NOMBRE_DOC,
                                        'nombre' => $nombre
                                    ]);
                            }//termina foreach
                 }//termina else interno dentro del else principal
            }
            return $arreglo;
        }
    }
}//termina la clase completa