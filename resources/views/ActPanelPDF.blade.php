<!DOCTYPE html>
<html>
<head>
  <style>
    header {
      position: fixed;
      left: -5px;
      top: -45px;
      right: 0px;
      height: 30px;
      padding: 5px;
      text-align: center;
      font-size:70%;
      line-height:15px;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -30px;
      right: 0px;
      height: 50px;
    }

    @page { margin-top: 50px; margin-bottom: 30px; margin-left: 20px;}
  </style>
</head>

<body>
    <script type="text/php">
        if ( isset($pdf) ) {
            $y = $pdf->get_height() - 25;
            $x = $pdf->get_width() - 30 - 50;
            $pdf->page_text($x, $y, "N° de Pág: {PAGE_NUM} de {PAGE_COUNT}", '', 8, array(0,0,0));
        }
    </script>
    <footer style="width: 100%;" id="footer">
    </footer>

            <table width="100%">
                <tr>
                    <td width="30%"><img alt="" border="0" src="./img/transicion.png" width="40px" height="40px"/></td>
                    <td width="40%"><div style="font-size: 20px; text-align: center;">LISTA DE ACTIVIDADES</div></td>
                    <td width="30%" align="center"><img alt="" border="0" src="./img/recide4tlogo.jpg" width="140px" height="40px"/></td>
                </tr>
            </table>


            <div style="text-align:center;"> ACTIVIDADES ASIGNADAS A LA UNIDAD DE: {{$unidad}} </div>
            <br>
            <table border="1" class="" style="width: 100%; font-size: 12px; border-collapse: collapse;">
                <thead style="background: #BDBDBD;">
                    <tr>
                        <th style="text-align: center; " width="25%">Actividad</th>
                        <th style="text-align: center; " width="20%">Personal</th>
                        <th style="text-align: center; " width="8%">Fecha de inicio</th>
                        <th style="text-align: center; " width="8%">Fecha de termino</th>
                        <th style="text-align: center; " width="9%">Recursos</th>
                        <th style="text-align: center; " width="20%">Archivos</th>
                        <th style="text-align: center; " width="10%">Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($objDatos as $arregloDatosItem)
                    <tr style="font-size: 12px">
                          <td>{{ $arregloDatosItem['actividad'] }}</td>
                          <td style="font-size: 9px"><b>{{ $arregloDatosItem['nombre'] }}</b></td>
                          <td style="font-size: 9px">{{ $arregloDatosItem['fecha_inicio'] }}</td>
                          <td style="font-size: 9px">{{ $arregloDatosItem['fecha_fin'] }}</td>
                          <td>{{ $arregloDatosItem['recursos'] }}</td>
                          <td style="font-size: 10px">
                          <?php
                            $sub = '';
                            $sub = str_replace(",", " <br> ", $arregloDatosItem['docs']);
                            echo $sub;
                          ?>
                          </td>
                          <td style="text-align:center;">{{ $arregloDatosItem['estatus'] }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>


    </body>
</html>

