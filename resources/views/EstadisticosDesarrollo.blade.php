@extends('layouts.menu')
@section('content')

<script type="text/javascript" src="https://www.google.com/jsapi">
</script>
<script type="text/javascript" class="init">
    $(document).ready(function() {

} );
  function actualizarGrafica() {
    /**/
   var Nombre = $('#id_area').val();
     $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('AjaxEstadisticos') }}",
            type:"post",
            data: {Nombre:Nombre},
            success: function(result){
              console.log(result);
              var idR = $('#rol').val();



              $iniciado = result[0].iniciado;
              $proceso = result[0].proceso;
              $finalizado = result[0].finalizado;
              
             
              dibujarGrafico2($iniciado,$proceso,$finalizado);

             
            }
        });
     


    }
    google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(dibujarGrafico2);



   function dibujarGrafico2(vn,ve,v6j) {
     // Tabla de datos: valores y etiquetas de la gráfica
     var iniciado = parseInt(vn);
     var proceso = parseInt(ve);
     var finalizado = parseInt(v6j);
    

     var idR = $('#id_area').val();

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

</script>
<body onload="actualizarGrafica()"></body>
<main role="main" class="">
       <div>
      <input type="hidden" name="id_area" id="id_area" value="{{$id_rol}}">

          <!--<button class="btn btn-success float-right" type="button" onclick="actualizarGrafica()"><i class="fas fa-redo-alt"></i>Actualizar gráfica</button>-->
      </div><br><br>
      <div class="col-md-12">
          Unidades
            <div>
              <div id="GraficoGoogleChart-ejemplo-2">
            </div>
      </div>
</main>
@endsection
