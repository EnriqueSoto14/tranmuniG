@extends('layouts.menu')
@section('content')
<script src="/public/js/TableToExcel.js"></script>
<script type="text/javascript" class="init">
  $(document).ready(function() {
    var table = $('#example3').DataTable( {
        lengthChange: false,
        responsive: true,
        paging: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
          "language": {
      "emptyTable": "Sin datos"
    }
    } );
  });

    function borrarActividad(id) {
    // body...
    var a = confirm('¿Esta seguro de que desea borrar a esta actividad?');
    var idR= $('#uni').val();
    var idC = id;
    if(a){
        window.location="/public/eliminaActividad/" + idC +"/"+ idR +"";
       
    }
}
function cargarSelectEncargados(id_departamento){
  var idepartamento = id_departamento.value;
  console.log(idepartamento);
  var valores="";
  var valores2="";
  //cachamos el selector
  var encarga = $("#encargadosse");
  var cestatus = $("#vaestatus");

  if(idepartamento>0 || idepartamento!='TODO'){
    $('#hiunidades').val(idepartamento);
    $('#hiencargados').val("");
    $('#hiestatus').val("");
    $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('ajaxNombresEncargadosDepartamentos') }}",
            type:"post",
            data: {Nombre:idepartamento},
            success: function(result){
              console.log(result);
              document.getElementById("encargadosse").disabled = false;
              var numP = result.length;
              // Limpiamos el select
              encarga.find('option').remove();
              valores += "<option value=''>Seleccione una opción</option>";
              valores += "<option value='TODO'>TODO</option>";
              for (var i = 0; i < numP; i++) {
                var idsencargados=result[i].id_encargado;
                var nombresencargados=result[i].nombre_encargado;
                valores +="<option value='"+idsencargados +"'>"+nombresencargados+"</option>";
                ;
              }
              cestatus.find('option').remove();
              valores2 += "<option value=''>Seleccione una opción</option>";
              valores2 += "<option value='TODO'>TODO</option><option value='INICIADO'>INICIADO</option><option value='EN PROCESO'>EN PROCESO</option><option value='FINALIZADO'>FINALIZADO</option>";
              $("#vaestatus").append(valores2);
              $("#encargadosse").append(valores);
            }
        });
  }else{
        //if(idepartamento!="TODO"||idepartamento!='TODO'){
        //}else{
          encarga.find('option').remove();
          cestatus.find('option').remove();
          valores += "<option value=''>Seleccione una opción</option>";
          $("#vaestatus").append(valores);
          $("#encargadosse").append(valores);
          document.getElementById("encargadosse").disabled = true;
          document.getElementById("vaestatus").disabled = true;
        ///}
  }
}
function selectEncarDat(id){
  var encargado=id.value;
  console.log(encargado);
  document.getElementById("vaestatus").disabled = false;
  $('#hiencargados').val(encargado);
}
function selectEstatus(estat){
  var estatus=estat.value;
  console.log(estatus);
  $('#hiestatus').val(estatus);
}
function TraeDatosConsulta(){
  //cachamos los select's
  var unidadesc=$("#unidades").val();
  var encargadosc=$("#encargadosse").val();
  var estatusc=$("#vaestatus").val();
  //ingresamos en hidens valores
  $('#hiunidades').val(unidadesc);
  $('#hiencargados').val(encargadosc);
  $('#hiestatus').val(estatusc);
  //cachamos los valores de los hiddens
  var estatus=$('#hiestatus').val();
  var id_personal=$('#hiencargados').val();
  var id_departamento=$('#hiunidades').val();
  var valores2="";
  var valores3="";
  //limpiamos la tabla
  $('#example3').DataTable();
  $('#example3').DataTable().clear().destroy();
  var idUS = $('#idUS').val();
  if(unidadesc!="TODO"){
    //zona para la consulta por filtros

    $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('ajaxDatosActividades') }}",
            type:"post",
            data: {id_depa:id_departamento,id_encargado:id_personal,estatus:estatus},
            success: function(result){
              console.log(result);
              var numP = result.length;
              if(numP>0){
                  for (var i = 0; i < numP; i++) {
                     valores2+= "<tr><td scope='row' >"+
            "<a href='/public/modificaActividad/"+result[i].actividad+"/"+result[i].id_departamento+"'>"+result[i].actividad +"</a></td><td style='text-align:center;'>" +
                            result[i].nombre+ "</td><td style='text-align: center ;'>" +
                            result[i].fecha_inicio +"</td><td style='text-align: center;'>" +
                            result[i].fecha_fin+ "</td><td style='text-align: center;'>" +
                            result[i].recursos+ "</td>";
                            if(result[i].NOMBRE_DOC == ''){
                              valores2 += "<td></td>";
                            }else{
                              if(idUS == 3 || idUS == 4){
                                valores2 += "<td style='text-align: center;'><button type='button' class='btn btn-info btn-md' onclick='modalarchivos(\"" + result[i].actividad+ "\",\"" +result[i].id_departamento+ "\")'><span class='fa fa-folder-open'></span></button></td>";
                              }else{
                                valores2 += result[i].NOMBRE_DOC+ "</td>" ;
                              }
                            }

                            valores2 += "<td style='text-align: center;'>"+result[i].estatus+ "</td></tr>";
                            //datos para excel
                            valores3+= "<tr><td scope='row' >"+
                            result[i].actividad +"</td><td style='text-align:center;'>" +
                            result[i].nombre+ "</td><td style='text-align: center ;'>" +
                            result[i].fecha_inicio +"</td><td style='text-align: center;'>" +
                            result[i].fecha_fin+ "</td><td style='text-align: center;'>" +
                            result[i].recursos+ "</td><td style='text-align: center;'>" +
                            result[i].NOMBRE_DOC+ "</td><td style='text-align: center;'>" +
                            result[i].estatus+ "</td></tr>";
                  }//termina for
                  $("#table_acti2").html(valores3);
                  $('#example3').find('tbody').append(valores2);
                  $('#example3').DataTable().draw();
                }else{
                  valores2+= "<tr><td>Sin Datos</td></tr>";
                  $('#example3').DataTable();
                  $('#example3').DataTable().draw();
                  $("#table_acti2").html(valores2);
                }
            }
        });
  }else{
    //zona para la consulta de todos
    $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('arregloDATOSTODOS') }}",
            type:"post",
            data: {id_depa:id_departamento},
            success: function(result){
              console.log(result);
              var numP = result.length;
              if(numP>0){
                  for (var i = 0; i < numP; i++) {
                     valores2+= "<tr><td scope='row' >"+
                     "<a href='/public/modificaActividad/"+result[i].actividad+"/"+result[i].id_departamento+"'>"+result[i].actividad +"</a></td><td style='text-align:center;'>" +
                            result[i].nombre+ "</td><td style='text-align: center ;'>" +
                            result[i].fecha_inicio +"</td><td style='text-align: center;'>" +
                            result[i].fecha_fin+ "</td><td style='text-align: center;'>" +
                            result[i].recursos+ "</td>" ;
                            if(result[i].NOMBRE_DOC == ''){
                              valores2 += "<td></td>";
                            }else{
                              if(idUS == 3 || idUS == 4){
                                valores2 += "<td style='text-align: center;'><button type='button' class='btn btn-info btn-md' onclick='modalarchivos(\"" + result[i].actividad+ "\",\"" +result[i].id_departamento+ "\")'><span class='fa fa-folder-open'></span></button></td>";
                              }else{
                                valores2 += result[i].NOMBRE_DOC+ "</td>" ;
                              }
                            }
                            valores2 += "<td style='text-align: center;'>"+ result[i].estatus+ "</td></tr>";
                            //datos para excel
                            valores3+= "<tr><td scope='row' >"+
                            result[i].actividad +"</td><td style='text-align:center;'>" +
                            result[i].nombre+ "</td><td style='text-align: center ;'>" +
                            result[i].fecha_inicio +"</td><td style='text-align: center;'>" +
                            result[i].fecha_fin+ "</td><td style='text-align: center;'>" +
                            result[i].recursos+ "</td><td style='text-align: center;'>" +
                            result[i].NOMBRE_DOC+ "</td><td style='text-align: center;'>" +
                            result[i].estatus+ "</td></tr>";
                  }//termina for
                  $("#table_acti2").html(valores3);
                  $('#example3').find('tbody').append(valores2);
                  $('#example3').DataTable().draw();
                }else{
                  valores2+= "<tr><td scope='row'>Sin Datos</td></tr>";
                  $('#example3').DataTable();
                  $('#example3').DataTable().draw();
                  $("#table_acti2").html(valores2);
                }
            }
        });
  }
}
function tablapdf(){
    //cachamos los select's
  var unidadesc=$("#unidades").val();
  var encargadosc=$("#encargadosse").val();
  var estatusc=$("#vaestatus").val();
  //ingresamos en hidens valores
  $('#hiunidades').val(unidadesc);
  $('#hiencargados').val(encargadosc);
  $('#hiestatus').val(estatusc);
  //cachamos los valores de los hiddens
  var estatus=$('#hiestatus').val();
  var id_personal=$('#hiencargados').val();
  var id_departamento=$('#hiunidades').val();
  var tx = $('select[name="unidades"] option:selected').text();
  if( estatus == ''){
    estatus = 0;
  }
  if( id_personal == ''){
    id_personal = 0;
  }
  if( id_departamento == ''){
    id_departamento = tx;
  }
  var valores2="";
  console.log(estatus+" "+id_personal+" "+id_departamento+" "+tx);
    window.location="/public/descargarPDFGeneral/" + estatus +"/"+id_personal+"/"+id_departamento+"";
        /*$('#descargarPDF').attr("href", "EstadoCuentaDescargarPDF/"+idSocio+"/"+pagosugerido+"/"+importeVendioAbajo+"/"+importeTotalAbajo+"/"+importePagadoAbajo+"/"+importeDiferenciaAbajo+"");*/
}
function exceltable(example2,listaActividades,Actividades){
  var tx = $('select[name="unidades"] option:selected').text();
  if(tx !='Seleccione una opción'){
  }else{
    tx='TODAS LAS UNIDADES';
  }
  $('#nomU').html(tx);
//console.log(example2+' '+listaActividades+' '+Actividades+' '+tx);
tableToExcel(example2,listaActividades,Actividades);
}

