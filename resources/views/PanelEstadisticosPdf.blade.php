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
                    <td width="40%"><div style="font-size: 20px; text-align: center;">ACTIVIDADES GENERALES</div></td>
                    <td width="30%" align="center"><img alt="" border="0" src="./img/recide4tlogo.jpg" width="140px" height="40px"/></td>
                </tr>
            </table>
            <br>
            <br>

	<table  id="example3" name="example3"class="table table-striped table-bordered dataTable no-footer" cellspacing="0" aria-describedby="example_info" role="grid" style="table-layout: fixed; width:100%;">
              <thead style="text-align: center;" class="thead-dark" id="panel" >
                  <tr>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Actividad</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="10%">Personal</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="10%">Fecha de inicio</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="10%">Fecha de término</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Recursos</th>
                    <th style="text-align: center; font-size: 12px;" width="10px">Nombre de archivo</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Estatus</th>
                  </tr>
              </thead>
              <tbody id="table_acti3" name="table_acti3" width="100%">
                @foreach($arreglo as $arregloDatosItem)
                    <tr style="font-size: 10px">
                         <td>{{ $arregloDatosItem['actividad'] }}</td>
                          <td><b>
                          <?php
                            $sub = '';
                            $sub = str_replace(",","<br>", $arregloDatosItem['nombre']);
                            echo $sub;
                          ?>
                        </b></td>
                          <td>{{ $arregloDatosItem['fecha_inicio'] }}</td>
                          <td>{{ $arregloDatosItem['fecha_fin'] }}</td>
                          <td>{{ $arregloDatosItem['recursos'] }}</td>
                          <td style="font-size: 9px;" width="10px">
                          <?php
                            $sub = '';
                            $sub = str_replace(",", " <br>", $arregloDatosItem['NOMBRE_DOC']);
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