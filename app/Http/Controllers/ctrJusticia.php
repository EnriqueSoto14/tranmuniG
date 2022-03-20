<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\tb_personal;
use App\tb_actividades;
use App\tb_avisos;
use App\tb_documentos;
use Illuminate\Support\Facades\Hash;
use DB;
use PDF;
use Response;
use Telegram;
use Illuminate\Support\Facades\Storage;
class ctrJusticia extends Controller
{
  
    public function justiciaCaptura(Request $request,$id_Rol)
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
     
        $msj2="";

        $query = "SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL = $id_Rol ";
        $datosQ = DB::SELECT($query);
        foreach ($datosQ as $datos) {
            $nom_dep = $datos->NOMBRE_ROL;
        }


         $query5 = "SELECT u.name FROM users u WHERE u.ID_ROL_LLAVE_FK = $id_Rol";
            $datosQ5 = DB::SELECT($query5);
            $objDatosQ5 = [];
            foreach ($datosQ5 as $datos) {
                $name = $datos->name;
                array_push($objDatosQ5,[
                    'name' => $name]);
            }

            $nombres='';

             if($id_Rol==3){
                 $nombres='ENRIQUE DE JESUS SEGURA SANTIAGO | ANDREA CISNEROS CANSECO |';
                }else{
                 $nombres='';
                }

        return view('captura',compact('msj2','nom_dep','id_Rol','objDatosQ5','nombres'));
    }

     public function runCapturaJusticia(Request $request)
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
        //Obtiene los valores de la sesion del usuario

        //$seccion=$request->get('seccion');

        $nombre=strtoupper($request->get('nombre'));
        $apellido_paterno=strtoupper($request->get('apellidop'));
        $apellido_materno=strtoupper($request->get('apellidom'));
        $colonia=strtoupper($request->get('colonia'));
        $calle=strtoupper($request->get('calle'));
        $num_exterior=$request->get('numext');

        $cp=strtoupper($request->get('cp'));
        $telefono=$request->get('telefono');
        $rfc=$request->get('rfc');
        $email=$request->get('email');
        $usuario=$request->get('user');
        $password=$request->get('pass');
        $nombreusuario=$request->get('nombre')." ".$request->get('apellidop')." ".$request->get('apellidom');

        $idRol = $request->get('idRol');


        //$passwordEncriptada
        $id_ROL = auth()->user()->ID_ROL_LLAVE_FK;
        if($id_ROL == 1 || $id_ROL == 2){
            $id_ROL = $request->get('idRol');
        }else{
            $id_ROL = auth()->user()->ID_ROL_LLAVE_FK;
        }
            tb_personal::create([
                'id_departamento'=> $id_ROL,
                'nombre' => $nombre,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'colonia' => $colonia,
                'calle' => $calle,
                'numero' => $num_exterior,
                'cp' => $cp,
                'RFC' => $rfc,
                'email' => $email,
                'telefono' => $telefono,
            ]);

            /*User::create([
            'name' => $nombreusuario,
            'email' => $usuario,
            'ID_ROL_LLAVE_FK' => $id_ROL,
            'password' => Hash::make($password),
            'password2' => $password
            ]);*/

        $msj2 = "¡Los valores se guardaron con EXITO!";

        $query = "SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL = $id_ROL ";
        $datosQ = DB::SELECT($query);
        foreach ($datosQ as $datos) {
            $nom_dep = $datos->NOMBRE_ROL;
        }
        //return view('captura',compact('msj','nom_dep'));
        $txt = "justiciaCaptura/".$id_ROL."";
        return redirect($txt);
     

    }


    public function justiciaActividades(Request $request,$id_Rol)
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
     


        $query = "SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL = $id_Rol ";
        $datosQ = DB::SELECT($query);
        foreach ($datosQ as $datos) {
            $nom_dep = $datos->NOMBRE_ROL;
        }

       $listaDatos = [];

