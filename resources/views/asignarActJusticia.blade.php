@extends('layouts.menu')

@section('content')


<script type="text/javascript">
function ejecutarAccion(){
  var opcionE = confirm("¿Esta seguro que desea guardar los datos?");
  var idP = $('select[name="personal"] option:selected').val();
  $('#idPer').val(idP);
  var status = $('select[name="estatus"] option:selected').val();
 $('#estat').val(status);
 var table = document.getElementById("example");
 var tbodyRowCount = table.tBodies[0].rows.length;
  if (opcionE == true) { 

    if(tbodyRowCount == 0){
      alert("Debe agregar al menos un integrante del personal a la tabla de responsables para la actividad. Antes de guardar por favor seleccione un nombre y de clic en agregar.");
    }else{
      if($('#docu').val()){
        var nomdoc = document.getElementById('docu').files[0].name;
        $('#nom_doc').val(nomdoc);

      }
      document.forms["formulario"].submit();

        //


      
    }
    
  }
}
function archivos(){
 
    document.getElementById('form2').submit();
  
}

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function traerSecciones(id){
 var idP=id.value;
 $('#ingresarSeccion').val(idP);
 
$.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{ { route('traerSeccionesPromotor') }}",
        type:"post",
        async:false,
        data: {idP:idP},
        success: function(result){
          //alert('respuesta'+result.id_socio);
          console.log(result);
          $('#sec').html('');

          var valores='';
          var totalfic=result.length;
         valores ="<select id='promotor' name='promotor' class='form-control'>";
            for (var j = 0; j < totalfic; j++) {
                valores += "<option value='"+result[j].id_promotor+"'>"+result[j].nombre+"</option>";

            }
            valores += "</select>";
          
          $('#sec').html(valores);
        }
      });


}

function otraSeccion(){

 if(document.getElementById('checkIngresarSeccion').checked==true){
  $('#ingresarSeccion').val('');
document.getElementById('ingresarSeccion').hidden = false;
document.getElementById('seccion').disabled = true;
document.getElementById('promotor').disabled = true;
 }else{
  document.getElementById('ingresarSeccion').hidden = true;
 document.getElementById('seccion').disabled = false;
 }
}

function validarSelect(){
var idP = $('select[name="personal"] option:selected').val();

if(idP==0){
 document.getElementById('botagregar').disabled = true;
}else{
 document.getElementById('botagregar').disabled = false;
}

}


