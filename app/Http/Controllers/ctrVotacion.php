<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class ctrVotacion extends Controller
{
  
    public function votacionxColonia(Request $request)
    {
     
     $query = "SELECT DISTINCT c.colonia FROM coloniass c WHERE c.colonia IS NOT null";
        $datosQ = DB::SELECT($query);
        $listaDatos = [];
        foreach ($datosQ as $datos) {
            $colonia = $datos->colonia;
            array_push($listaDatos, [
                'colonia' => $colonia
            ]);
        }

 

     
        return view('votosxColonia',compact('listaDatos'));
    }

        public function imprimirRecibo(Request $request)
    {
         
        
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


 
}