$query2 = " SELECT p.id ID, p.nombre NOMBRE,p.apellido_paterno AP,p.apellido_materno AM FROM tb_personals p WHERE p.id_departamento=$id_Rol ORDER BY NOMBRE asc";

         $datosQ2 = DB::SELECT($query2);

        foreach ($datosQ2 as $datos) {
            $ID = $datos->ID;
            $NOMBRE = $datos->NOMBRE;
            $APELLIDOP = $datos->AP;
            $APELLIDOM = $datos->AM;

            $nombrecompleto=$NOMBRE." ".$APELLIDOP." ".$APELLIDOM;

            array_push($listaDatos, [
                'nombre' => $nombrecompleto,
                'id' => $ID,

            ]);
                   }


        $query7 = "SELECT u.id, u.name FROM users u WHERE u.ID_ROL_LLAVE_FK = $id_Rol ORDER BY u.name asc";
            $datosQ7 = DB::SELECT($query7);
            $objDatosQ7 = [];




            foreach ($datosQ7 as $datos) {
                $name = $datos->name;
                $id = $datos->id;
                array_push($objDatosQ7,[
                    'name' => $name,
                    'id' => $id,
                ]);
            }
            $msj2='';
             $nombres='';

             if($id_Rol==3){
                 $nombres='ENRIQUE DE JESUS SEGURA SANTIAGO | ANDREA CISNEROS CANSECO |';
                }else{
                 $nombres='';
                }

            $queryF = "SELECT * FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_Rol ";
            $datosQF = DB::SELECT($queryF);
            $objDatosQF = [];
            foreach ($datosQF as $datos) {
                $NOMBRE_DOC = $datos->NOMBRE_DOC;
                $ID_DOC = $datos->ID_DOC;
                $RUTA_DOC = $datos->RUTA_DOC;
                array_push($objDatosQF, [
                    'NOMBRE_DOC' => $NOMBRE_DOC,
                    'ID_DOC' => $ID_DOC,
                    'RUTA_DOC' => $RUTA_DOC]);
            }

        return view('asignarActJusticia',compact('msj2','nom_dep','listaDatos','id_Rol','objDatosQ7','nombres','objDatosQF'));
    }


         public function runCapturaActividad(Request $request)
    {

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
     
        //Obtiene los valores de la sesion del usuario

        //$seccion=$request->get('seccion');

        $personal=strtoupper($request->get('idPer'));
        $fecha_inicio=strtoupper($request->get('fi'))." ".date('H:i:s');
        $fecha_termino=strtoupper($request->get('ft'))." ".date('H:i:s');
        $actividad=strtoupper($request->get('actividad'));
        $recursos=strtoupper($request->get('recursos'));
        $conclusiones=$request->get('conclusiones');
        $estatus=strtoupper($request->get('estat'));
        $contador=$request->get('contSI');


       // $idRol = $request->get('idRol');

        $id_ROLSESION = auth()->user()->ID_ROL_LLAVE_FK;

        for ($i=1; $i <= $contador ; $i++) {
            $idSocioN = $request->get('ids'.strval($i));
            //$idSocioI = $ID_SOCIO;
            //if($id_ROLSESION == 1 || $id_ROLSESION == 2){
                $id_ROL = $request->get('idRol');
          //  }else{
           //     $id_ROL = auth()->user()->ID_ROL_LLAVE_FK;
           // }
            tb_actividades::create([
                'id_personal'=> $idSocioN,
                'id_departamento'=> $id_ROL,
                'actividad' => $actividad,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_termino,
                'recursos' => $recursos,
                'conclusiones' => $conclusiones,
                'estatus' => $estatus,
            ]);
        }
        $id_ROL=$id_ROL;


        $id_unidad = $request->get('id_unidad');
        $nomdoc = $request->get('nom_doc');
        if ($request->hasfile('docu')) {
            foreach ($request->file('docu') as $file) {
                //$path = Storage::disk('public')->put('', $file);
                $path = $file->store('public');
                $new_file_name = ctrJusticia::eliminar_acentos($file->getClientOriginalName());
                //$path = Storage::disk('public')->put($new_file_name, file_get_contents($file));
                $id_User = auth()->user()->id;
                tb_documentos::create([
                'id_subio' => $id_User,
                'id_departamento' => $id_unidad,
                'id_actividad' => $actividad,
                'nombre_doc' => $new_file_name,
                'ruta_doc' => $path ]);

            }
        }


        $msj2 = "¡Los valores se guardaron con EXITO!";

        $query = "SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL = $id_ROL ";
        $datosQ = DB::SELECT($query);
        foreach ($datosQ as $datos) {
            $nom_dep = $datos->NOMBRE_ROL;
        }
        //return view('captura',compact('msj','nom_dep'));
        $txt = "justiciaActividades/".$id_ROL."";
        return redirect($txt);


    }

 public function eliminaActividad($idC , $idR)
    {
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
        //$venta->delete();
        tb_actividades::where('id','=',$idC)->delete();
        $txt = "ActividadesPanel/".$idR."";
        return redirect($txt);
        //return $venta;
    }


        public function imprimirRecibo(Request $request)
    {
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
         
        
         $listaDatos = [];
    
           /* $query = "SELECT ap.seccion SECCION, ap.casilla CASILLA, ap.PAN, ap.PRI, ap.PRD, ap.PVEM, ap.PT, ap.PMC,
ap.PUP, ap.MORENA, ap.PNA, ap.PES, ap.RSP, ap.FPM, ap.PRI_PAN_PRD, ap.PRI_PAN, ap.PRI_PRD, ap.PAN_PRD, ap.candidatos_no_registrados CNR, ap.nulos NULOS, ap.total TOTAL FROM actasprep ap
        WHERE ap.seccion =" .$seccion.
        " AND ap.casilla = '" .$casilla."'";

         $datosQ = DB::SELECT($query);
        
        foreach ($datosQ as $datos) {
            $SECCION = $datos->SECCION;
            $CASILLA = $datos->CASILLA;
            $PAN = $datos->PAN;
            $PRI = $datos->PRI;
            $PRD = $datos->PRD;
            $PVEM = $datos->PVEM;
            $PT = $datos->PT;
            $PMC = $datos->PMC;
            $PUP = $datos->PUP;
            $MORENA = $datos->MORENA;
            $PNA = $datos->PNA;
            $PES = $datos->PES;
            $RSP = $datos->RSP;
            $FPM = $datos->FPM;
            $PRI_PAN_PRD = $datos->PRI_PAN_PRD;
            $PRI_PAN = $datos->PRI_PAN;
            $PRI_PRD = $datos->PRI_PRD;
            $PAN_PRD = $datos->PAN_PRD;
            $CNR = $datos->CNR;
            $NULOS = $datos->NULOS;
            $TOTAL = $datos->TOTAL;
            
            
                       array_push($listaDatos, [
                'seccion' => $SECCION,
                'casilla' => $CASILLA,
                'PAN' => $PAN,
                'PRI' => $PRI,
                'PRD' => $PRD,
                'PVEM' => $PVEM,
                'PT' => $PT,
                'PMC' => $PMC,
                'PUP' => $PUP,
                'MORENA' => $MORENA,
                'PNA' => $PNA,
                'PES' => $PES,
                'RSP' => $RSP,
                'FPM' => $FPM,
                'PRI_PAN_PRD' => $PRI_PAN_PRD,
                'PRI_PAN' => $PRI_PAN,
                'PRI_PRD' => $PRI_PRD,
                'PAN_PRD' => $PAN_PRD,
                'CNR' => $CNR,
                'NULOS' => $NULOS,
                'TOTAL' => $TOTAL
            ]);
        }*/
            # code... 
        

        $data= compact('listaDatos');
        $pdf = PDF::loadView('reciboPDF', $data);
        return $pdf->download('recibo.pdf');
           
         
    }

      public function imprimirBoleta(Request $request)
    {
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
         
        
         $listaDatos = [];
    
           /* $query = "SELECT ap.seccion SECCION, ap.casilla CASILLA, ap.PAN, ap.PRI, ap.PRD, ap.PVEM, ap.PT, ap.PMC,
ap.PUP, ap.MORENA, ap.PNA, ap.PES, ap.RSP, ap.FPM, ap.PRI_PAN_PRD, ap.PRI_PAN, ap.PRI_PRD, ap.PAN_PRD, ap.candidatos_no_registrados CNR, ap.nulos NULOS, ap.total TOTAL FROM actasprep ap
        WHERE ap.seccion =" .$seccion.
        " AND ap.casilla = '" .$casilla."'";

         $datosQ = DB::SELECT($query);
        
        foreach ($datosQ as $datos) {
            $SECCION = $datos->SECCION;
            $CASILLA = $datos->CASILLA;
            $PAN = $datos->PAN;
            $PRI = $datos->PRI;
            $PRD = $datos->PRD;
            $PVEM = $datos->PVEM;
            $PT = $datos->PT;
            $PMC = $datos->PMC;
            $PUP = $datos->PUP;
            $MORENA = $datos->MORENA;
            $PNA = $datos->PNA;
            $PES = $datos->PES;
            $RSP = $datos->RSP;
            $FPM = $datos->FPM;
            $PRI_PAN_PRD = $datos->PRI_PAN_PRD;
            $PRI_PAN = $datos->PRI_PAN;
            $PRI_PRD = $datos->PRI_PRD;
            $PAN_PRD = $datos->PAN_PRD;
            $CNR = $datos->CNR;
            $NULOS = $datos->NULOS;
            $TOTAL = $datos->TOTAL;
            
            
                       array_push($listaDatos, [
                'seccion' => $SECCION,
                'casilla' => $CASILLA,
                'PAN' => $PAN,
                'PRI' => $PRI,
                'PRD' => $PRD,
                'PVEM' => $PVEM,
                'PT' => $PT,
                'PMC' => $PMC,
                'PUP' => $PUP,
                'MORENA' => $MORENA,
                'PNA' => $PNA,
                'PES' => $PES,
                'RSP' => $RSP,
                'FPM' => $FPM,
                'PRI_PAN_PRD' => $PRI_PAN_PRD,
                'PRI_PAN' => $PRI_PAN,
                'PRI_PRD' => $PRI_PRD,
                'PAN_PRD' => $PAN_PRD,
                'CNR' => $CNR,
                'NULOS' => $NULOS,
                'TOTAL' => $TOTAL
            ]);
        }*/
            # code... 
        

        $data= compact('listaDatos');
        $pdf = PDF::loadView('boletaPredial', $data);
        return $pdf->download('boletaPredial.pdf');
           
         
    }
 public function runCapturaAviso(Request $request)
    {


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

        //Obtiene los valores de la sesion del usuario

        //$seccion=$request->get('seccion');

        $aviso=strtoupper($request->get('aviso'));
        $titulo=strtoupper($request->get('titulo'));
        $fecha_actual=date("Y-m-d");
         $ruta= $request->file('Archivo');
        if($ruta == ''){
            $ruta = '';
        }else{
            $ruta= $request->file('Archivo')->store('uploads');
        }
        $id_publica = auth()->user()->id;
        $text = "<b>Registro completo:</b> \n"
        . "<b>Titulo del Aviso: </b>\n"
        . "$titulo \n"
        . "<b>Aviso: </b>\n"
        . "$aviso \n"
        . "<b> Archivo: </b> \n"
        . "$ruta \n"
        . "<b> Fecha: </b> \n"
        . "$fecha_actual ";

        $id_rol = auth()->user()->ID_ROL_LLAVE_FK;
        $idPMD = '-1001717003953';
        $idJusticia = '-1001623631358';
        $idTAC ='-1001699361416';
        if( $id_rol==4 /* && $idPMD =='true' */ /* && $id_publica */){
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID'  , '-1001717003953' ),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);  
        } elseif ($id_rol==5 /* && $idJusticia == 'true' */ /* && Auth::user()->id */) {
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID' , '-1001623631358' ),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);              
        } elseif ($id_rol==12 /* && $idTAC =='true' */ /* && Auth::user()->id */) {
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID' , '-1001699361416' ),
                'parse_mode' => 'HTML',
                'text' => $text
            ]); 
        }

        /* Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001245607659'),
                'parse_mode' => 'HTML',
                'text' => $text
        ]); */

            tb_avisos::create([
                'aviso'=> $aviso,
                'titulo_aviso'=> $titulo,
                'fecha_publi'=> $fecha_actual,
                'ruta_archivo'=> $ruta,
                'id_user_publica' => $id_publica,

            ]);

        $msj2 = "¡El aviso se ha publicado con EXITO!";


        return view('avisosCaptura',compact('fecha_actual','msj2'));


    }
    //QIQE TELEGRAM
    public function updatedActivity(){
    $activity = Telegram::getUpdates();
    dd($activity);
    }

    /* ELIMINAR UNA NOTICIA */
    public function eliminaNoticia($idAv , $idR)
    {
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
        //$venta->delete();
        tb_avisos::where('id','=',$idAv)->delete();
        $txt = "ActividadesPanel/".$idR."";
        return redirect($txt);
        //return $venta;
    }
    /* AQUI TERMINA ELIMINAR UNA NOTICIA */

    public function subirArchivo($idR,$act){
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
        $id_unidad = $idR;
        $actividad= $act;
        $idSesion = auth()->user()->id;
          $queryF = "SELECT d.NOMBRE_DOC, d.RUTA_DOC, d.ID_DOC,
         (CASE WHEN d.ID_SUBIO = $idSesion  THEN 1 ELSE 0 END) AS PERMISOS
          FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_unidad AND d.ID_ACTIVIDAD = '$actividad'";
            $datosQF = DB::SELECT($queryF);
            $objDatosQF = [];
            $PERMISOS = 0;
            foreach ($datosQF as $datos) {
                $NOMBRE_DOC = $datos->NOMBRE_DOC;
                $RUTA_DOC = $datos->RUTA_DOC;
                $PERMISOS = $datos->PERMISOS;
                $ID_DOC = $datos->ID_DOC;
                $idRol = auth()->user()->ID_ROL_LLAVE_FK;
                //return $idRol;
                if($idRol == 1 || $idRol == 2){
                    $PERMISOS = 1;
                }

                array_push($objDatosQF, [
                    'NOMBRE_DOC' => $NOMBRE_DOC,
                    'ID_DOC' => $ID_DOC,
                    'PERMISOS' => $PERMISOS,
                    'RUTA_DOC' => $RUTA_DOC]);
            }
        return view('subirArchivo',compact('objDatosQF','id_unidad','actividad'));
    }

    public function addDocXUni(Request $request)
    {
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
        $id_unidad = $request->get('id_unidad');
        $ruta_doc = $request->file('doc')->store('public');
        $id_User = auth()->user()->id;
        $nomdoc = $request->get('nom_doc');

        tb_documentos::create([
            'id_subio' => $id_User,
            'id_departamento' => $id_unidad,
            'nombre_doc' => $nomdoc,
            'ruta_doc' => $ruta_doc ]);

        return redirect('/justiciaActividades/'.$id_unidad);
    }

     public function addDocXUni2(Request $request)
    {
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

        $id_unidad = $request->get('id_unidad');
        //$ruta_doc = $request->file('doc')->store('public');
        $id_User = auth()->user()->id;
        $nomdoc = $request->get('nom_doc');
        $actividad=$request->get('actividad');


        if ($request->hasfile('docu')) {
            foreach ($request->file('docu') as $file) {
                //$path = Storage::disk('public')->put('', $file);
                $path = $file->store('public');
                $new_file_name = ctrJusticia::eliminar_acentos($file->getClientOriginalName());
                //return $new_file_name;
                //$path = Storage::disk('public')->put($new_file_name, file_get_contents($file));
                $id_User = auth()->user()->id;
                tb_documentos::create([
                'id_subio' => $id_User,
                'id_departamento' => $id_unidad,
                'id_actividad' => $actividad,
                'nombre_doc' => $new_file_name,
                'ruta_doc' => $path ]);

            }
        }
        return redirect('/subirArchivo/'.$id_unidad."/".$actividad."");
    }

    public function downloadDoc(Request $request)
    { $userNombre = '';
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
        $ruta = $request->get('ruta');
        $nom_doc = $request->get('nom_doc2');
        $pathtoFile = Storage::path($ruta);
        //return $ruta;
        //return response()->download($ruta,$nom_doc);
        return response()->download($pathtoFile,$nom_doc);
        //return( Response::download( $download_path ) );
        //return Storage::disk('public')->download($ruta, $nom_doc);
    }

    public function deleteDoc(Request $request)
    {
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
        $ruta = $request->get('ruta3');
        $rol = $request->get('idrol3');
        $id_doc = $request->get('id_doc');
        Storage::delete($ruta);
        tb_documentos::where('ID_DOC',$id_doc)->delete();
        return redirect('/ActividadesPanel/'.$rol);
    }

      public function actividadesModifica(Request $request,$act,$id_Rol)
    {

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



        $query = "SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL = $id_Rol ";
        $datosQ = DB::SELECT($query);
        foreach ($datosQ as $datos) {
            $nom_dep = $datos->NOMBRE_ROL;
        }

       $listaDatos = [];

$query2 = " SELECT p.id ID, p.nombre NOMBRE,p.apellido_paterno AP,p.apellido_materno AM FROM tb_personals p WHERE p.id_departamento=$id_Rol ORDER BY NOMBRE asc";

         $datosQ2 = DB::SELECT($query2);

        foreach ($datosQ2 as $datos) {
            $ID = $datos->ID;
            $NOMBRE = $datos->NOMBRE;
            $APELLIDOP = $datos->AP;
            $APELLIDOM = $datos->AM;

            $nombrecompleto=$NOMBRE." ".$APELLIDOP." ".$APELLIDOM;

            array_push($listaDatos, [
                'nombre' => $nombrecompleto,
                'id' => $ID,

            ]);
                   }


        $query7 = "SELECT u.id, u.name FROM users u WHERE u.ID_ROL_LLAVE_FK = $id_Rol ORDER BY u.name asc";
            $datosQ7 = DB::SELECT($query7);
            $objDatosQ7 = [];




            foreach ($datosQ7 as $datos) {
                $name = $datos->name;
                $id = $datos->id;
                array_push($objDatosQ7,[
                    'name' => $name,
                    'id' => $id,
                ]);
            }
            $msj2='';
             $nombres='';

             if($id_Rol==3){
                 $nombres='ENRIQUE DE JESUS SEGURA SANTIAGO | ANDREA CISNEROS CANSECO |';
                }else{
                 $nombres='';
                }

              $query8 = "SELECT a.id,a.id_personal,a.actividad,date_format(a.fecha_inicio,'%Y-%m-%d') as fecha_inicio,date_format(a.fecha_fin,'%Y-%m-%d') as fecha_fin,a.recursos,a.estatus,a.conclusiones FROM tb_actividades a WHERE a.actividad = '$act' limit 1";
            $datosQ8 = DB::SELECT($query8);
            $objDatosQ8 = [];




            foreach ($datosQ8 as $datos) {
                $id = $datos->id;
                $id_personal = $datos->id_personal;
                $actividad = $datos->actividad;
                $fecha_inicio = $datos->fecha_inicio;
                $fecha_fin = $datos->fecha_fin;
                $recursos = $datos->recursos;
                $conclusiones = $datos->conclusiones;
                $estatus = $datos->estatus;
                array_push($objDatosQ8,[
                    'id' => $id,
                    'id_personal' => $id_personal,
                    'actividad' => $actividad,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
                'recursos' => $recursos,
                'conclusiones' => $conclusiones,
                'estatus' => $estatus,
                ]);
            }


         $query9 = "SELECT a.id,a.id_personal,(case WHEN p.nombre IS NULL then u.name ELSE concat(p.nombre,' ',p.apellido_paterno,' ',p.apellido_materno) end) AS NAME, a.actividad,date_format(a.fecha_inicio,'%Y-%m-%d') as fecha_inicio,date_format(a.fecha_fin,'%Y-%m-%d') as fecha_fin,a.recursos,a.estatus FROM tb_actividades a
        LEFT JOIN tb_personals p ON p.id = a.id_personal
        LEFT JOIN users u ON u.id = a.id_personal
        WHERE a.actividad='$act' and a.id_personal is not null";
            $datosQ9 = DB::SELECT($query9);
            $objDatosQ9 = [];

            $conta=count($datosQ9);


            foreach ($datosQ9 as $datos) {
                $id = $datos->id;
                $id_personal = $datos->id_personal;
                $nombre = $datos->NAME;
                $actividad = $datos->actividad;
                $fecha_inicio = $datos->fecha_inicio;
                $fecha_fin = $datos->fecha_fin;
                $recursos = $datos->recursos;
                $estatus = $datos->estatus;
                array_push($objDatosQ9,[
                    'id' => $id,
                    'id_personal' => $id_personal,
                    'nombre' => $nombre,
                    'actividad' => $actividad,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
                'recursos' => $recursos,
                'estatus' => $estatus,
                ]);
            }
            $actividad=$act;
            $idSesion = auth()->user()->id;


            $queryF = "SELECT d.NOMBRE_DOC, d.RUTA_DOC, d.ID_DOC,
         (CASE WHEN d.ID_SUBIO = $idSesion  THEN 1 ELSE 0 END) AS PERMISOS
          FROM tb_documentos d WHERE d.ID_DEPARTAMENTO = $id_Rol AND d.ID_ACTIVIDAD = '$actividad'";
            $datosQF = DB::SELECT($queryF);
            $objDatosQF = [];
            $PERMISOS = 0;
            foreach ($datosQF as $datos) {
                $NOMBRE_DOC = $datos->NOMBRE_DOC;
                $RUTA_DOC = $datos->RUTA_DOC;
                $ID_DOC = $datos->ID_DOC;
                $PERMISOS = $datos->PERMISOS;
                $idRol = auth()->user()->ID_ROL_LLAVE_FK;
                //return $idRol;
                if($idRol == 1 || $idRol == 2){
                    $PERMISOS = 1;
                }

                array_push($objDatosQF, [
                    'NOMBRE_DOC' => $NOMBRE_DOC,
                    'ID_DOC' => $ID_DOC,
                    'PERMISOS' => $PERMISOS,
                    'RUTA_DOC' => $RUTA_DOC]);
            }

        return view('ActividadesModifica',compact('msj2','nom_dep','listaDatos','id_Rol','actividad','objDatosQ7','nombres','objDatosQ8','objDatosQ9','conta','objDatosQF'));
    }



     public function runModificaActividad(Request $request)
    {

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

        //Obtiene los valores de la sesion del usuario

        //$seccion=$request->get('seccion');

        $personal=strtoupper($request->get('idPer'));
        $fecha_inicio=strtoupper($request->get('fi'))." ".date('H:i:s');
        $fecha_termino=strtoupper($request->get('ft'))." ".date('H:i:s');
        $actividad=strtoupper($request->get('actividad'));
        $recursos=strtoupper($request->get('recursos'));
        $conclusiones=$request->get('conclusiones');
        $estatus=strtoupper($request->get('estatus'));
        $contador=$request->get('contSI');
        $acti=$request->get('acti');


       $id_ROL = $request->get('idRol');

        $id_ROLSESION = auth()->user()->ID_ROL_LLAVE_FK;
           /*if($id_ROLSESION == 1 || $id_ROLSESION == 2){
                $id_ROL = $request->get('idRol');
            }else{
                $id_ROL = auth()->user()->ID_ROL_LLAVE_FK;
            }*/

            $query="SELECT a.id,a.id_personal , a.actividad  FROM tb_actividades a WHERE a.actividad = '".$acti."'";
             $datosQ9 = DB::SELECT($query);

               foreach ($datosQ9 as $datos) {

                $id_personal = $datos->id_personal;
                $actividad2 = $datos->actividad;
                $id_actividadcita = $datos->id;
                tb_actividades::where('id',$id_actividadcita)->update([
                'id_personal'=> $id_personal,
                'id_departamento'=> $id_ROL,
                'actividad' => $actividad,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_termino,
                'recursos' => $recursos,
                'conclusiones' => $conclusiones,
                'estatus' => $estatus,
            ]);



               }

               tb_documentos::where('id_actividad',$acti)->update([
                'id_actividad'=> $actividad,
            ]);

        for ($i=1; $i <= $contador ; $i++) {
            $idSocioN = $request->get('ids'.strval($i));

           if ($idSocioN>0) {
                tb_actividades::create([
                'id_personal'=> $idSocioN,
                'id_departamento'=> $id_ROL,
                'actividad' => $actividad,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_termino,
                'recursos' => $recursos,
                'estatus' => $estatus,
            ]);
           }


        }

        $id_unidad = $request->get('id_unidad');
        $nomdoc = $request->get('nom_doc');
        if ($request->hasfile('docu')) {
            foreach ($request->file('docu') as $file) {
                //$path = Storage::disk('public')->put('', $file);
                $path = $file->store('public');
                $new_file_name = ctrJusticia::eliminar_acentos($file->getClientOriginalName());
                //$path = Storage::disk('public')->put($new_file_name, file_get_contents($file));
                $id_User = auth()->user()->id;
                tb_documentos::create([
                'id_subio' => $id_User,
                'id_departamento' => $id_unidad,
                'id_actividad' => $actividad,
                'nombre_doc' => $new_file_name,
                'ruta_doc' => $path ]);

            }
        }



        //return $ruta_doc;
        /*if($nomdoc == ''){
        }else{
            $ruta_doc = $request->file('docu')->store('public');
            $id_User = auth()->user()->id;
            $nomdoc = $request->get('nom_doc');
            tb_documentos::create([
            'id_subio' => $id_User,
            'id_departamento' => $id_unidad,
            'id_actividad' => $actividad,
            'nombre_doc' => $nomdoc,
            'ruta_doc' => $ruta_doc ]);
        }*/

        //$passwordEncriptada
        //$id_ROL = auth()->user()->ID_ROL_LLAVE_FK;


            /*User::create([
            'name' => $nombreusuario,
            'email' => $usuario,
            'ID_ROL_LLAVE_FK' => $id_ROL,
            'password' => Hash::make($password),
            'password2' => $password
            ]);*/

        $msj2 = "¡Los valores se guardaron con EXITO!";

        $query = "SELECT r.NOMBRE_ROL FROM roles r WHERE r.ID_ROL = $id_ROL ";
        $datosQ = DB::SELECT($query);
        foreach ($datosQ as $datos) {
            $nom_dep = $datos->NOMBRE_ROL;
        }
        //return view('captura',compact('msj','nom_dep'));
        $txt = "ActividadesPanel/".$id_ROL."";
        return redirect($txt);


    }
function eliminar_acentos($cadena){

        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç'),
        array('N', 'n', 'C', 'c'),
        $cadena
        );

        return $cadena;
    }

    public function eliminaPersonal($id_personal,$id_departamento,$conta){
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
         $query = "SELECT a.id,a.id_personal , a.id_departamento, a.actividad  FROM tb_actividades a WHERE a.id_personal=$id_personal AND a.id_departamento=$id_departamento";
        $datosQ = DB::SELECT($query);
        foreach ($datosQ as $datos) {
            $actividad = $datos->actividad;
            $id = $datos->id;
        }
        $contador=$conta;
       if( $contador > 1) {
           tb_actividades::where('id',$id)->delete();
           $txt = "modificaActividad/".$actividad."/".$id_departamento."";
           return redirect($txt);
       }else{
          tb_actividades::where('id',$id)->update([
                'id_personal'=> null

            ]);
          $txt = "modificaActividad/".$actividad."/".$id_departamento."";
           return redirect($txt);
       }


    }

 
}