function checkletra(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla==32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function agregarPerosnal(){
var personal = $('select[name="personal"] option:selected').text();
var idP = $('select[name="personal"] option:selected').val();
//alert(idP);

 var personalAnteriores = document.getElementById("personalA").innerHTML;

  var cont = parseFloat($('#contSI').val());
      var indice = cont+1;
      $('#contSI').val(indice);
      var nuevoSocio = "<tr><input id='ids"+indice+"' name='ids"+indice+"' type='hidden' value='"+idP+"'><td>"+personal+"</td></tr>";
      $('#personalA').html(personalAnteriores+" "+nuevoSocio);
      $('#personal').find('option:selected').remove();
      document.getElementById('etiqueta').style.color='white';

}

function downloadDoc(nom,ruta) {
  // body...
  //console.log(nom+' '+ruta);
  $('#ruta').val(ruta);
  $('#nom_doc').val(nom);

  document.getElementById('formulario2').submit();

}

function deleteDoc(ruta,iddoc) {
  if(confirm('¿Estas seguro de eliminar este archivo?, se te recomienda descargar una copia del mismo ya que una ves se confirme la eliminacion, no se podra descargar.')){
    $('#ruta3').val(ruta);
    $('#id_doc').val(iddoc);
    document.getElementById('formulario3').submit();
  }else{

  }

}


</script>
<main role="main" class="">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
          
          <a href="{{route('ActividadesPanel',['id_rol'=>$id_Rol])}}" title="Ir al Panel de Actividades">
            &nbsp;&nbsp;<img style="border:1px solid black;" src="/img/actividad.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a><label style="font-size: 25px;">&nbsp;ACTIVIDADES DE PERSONAL PARA LA UNIDAD DE <br>&nbsp;{{$nom_dep}}</label>&nbsp;
          <br>
          <label style="font-size:15px;">&nbsp;&nbsp;Responsables de la unidad:

            {{$nombres}}  @foreach($objDatosQ7 as $datos)
                  {{ $datos['name']}} |
              @endforeach  </label>
        </h1>  
      
      </div>

     <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Asignación de actividades al Personal</h4>
         
           <div id="msjGuardar">
            <table>
              <tr>
                <td style="border: medium; color:#1d44e0; font-size:100%; font-weight:bold; text-align: center;">{{ $msj2 }}</td>
              </tr>
             
            </table>
          </div>
          <form data-toggle="validator" class="needs-validation form-guardar" novalidate action="{{ route('runCapturaActividad') }}" name="formulario" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idRol" id="idRol" value="{{$id_Rol ?? ''}}">
            <div class="row">
              <div class="col-md-4 mb-4">
                <label for="personal">Personal:</label>
                  <select class="form-control" id="personal" name="personal" onchange="validarSelect()" >
                    <option value="0" selected hidden disabled >Seleccione..</option>
                    @if($id_Rol==3)
                    <option value="4">ENRIQUE DE JESUS SEGURA SANTIAGO</option>
                    <option value="38">ANDREA CISNEROS CANSECO</option>
                    @endif
                    @foreach($objDatosQ7 as $dato)
                    <option value="{{$dato['id']}}">{{$dato['name']}}</option>
                    @endforeach
                    @foreach($listaDatos as $dato)
                    <option value="{{$dato['id']}}">{{$dato['nombre']}}</option>
                    @endforeach
                  </select>
                <br>
                <button id="botagregar" type="button" class="btn btn-primary btn-sm" onclick="agregarPerosnal()" disabled>Agregar</button>
              </div>
              <div class="col-md-4 mb-4">
                <label for="fi">Fecha de Inicio:</label>
                <input type="date" name="fi" id="fi" class="form-control" placeholder="Fecha de inicio" value="<?php echo date('Y-m-d'); ?>" >
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">LLena este campo.</div>
              </div>
              <div class="col-md-4 mb-4">
                <label for="ft">Fecha de Término:</label>
                 <input type="date" name="ft" id="ft" class="form-control" placeholder="Fecha de término" value="<?php echo date('Y-m-d'); ?>" >
                 <div class="valid-feedback"> </div>
                 <div class="invalid-feedback">LLena este campo.</div>
              </div>
            </div>
            <label id="etiqueta" style="font-size: 10px; color: red;">Debe haber al menos un responsable asignado a la actividad en esta tabla. Por favor seleccione un nombre y pulse el boton agregar</label>
            <table  id="example" name="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
              <thead style="text-align: center;" class="thead-dark" id="panel">
                <tr>
                  <th style="text-align: center; font-size: 12px;" WIDTH="15%">Responsables de la actividad</th>
                </tr>

              </thead>
              <tbody id="personalA">
               
              </tbody>
              <input type="hidden" name="contSI" id="contSI" value="0">
            </table>

            <br>
            Actividad:
            <textarea required class="form-control" id="actividad" name="actividad" rows="10" cols="50" placeholder="Actividad" style="margin-top: 0px; margin-bottom: 0px; height: 131px;"></textarea>
            <div class="valid-feedback"> </div>
            <div class="invalid-feedback">LLena este campo.</div>
            <hr class="mb-2">
            Recursos:
            <textarea  class="form-control" id="recursos" name="recursos" rows="10" cols="50" placeholder="Recursos" style="margin-top: 0px; margin-bottom: 0px; height: 131px;"></textarea>
             <div class="valid-feedback"> </div>
             {{-- <div class="invalid-feedback">LLena este campo.</div> --}}
             <hr class="mb-2">
             Conclusiones:
             <textarea required class="ckeditor" id="conclusiones" name="conclusiones" rows="10" cols="50" placeholder="Conclusiones" style="margin-top: 0px; margin-bottom: 0px; height: 131px;"></textarea>
             <div class="valid-feedback"> </div>
             {{-- <div class="invalid-feedback">LLena este campo.</div> --}}

               <h4>Evidencias</h4>
               <!--<a href="{ {route('subirArchivo',$id_Rol)}}">
              <button type="button"class="btn btn-dark btn-md">Subir Archivos     <span class="fa fa-upload"></span></button>
            </a>  -->
            <div class="row">
                @csrf
                &nbsp;&nbsp;&nbsp;<h3 >Cargar Archivo(s)</h3>
                <label class="" for="docu">
                  &nbsp;&nbsp;<input  type="file" name="docu[]" id="docu[]"  multiple="multiple">
                </label>
                <input type="hidden" name="id_unidad" id="id_unidad" value="{{$id_Rol}}">
                <input type="hidden" name="nom_doc" id="nom_doc" value="">


        </div>
            <br>
            <br>
            <!--<div class="panel panel-primary">
              <div class="panel-heading">
                <h5 class="panel-title">Descargas Disponibles</h5>
              </div>
              <div class="panel-body">
              <table class="table table-striped">
                <thead>
                  <tr style="background-color: #0C7FF5; color: white;">
                    <th width="7%">#</th>
                    <th width="70%">Nombre del Archivo</th>
                    <th width="13%">Descargar</th>
                    <th width="10%">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  @ foreach($objDatosQF as $datos)
                    <tr>
                      <td width="7%"></td>
                      <td width="70%">{ { $datos['NOMBRE_DOC']}}</td>
                      <td width="13" align="center"><button class="btn " style="color: blue; font-size:18px;" type="button" onclick="downloadDoc('{ { $datos['NOMBRE_DOC']}}','{ {$datos['RUTA_DOC']}}')"> <span class="fa fa-download" aria-hidden="true"></span></button></td>
                      <td width="10%" align="center"><button class="btn" type="button" style="color:red; font-size:18px;" onclick="deleteDoc('{ {$datos['RUTA_DOC']}}','{ {$datos['ID_DOC']}}')"><span class="fa fa-trash" aria-hidden="true"></span></button></td>
                    </tr>
                  @ endforeach



              < !-- < ?php
              $archivos = scandir("subidas");
              $num=0;
              for ($i=2; $i<count($archivos); $i++)
              {$num++;
              ?>
              <p>
               </p>

                  <tr>
                    <th scope="row">< ?php echo $num;?></th>
                    <td>< ?php echo $archivos[$i]; ?></td>
                    <td align="center"><a title="Descargar Archivo" href="/public/subidas/< ?php echo $archivos[$i]; ?>" download="< ?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <span class="fa fa-download" aria-hidden="true"></span> </a></td>
                    <td align="center"><a title="Eliminar Archivo" href="/public/Eliminar.php?name=subidas/< ?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="fa fa-trash" aria-hidden="true"></span> </a></td>
                  </tr>
               < ?php }?> - - >

                </tbody>
              </table>
              </div>
            </div>-->
             <hr class="mb-2">
                 <h3>Estatus</h3>

                <div class="col-md-4 mb-4">
                
                <select class="form-control" id="estatus" name="estatus">
               
                <option value="INICIADO">INICIADO</option>
                <option value="EN PROCESO">EN PROCESO</option>
                <option value="FINALIZADO">FINALIZADO</option>
                
              </select>
              </div>
                  
            <input type="hidden" name="idPer" id="idPer">
            <input type="hidden" name="estat" id="estat">
           <!-- <button type="button" class="btn btn-success btn-lg" onclick="ejecutarAccion('S')">Guardar y salir</button>
            <input type="hidden" name="opcion" id="opcion"></input> -->
            <hr class="mb-2">
            
                <button id="guardarbut" type="submit" class="btn btn-primary btn-lg" {{-- onclick="ejecutarAccion()" --}}>Guardar</button>
            <a href="{{route('home')}}">
              <button type="button"class="btn btn-dark btn-lg">Cancelar</button>
            </a> 
            
             
        </form>
        <form class="needs-validation" action="{{ route('downloadDoc') }}" name="formulario2" id="formulario2" method="post">
            @csrf
            <input type="hidden" name="ruta" id="ruta">
            <input type="hidden" name="nom_doc" id="nom_doc">
        </form>
        <form class="needs-validation" action="{{ route('deleteDoc') }}" name="formulario3" id="formulario3" method="post">
            @csrf
            <input type="hidden" name="ruta3" id="ruta3">
            <input type="hidden" name="id_doc" id="id_doc">
            <input type="hidden" name="idrol3" id="idrol3" value="{{$id_Rol ?? ''}}">
        </form>
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
                                text: 'Faltan campos por llenar o verifique que ya haya agregado a un responsable para la actividad',
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

     <script>
       $('.form-guardar').submit(function(e){
        e.preventDefault();
        Swal.fire({
          title: '¿Esta seguro que desea guardar los datos?',
          /* text: "You won't be able to revert this!", */
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Guardar'            
        }).then((result) => {
          var table = document.getElementById("example");
          var tbodyRowCount = table.tBodies[0].rows.length;
          if (result.isConfirmed ) {
            if (tbodyRowCount == 0){
              e.preventDefault();
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Aun no ha agregado a un responsable de actividad',
              })
            }else {
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Personal guardado',
                showConfirmButton: false,
                timer: 1500
              })
              this.submit();
            }
          }
        })
      });
     </script>

@endsection