function modalarchivos(actividad, id_uni){
  //console.log(actividad+' '+id_uni);
  $('#activinom').html(actividad);
  $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('traerDocsXUni') }}",
        type:"post",
        async:false,
        data: {actividad:actividad,id_uni:id_uni},
        success: function(result){
          console.log(result);
          var valores='';
          var total=result.length;
            //valores ="<select id='promotor' name='promotor' class='form-control'>";
            for (var j = 0; j < total; j++) {
               valores+= "<tr><td scope='row'>"+ result[j].NOMBRE_DOC +"</td>"+
                            "<td><button type='button' class='btn btn-primary' onclick='downloadDoc(\"" + result[j].NOMBRE_DOC + "\",\"" + result[j].RUTA_DOC + "\")'><i class='fa fa-download' aria-hidden='true'></i></button></td></tr>";
                          //name=\"minimoFichas" + indice +"\"
                          //onclick='downloadDoc('"+result[j].NOMBRE_DOC+","+result[j].RUTA_DOC+")
            }

          $('#archivostabla').html(valores);
          $('#exampleModalCenter').modal('show');
        }
      });

}
function downloadDoc(nom,ruta) {
  // body...
  //console.log(nom+' '+ruta);
  $('#ruta').val(ruta);
  $('#nom_doc2').val(nom);

  document.getElementById('formulario2').submit();

}
</script>
<main role="main" class="">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a>
          <a href="" title="Agregar actividad">
            <img style="border:1px solid black;" alt="Inicio" border="0" height="40px" src="/img/add.png" width="40px"/>
          </a>
          <br>
          <label >&nbsp; ESTADÍSTICOS&nbsp;</label>
          <input type="hidden" name="idUS" id="idUS" value="{{Auth::user()->id }}">
        </h1>
      </div>
      <div class="row">
        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        Unidades:
        <select required class="form-select" aria-label="Default select example" id="unidades" name="unidades" onchange="cargarSelectEncargados(this)">
          <option value="" >Seleccione una opción</option>
          <option value="TODO">TODO</option>
          @foreach($objQ as $dato)
             <option value="{{$dato['ID_ROL']}}">{{$dato['NOMBRE_ROL']}}</option>
          @endforeach
        </select>
        <input id="hiunidades" name="hiunidades" type="hidden">
        <input id="hiencargados" name="hiencargados" type="hidden">
        <input id="hiestatus" name="hiestatus" type="hidden">
        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        Encargado:
        <select required class="form-select" aria-label="Default select example" id="encargadosse" name="encargadosse" disabled="" onchange="selectEncarDat(this)">
          <option value="">Seleccione una opción</option>
          <option value="TODO">TODO</option>
        </select>
        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Estatus:
        <select required class="form-select" aria-label="Default select example" id="vaestatus" name="vaestatus" onchange="selectEstatus(this)" disabled="">
          <option value="">Seleccione una opción</option>
          <option value="TODO">TODO</option>
          <option value="INICIADO">INICIADO</option>
          <option value="EN PROCESO">EN PROCESO</option>
          <option value="FINALIZADO">FINALIZADO</option>
        </select>
        <button class="btn btn-primary" onclick="TraeDatosConsulta();" id="btncon" name="btncon" type="submit" >Consultar</button>

      </div>
      <br>

      <input type="hidden" value="" id="uni" name="uni">
