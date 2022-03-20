<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		
footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #AF272F;
            color: white;
            text-align: center;
            line-height: 35px;
        }
		.titulo{
			text-align: center;
			font: 2rem,
			color:blue;

		}
		table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
	</style>
</head>
<body>
<script type="text/php">
        if ( isset($pdf) ) {
            $y = $pdf->get_height() - 20;
            $x = $pdf->get_width() - 15 - 50;
            $pdf->page_text($x, $y, "N° de Pág: {PAGE_NUM} de {PAGE_COUNT}", '', 8, array(0,0,0));
        }
    </script>
  
       
	


  <div class="row" >
  <img src="../public/img/oaxaca.png" style="width: 80px; height: 80px; float: left;">
  <img src="../public/img/logogob.png" style="width: 250px; height: 70px; float: right;">  
	<h2 align="center" style="font-size: 10"> 
	<br>BOLETA PREDIAL <br>
  __________________________________________________________________________________________________________________________
  </h2>

</div>

<table style="border: 0px; font-size: 11;">
  <thead style="border: 0px">
      <tr style="border: 0px">
        <th style="border: 0px; align-content: center;"><img src="../public/img/terreno.jpg" style="width: 100px; height: 65px; float: center; "></th>
        <th style="border: 0px;"><img src="../public/img/casita.jpg" style="width: 100px; height: 50px; float: center; "></th>
        <th style="border: 0px;"><img src="../public/img/casitatipo.jpg" style="width: 100px; height: 50px; float: center;"></th>
        <th style="border: 0px;">FECHA DE CORTE: <br> 13/12/21</th>
      </tr>
  </thead>
</table>

	<table style="border: 0px;">
		<thead style="font-size: 8; background-color: #AF272F">
    
			<tr>
				<th style="text-align: center; color: white; width: 20%;"> M2 de suelo </th>
			    <th style="text-align: center; color: white; width: 30%;"> M2 de construcción  </th>
          <th style="text-align: center; color: white; width: 25%;"> Uso-tipo </th>
          <th style="text-align: center; color: white; width: 25%;"> IMPUESTO REAL</th>
			</tr>
			 

                       
			
		</thead>
		
		<tbody>
			
			<tr>

                        <td style="text-align: center; font-size: 9; border: 0px; "> 604.15 </td>
                        <td style="text-align: center; font-size: 9; border: 0px; "> 529.02</td>
                        <td style="text-align: center; font-size: 9; border: 0px; "> H-05 </td>
                        <td style="text-align: center; font-size: 9; border: 0px; "> $3,151.53 </td>

                            
		   </tr>
          
			

		</tbody>
	</table>
    <table style="border: 0px;">
    <thead style="font-size: 8; background-color: #AF272F;">
      <tr>
        <th style="text-align: center; color: white; width: 20%; "> Valor unitario por m2 </th>
          <th style="text-align: center; color: white; width: 30%; "> Valor unitario por m2 </th>
          <th style="text-align: center; color: white; width: 25%;"> Clase </th>
          <th style="text-align: center; color: white; width: 25%;">  SUBSIDIO OTORGADO</th>
      </tr>
       

                       
      
    </thead>
    
    <tbody>
      
      <tr>

                        <td style="text-align: center; font-size: 9; border: 0px;"> $1,299.43 </td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> $3,233.89</td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> 3 </td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> $0.00 </td>

                            
       </tr>
          
      

    </tbody>
  </table>
   <table style="border: 0px;">
    <thead style="font-size: 8; background-color: #AF272F;">
      <tr>
        <th style="text-align: center; color: white; width: 20%;"> Valor del suelo</th>
          <th style="text-align: center; color: white; width: 30%; "> Valor de la construcción </th>
          <th style="text-align: center; color: white; width: 25%;"> Valor catastral </th>
          <th style="text-align: center; color: white; width: 25%;">  TOTAL A PAGAR 1er BIMESTRE</th>
      </tr>
       

                       
      
    </thead>
    
    <tbody>
      
      <tr>

                        <td style="text-align: center; font-size: 9; border: 0px; height: 10px;"> $789,741.22 </td>
                        <td style="text-align: center; font-size: 9; border: 0px; height: 10px%;"> $1,699,607.44</td>
                        <td style="text-align: center; font-size: 9; border: 0px; height: 10px%;"> $2,448,348.66 </td>
                        <td style="text-align: center; font-size: 9; border: 0px; height: 10px%;"> $3,152.00 </td>

                            
       </tr>
          
      <tr>
           <td style="text-align: center; font-size: 8; border: 0px;" colspan="2"> PAGO ANUAL ANTICIPADO (DEL 1 AL 31 DE ENERO)</td>
           <td style="text-align: center; font-size: 8; border: 0px;" colspan="2"> PAGO ANUAL ANTICIPADO (DEL 1 AL 28 DE FEBRERO)</td>
      </tr>

    </tbody>
  </table>

