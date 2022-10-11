@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="css/estilos.css"> 
<script type="text/javascript" src="https://www.google.com/jsapi">
</script>


<script>
  $(document).ready(function() {

} );
 function actualizarGrafica() {
    /**/
   var Nombre = 0;
     $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('ActualizaGrafica') }}",
            type:"post",
            data: {Nombre:Nombre},
            success: function(result){
              console.log(result);
              var idR = $('#rol').val();

              if(idR==1 || idR==2){
             $iniciado3 = result[0].iniciado3;
              $proceso3 = result[0].proceso3;
              $finalizado3 = result[0].finalizado3;
              $iniciado4 = result[0].iniciado4;
              $proceso4 = result[0].proceso4;
              $finalizado4 = result[0].finalizado4;
              $iniciado5 = result[0].iniciado5;
              $proceso5 = result[0].proceso5;
              $finalizado5 = result[0].finalizado5;
              $iniciado6 = result[0].iniciado6;
              $proceso6 = result[0].proceso6;
              $finalizado6= result[0].finalizado6;
              $iniciado7= result[0].iniciado7;
              $proceso7= result[0].proceso7;
              $finalizado7= result[0].finalizado7;
              $iniciado8= result[0].iniciado8;
              $proceso8= result[0].proceso8;
              $finalizado8= result[0].finalizado8;
              $iniciado9= result[0].iniciado9;
              $proceso9= result[0].proceso9;
              $finalizado9= result[0].finalizado9;
              $iniciado10 =result[0].iniciado10;
              $proceso10=result[0].proceso10;
              $finalizado10 =result[0].finalizado10;
              $iniciado11= result[0].iniciado11;
              $proceso11= result[0].proceso11;
              $finalizado11= result[0].finalizado11;
              $iniciado12 = result[0].iniciado12;
              $proceso12 = result[0].proceso12;
              $finalizado12 = result[0].finalizado12;
              $iniciado13 = result[0].iniciado13;
              $proceso13 = result[0].proceso13;
              $finalizado13 = result[0].finalizado13;
              $iniciado14 = result[0].iniciado14;
              $proceso14 = result[0].proceso14;
              $finalizado14 = result[0].finalizado14;
              $iniciado15 = result[0].iniciado15;
              $proceso15 = result[0].proceso15;
              $finalizado15 = result[0].finalizado15;
              $iniciado16 = result[0].iniciado16;
              $proceso16 = result[0].proceso16;
              $finalizado16 = result[0].finalizado16;
              $iniciado17 = result[0].iniciado17;
              $proceso17 = result[0].proceso17;
              $finalizado17 = result[0].finalizado17;
              $iniciado18 = result[0].iniciado18;
              $proceso18 = result[0].proceso18;
              $finalizado18 = result[0].finalizado18;
              
             
              dibujarGrafico($iniciado3,$proceso3,$finalizado3,$iniciado4,$proceso4,$finalizado4,$iniciado5,$proceso5,$finalizado5,$iniciado6,$proceso6,$finalizado6,$iniciado7,$proceso7,$finalizado7,$iniciado8,$proceso8,$finalizado8,$iniciado9,$proceso9,$finalizado9,$iniciado10,$proceso10,$finalizado10,$iniciado11,$proceso11,$finalizado11,$iniciado12,$proceso12,$finalizado12,$iniciado13,$proceso13,$finalizado13,$iniciado14,$proceso14,$finalizado14,$iniciado15,$proceso15,$finalizado15,$iniciado16,$proceso16,$finalizado16,$iniciado17,$proceso17,$finalizado17,$iniciado18,$proceso18,$finalizado18)

              }else{
              $iniciado = result[0].iniciado;
              $proceso = result[0].proceso;
              $finalizado = result[0].finalizado;
              
             
              dibujarGrafico2($iniciado,$proceso,$finalizado)
              }
             
            }
        });
     


    // validarCasillaAsig();
   
     var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      var f=new Date();
      document.getElementById("date").innerHTML = f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();
  }
    google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(dibujarGrafico);
   google.setOnLoadCallback(dibujarGrafico2);

   function dibujarGrafico(i3,p3,f3,i4,p4,f4,i5,p5,f5,i6,p6,f6,i7,p7,f7,i8,p8,f8,i9,p9,f9,i10,p10,f10,i11,p11,f11,i12,p12,f12,i13,p13,f13,i14,p14,f14,i15,p15,f15,i16,p16,f16,i17,p17,f17,i18,p18,f18) {
     // Tabla de datos: valores y etiquetas de la gráfica
    var iniciado3 = parseInt(i3);
     var proceso3 = parseInt(p3);
     var finalizado3 = parseInt(f3);
      var iniciado4 = parseInt(i4);
     var proceso4 = parseInt(p4);
     var finalizado4 = parseInt(f4);
     var iniciado5 = parseInt(i5);
     var proceso5 = parseInt(p5);
     var finalizado5 = parseInt(f5);
     var iniciado6 = parseInt(i6);
     var proceso6 = parseInt(p6);
     var finalizado6 = parseInt(f6);
     var iniciado7 = parseInt(i7);
     var proceso7 = parseInt(p7);
     var finalizado7 = parseInt(f7);
     var iniciado8 = parseInt(i8);
     var proceso8 = parseInt(p8);
     var finalizado8 = parseInt(f8);
     var iniciado9 = parseInt(i9);
     var proceso9 = parseInt(p9);
     var finalizado9 = parseInt(f9);
      var iniciado10 = parseInt(i10);
     var proceso10 = parseInt(p10);
     var finalizado10 = parseInt(f10);
     var iniciado11 = parseInt(i11);
     var proceso11 = parseInt(p11);
     var finalizado11 = parseInt(f11);
     var iniciado12 = parseInt(i12);
     var proceso12 = parseInt(p12);
     var finalizado12 = parseInt(f12);
     var iniciado13 = parseInt(i13);
     var proceso13 = parseInt(p13);
     var finalizado13 = parseInt(f13);
     var iniciado14 = parseInt(i14);
     var proceso14 = parseInt(p14);
     var finalizado14 = parseInt(f14);
     var iniciado15 = parseInt(i15);
     var proceso15 = parseInt(p15);
     var finalizado15 = parseInt(f15);
     var iniciado16 = parseInt(i16);
     var proceso16 = parseInt(p16);
     var finalizado16 = parseInt(f16);
     var iniciado17 = parseInt(i17);
     var proceso17 = parseInt(p17);
     var finalizado17 = parseInt(f17);
     var iniciado18 = parseInt(i18);
     var proceso18 = parseInt(p18);
     var finalizado18 = parseInt(f18);
    
    

      var data = google.visualization.arrayToDataTable([
        ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Coord. de Transición Adjunta',iniciado3,proceso3,finalizado3],
          ['Plan Municipal de desarrollo', iniciado4,proceso4,finalizado4],
          ['Justicia', iniciado5,proceso5,finalizado5],
          ['Gobernabilidad',iniciado6,proceso6,finalizado6],
          ['Desarrollo Humano',iniciado7,proceso7,finalizado7],
          ['Administración y recursos H',iniciado8,proceso8,finalizado8],
          ['Desarrollo Económico',iniciado9,proceso9,finalizado9],
          ['Hacienda y tesoreria',iniciado10,proceso10,finalizado10],
          ['Obras y proyectos',iniciado11,proceso11,finalizado11],
          ['Territorios, Agencias y colonias',iniciado12,proceso12,finalizado12],
          ['Mercados y Ambulantes',iniciado13,proceso13,finalizado13],
          ['Oficialía Mayor y Servicios Generales',iniciado14,proceso14,finalizado14],
          ['Seguridad',iniciado15,proceso15,finalizado15],
          ['Comunicación',iniciado16,proceso16,finalizado16],
          ['Cultura y arte',iniciado17,proceso17,finalizado17],
          ['Central de abastos',iniciado18,proceso18,finalizado18],


       ]);
     var options = {
       title: 'Avance de actividades',
       is3D: true,
     }
     // Dibujar el gráfico
     new google.visualization.ColumnChart(
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-2')
     ).draw(data, options);
   }

   function dibujarGrafico2(vn,ve,v6j) {
     // Tabla de datos: valores y etiquetas de la gráfica
     var iniciado = parseInt(vn);
     var proceso = parseInt(ve);
     var finalizado = parseInt(v6j);
    

     var idR = $('#rol').val();

        if(idR == 3){
          var data = google.visualization.arrayToDataTable([
          ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Coord. de Transición Adjunta', iniciado,proceso,finalizado],
            ]);
        }
        
         if(idR == 4){
          var data = google.visualization.arrayToDataTable([
          ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Plan Municipal de desarrollo', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 5){
          var data = google.visualization.arrayToDataTable([
            ['Avance:','Iniciado','En proceso','Finalizado'],
            ['Justicia', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 6){
          var data = google.visualization.arrayToDataTable([
             ['Avance:','Iniciado','En proceso','Finalizado'],
             ['Gobernabilidad', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 7){
          var data = google.visualization.arrayToDataTable([
            ['Avance:','Iniciado','En proceso','Finalizado'],
            ['Desarrollo Humano', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 8){
          var data = google.visualization.arrayToDataTable([
          ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Administración y recursos humanos', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 9){
          var data = google.visualization.arrayToDataTable([
             ['Avance:','Iniciado','En proceso','Finalizado'],
             ['Desarrollo Económico', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 10){
          var data = google.visualization.arrayToDataTable([
             ['Avance:','Iniciado','En proceso','Finalizado'],
             ['Hacienda y tesorería', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 11){
          var data = google.visualization.arrayToDataTable([
          ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Obras y proyectos', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 12){
          var data = google.visualization.arrayToDataTable([
             ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Territorios, Agencias y colonias', iniciado,proceso,finalizado],
            ]);

        }
        if(idR == 13){
          var data = google.visualization.arrayToDataTable([
            ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Mercados y Ambulantes', iniciado,proceso,finalizado],
            ]);

        }
        if(idR == 14){
          var data = google.visualization.arrayToDataTable([
             ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Oficialía Mayor y Servicios Generales', iniciado,proceso,finalizado],
            ]);

        }
        if(idR == 15){
          var data = google.visualization.arrayToDataTable([
             ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Seguridad', iniciado,proceso,finalizado],
            ]);

        }
        if(idR == 16){
          var data = google.visualization.arrayToDataTable([
            ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Comunicación', iniciado,proceso,finalizado],
            ]);
        }
        if(idR == 17){
          var data = google.visualization.arrayToDataTable([
            ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Cultura y arte', iniciado,proceso,finalizado],
            ]);
        }
         if(idR == 18){
          var data = google.visualization.arrayToDataTable([
            ['Avance:','Iniciado','En proceso','Finalizado'],
          ['Central de abastos', iniciado,proceso,finalizado],
            ]);
        }


    

     var options = {
       title: 'Avance de Actividades',
       is3D: true,
     }
     // Dibujar el gráfico
     new google.visualization.ColumnChart(
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-2')
     ).draw(data, options);


   }


  function downloadDoc1(titulo,ruta) {

  var cadena      = ruta;
  var saludoArray = cadena.split('.');
  var ultima      = saludoArray[saludoArray.length - 1];
  $('#titulo_aviso').val(titulo+'.'+ultima);
  $('#ruta_archivo').val(ruta);

  document.getElementById('formulario2').submit();

}

function popabrir(titulo,aviso) {
  // body...
  var tx = "<div class='overlay' id='overlay'>"+
                          "<div class='popup' id='popup'>"+
                            "<div align='right'><button class='btn'  onclick='popcerrar()'><i class='fas fa-times'></i></button></div>"+
                            "<h3>"+titulo+"</h3>"+
                            "<h4>"+aviso+"</h4>"+
                          "</div>"+
                       "</div>";
  $("#mensaje").html(tx);

  var overlay = document.getElementById('overlay');
  var popup = document.getElementById('popup');
  overlay.classList.add('active');
  popup.classList.add('active');
  console.log(titulo);

}
function popcerrar() {
  // body...
  var overlay = document.getElementById('overlay');
  var popup = document.getElementById('popup');
  //e.preventDefault();
  overlay.classList.remove('active');
  popup.classList.remove('active');
}

function borrarEvento(id) {
    // body...
    var a = confirm('¿Esta seguro de que desea borrar a este aviso?');
    //var idR= $('#uni').val();
    
    var idAv = id;
    if(a){
        window.location="/eliminaEvento/"+ idAv + "";
       
    }
}

</script>
<body onload="actualizarGrafica()"></body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h2 align="center">Oaxaca de Juárez, Oaxaca.</h2>

            </div>
        </div>
    </div>
    <br>
 
   
    <div align="center">
      <b><h8 id="date"></h8></b>
    </div>
    <main role="main" class="">

      
     <div>
      <input type="hidden" name="rol" id="rol" value="{{Auth::user()->ID_ROL_LLAVE_FK}}">

          <button class="btn btn-success float-right" type="button" onclick="actualizarGrafica()"><i class="fas fa-redo-alt"></i>Actualizar gráfica</button>
      </div><br><br>
      <div class="col-md-12">
          Unidades
            <div>
              <div id="GraficoGoogleChart-ejemplo-2">
            </div>
      </div>
      <br>
      <h3 align="center">AVISOS TRANSICIÓN MUNICIPAL</h3>
<hr class="mb-2">
       <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%;">
              <thead style="text-align: center;" class="" id="panel">
                  @if(Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->id == 4)
                <tr>
                  <th style="text-align: center; font-size: 12px;" WIDTH="45%">AVISO</th>
                  <th style="text-align: center; font-size: 12px;" WIDTH="15%">FECHA DE PUBLICACIÓN</th>
                  <th style="text-align: center; font-size: 12px;" WIDTH="15%">PUBLICÓ</th>
                  <th style="text-align: center; font-size: 12px;" WIDTH="15%">Archivo</th>
                  <th style="text-align: center; font-size: 12px;" WIDTH="15%">ACCIONES</th>
                  
                </tr>
                @else
                  <tr>
                 <th style="text-align: center; font-size: 12px;" WIDTH="45%">AVISO</th>
                 <th style="text-align: center; font-size: 12px;" WIDTH="15%">FECHA DE PUBLICACIÓN</th>
                 <th style="text-align: center; font-size: 12px;" WIDTH="15%">PUBLICÓ</th>
                 <th style="text-align: center; font-size: 12px;" WIDTH="15%">Archivo</th>
                  
                  
                </tr>
                @endif
              </thead>
              <tbody>

                @foreach($objDatos as $item)
                <tr>
                  <td style="text-align: left; font-size: 12px;">
                     <!-- Attachment -->
                    <div class="attachment-block clearfix">
                      <img class="attachment-img" src="/img/avisos.png" alt="Attachment Image" style="width: 30px; height: 30px;"/>
                      <h6 class="attachment-heading"><a href="">{{$item['titulo_aviso']}}</a></h6>
                        <div class="attachment-text">
                          <?php
                          $sub=  substr($item['aviso'], 0, 16);
                          echo $sub;
                          ?><!--<a href="#" id="btn-abrir-popup" class="btn-abrir-popup" >más..</a>-->
                          <button type="button" class="btn btn-light btn-sm" onclick="popabrir('{{$item['titulo_aviso']}}','{{$item['aviso']}}')" style="color:#2B8FDB;"> ver más...</button>
                       </div>
                    </div> 
                    <div id="mensaje">
                    </div>

                  <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">{{$item['fecha_publi']}}</span>
              
                    
                  </td>
                  <td style="text-align: center; font-size: 12px;">
                   <br>
                   <br>
                   <br> {{$item['created_at']}}
                  </td>
                  <td style="text-align: center; font-size: 12px;">
                    <br>
                    <br> {{$item['nombre']}}
                  </td>
                  @if($item['ruta_archivo'] == NULL)
                    <td><br><br></td>
                  @else
                    <td style="text-align: center; font-size: 12px;">
                      <br>
                      <br> <button class="btn " style="color: blue; font-size:18px;" type="button" onclick="downloadDoc1('{{ $item['titulo_aviso']}}','{{$item['ruta_archivo']}}')"> <span class="fa fa-download" aria-hidden="true"></span></button>
                    </td>
                  @endif
                  
                    @if(Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->id == 4)
                     <td style="text-align: center; font-size: 12px;">
                   <br>
                   <br>                    
                    <button type="button" class="btn btn-sm btn-warning " style="font-size: 11px;"  title="Modificar aviso" ><i class="fas fa-pen-square"></i></button>
                       
                    <button type="button" class="btn btn-sm btn-danger" style="font-size: 11px;"  title="Eliminar aviso" onclick="borrarEvento()" ><i class="fa fa-trash" aria-hidden="true"></i></button> 
                      
                    </td>
                    @else

                    @endif
                  
                 
                </tr>
                @endforeach

                </tbody>
        </table> 
    <!--  <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%;">
              <thead style="text-align: center;" class="" id="panel">
                <tr>
                  <th style="text-align: center; font-size: 12px;" WIDTH="15%">Estadisticas</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="text-align: center; font-size: 12px;">
                    <a href="" target="">
                      <button class="btn btn-outline-dark" type="button">Consultar</button>
                    </a>
                  </td>
                  
                </tr>
                </tbody>
        </table> 
     
     MAPA COLONIAS
     <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                 <H2 align="center">Oaxaca de Juárez, Oax.</H2>
              <div align="center">
                <iframe width="600" height="500" id="gmap_canvas" src="https://geomaticamunioax.maps.arcgis.com/apps/Styler/index.html?appid=037f32668bbc423ea6c277597eca2c8f" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              </div>

            </div>
        </div>
    </div> -->
     <br>
     
</main>
</div>

@endsection