&nbsp;&nbsp;&nbsp;&nbsp; <button onclick="exceltable('example2', 'listaActividades','Actividades')" type="button" class="btn btn-primary" id="exceltabla" name="exceltabla">EXCEL</button>
     <button class="btn btn-success" onclick="tablapdf()" title="En construcción">PDF</button>
     <div class="table-responsive col-md-12 order-md-1">
          <div id="avisos">
            <table>
              <tr>
                <td style="border: medium; color:#1d44e0; font-size:100%; font-weight:bold; text-align: center;"></td>
              </tr>
            </table>
          </div>
          <form data-toggle="validator" class="needs-validation form-guardar" novalidate method="POST" action="">
            @csrf
      <table  id="example3" name="example3"class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%;" style="display:none;">
              <thead style="text-align: center;" class="thead-dark" id="panel" style="display: none;">
                  <tr>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Actividad</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="30%">Personal</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de inicio</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de término</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Recursos</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="10%">Nombre de archivo</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Estatus</th>
                  </tr>
              </thead>
              <tbody id="table_acti3" name="table_acti3">
                  @foreach($arreglo as $arregloDatosItem)
                    <tr style="font-size: 12px">
                          <!--<td>{ { $arregloDatosItem['actividad'] }}</td>-->
                         <td><a href="/public/modificaActividad/{{$arregloDatosItem['actividad']}}/{{$arregloDatosItem['id_departamento']}}">{{ $arregloDatosItem['actividad'] }}</a></td>
                          <td><b>
                          <?php
                            $sub = '';
                            $sub = str_replace(",", " <br>", $arregloDatosItem['nombre']);
                            echo $sub;
                          ?>
                        </b></td>
                          <td>{{ $arregloDatosItem['fecha_inicio'] }}</td>
                          <td>{{ $arregloDatosItem['fecha_fin'] }}</td>
                          <td>{{ $arregloDatosItem['recursos'] }}</td>
                          <td style="font-size: 10px">

                          <?php
                            $sub = "";
                            $sub = str_replace(",", "\n", $arregloDatosItem['NOMBRE_DOC']);
                            //$sub="<a>".$sub."</a>";
                            //echo $sub;
                          ?>
                          @if(Auth::user()->id == 4 || Auth::user()->id == 3)
                                @if($arregloDatosItem['NOMBRE_DOC'] == '')

                                @else
                                <button type="button"class="btn btn-info btn-md" onclick="modalarchivos('{{ $arregloDatosItem['actividad'] }}','{{$arregloDatosItem['id_departamento']}}')"><span class="fa fa-folder-open"></span></button>
                                @endif
                          @else
                              {{ $sub }}
                          @endif
                          </td>
                          <td style="text-align:center;">{{ $arregloDatosItem['estatus'] }}</td>
                    </tr>

                  @endforeach
              </tbody>
            </table>

              <table id="example2" style="display:none;">
                 <thead style="text-align: center;" class="thead-dark" id="">
                  <tr>
                      <th colspan="7" style="text-align: center;"><div id="nomU" name='nomU'></div></th>
                    </tr>
                    <tr>
                      <th style="text-align: center; font-size: 12px;" WIDTH="15%">Actividad</th>
                      <th style="text-align: center; font-size: 12px;" WIDTH="15%">Personal</th>
                      <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de inicio</th>
                      <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de termino</th>
                      <th style="text-align: center; font-size: 12px;" WIDTH="15%">Recursos</th>
                      <th style="text-align: center; font-size: 12px;" WIDTH="15%">Nombre de archivo</th>
                      <th style="text-align: center; font-size: 12px;" WIDTH="15%">Estatus</th>
                    </tr>
                </thead>
                <tbody name="table_acti2" id="table_acti2">
                  @foreach($arreglo as $arregloDatosItem)
                    <tr style="font-size: 12px">
                          <td>{{ $arregloDatosItem['actividad'] }}</td>
                          <td><b>{{ $arregloDatosItem['nombre'] }}</b></td>
                          <td>{{ $arregloDatosItem['fecha_inicio'] }}</td>
                          <td>{{ $arregloDatosItem['fecha_fin'] }}</td>
                          <td>{{ $arregloDatosItem['recursos'] }}</td>
                          <td style="font-size: 10px">
                          <?php
                            $sub = '';
                            $sub = str_replace(",", "<br>", $arregloDatosItem['NOMBRE_DOC']);
                            echo $sub;
                          ?>
                          </td>
                          <td style="text-align:center;">{{ $arregloDatosItem['estatus'] }}</td>
                    </tr>

                  @endforeach
                </tbody>
            </table>


        </form>

    </div>

    <form class="needs-validation" action="{{ route('downloadDoc') }}" name="formulario2" id="formulario2" method="post">
            @csrf
            <input type="hidden" name="ruta" id="ruta">
            <input type="hidden" name="nom_doc2" id="nom_doc2">
        </form>

    <div id="exampleModalCenter" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><div id='activinom'></div></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table width="100%" class="table">
          <thead>
            <tr>
              <td><b>NOMBRE DEL ARCHIVO</b></td>
              <td><b>DESCARGA</b></td>
            </tr>
          </thead>
          <tbody id="archivostabla"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

  <script>
    /* Validacion */
 // Example starter JavaScript for disabling form submissions if there are invalid fields
 (function () {
         'use strict'
         window.addEventListener('load', function() {
           // Fetch all the forms we want to apply custom Bootstrap validation styles to
           var forms = document.getElementsByClassName('needs-validation');

           // Loop over them and prevent submission
           var validation = Array.prototype.filter.call(forms, function(form){                  
                   form.addEventListener('submit', function (event) {
                       if (form.checkValidity() === false) {
                           event.preventDefault();
                           event.stopPropagation();   
                             Swal.fire({
                             icon: 'error',
                             title: 'Oops...',
                             text: 'Faltan campos por llenar',
                             /* footer: '<a href="">Why do I have this issue?</a>' */
                           })                           
                       }
                       /* ejecutarAccion(); */
                       form.classList.add('was-validated');
                   }, false);                                            
               });                                    
         }, false);            
 })();
  </script>

@endsection