<table >
    <thead style="font-size: 8; background-color:#AF272F;">
      <tr>
        <th style="text-align: center; color: white; "> Vence</th>
          <th style="text-align: center; color: white; "> Linea de captura </th>
          <th style="text-align: center; color: white;"> importe </th>
          <th style="text-align: center; color: white;">  Vence</th>
          <th style="text-align: center; color: white;">  Linea de captura</th>
          <th style="text-align: center; color: white;">  Importe</th>
      </tr>
       

                       
      
    </thead>
    
    <tbody>
      
      <tr>

                        <td style="text-align: center; font-size: 9; border: 0px;"> 31/01/22</td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> KJDHE7848HDID44894</td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> $2,448.66 </td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> 27/02/22</td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> KJHKDUIE7773HJDJ373 </td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> $3,152.00 </td>

                            
       </tr>
       <tr>
        <td style="text-align: center; font-size: 9; border: 0px;" colspan="3"> <img src="../public/img/codigo.png" align="center" style="width: 100px; height: 
50px;"></td>
        <td style="text-align: center; font-size: 9; border: 0px;" colspan="3"> <img src="../public/img/codigo.png" align="center" style="width: 100px; height: 
50px;"></td>
       </tr>
          
      

    </tbody>
  </table>

  <table >
    <thead style="font-size: 8; background-color:#AF272F;">
      <tr>
          <th style="text-align: center; color: white; "> Vence</th>
          <th style="text-align: center; color: white; "> Linea de captura </th>
          <th style="text-align: center; color: white;"> importe </th>
          <th style="text-align: center; color: white; background-color: white; border: 0px;" colspan="3"> importe </th>

         
      </tr>
       
  
    </thead>
    
    <tbody>
      
      <tr>

                        <td style="text-align: center; font-size: 9; border: 0px;"> 31/01/22</td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> KJDHE7848HDID44894</td>
                        <td style="text-align: center; font-size: 9; border: 0px;"> $2,448.66 </td>
                        <td style="text-align: center; font-size: 7; border: 0px;"> Propuesta de declaracion de valor catastral y pago de impuesto predial que se emite con fundamentos en los articulos 15,126,127,129,130 y 131 del Codigo Fiscal del Distrito Federal </td>

                        

                            
       </tr>
       <tr>
        <td style="text-align: center; font-size: 9; border: 0px;" colspan="3"> <img src="../public/img/codigo.png" align="center" style="width: 100px; height: 
50px;"></td>
        
       </tr>
          
      

    </tbody>
  </table>
	
  <h4>ESTADO DE CUENTA</h4>
	<table border="1" style="background: none; font-size: 8;">
<thead style="background-color:#AF272F;">
  <tr>

    <th style="text-align: center; color: white; ">PERIODO</th>

    <th style="text-align: center; color: white; ">IMPORTE</th>

    <th style="text-align: center; color: white; ">FECHA DE PAGO</th>
    <th style="text-align: center; color: white; ">LUGAR DE PAGO</th>
    <th style="text-align: center; color: white; ">SITUACION</th>

  </tr>
</thead>
<tbody>
  <tr>

    <td>2018   02</td>

    <td>2,345.00</td>

    <td>23/03/2019</td>
    <td>BANCOMER</td>
    <td>PAGADO</td>

  </tr>

  <tr>

   <td>2017   02</td>

    <td>3,450.00</td>

    <td>23/03/2018</td>
    <td>BANCOMER</td>
    <td>PAGADO</td>


  </tr>
</tbody>

</table>
<br>
<br>
<br>
<div class="row" align="center">
<img src="../public/img/logogob.png" align="center" style="width: 200px; height: 
60px;">
<br>
<br>
<br>
<label style="float: center; font-size: 10;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>NUMERO DE CUENTA:</B> 055453636473-2</label>
</div>

<br>
<br>




</body>
</html>