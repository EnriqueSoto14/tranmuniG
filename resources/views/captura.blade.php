@extends('layouts.menu')

@section('content')


<script type="text/javascript">
function ejecutarAccion(){
  var opcionE = confirm("¿Esta seguro que desea guardar los datos?");
  
  if (opcionE) {
    document.forms["formulario"].submit();
  }
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
</script>
<main role="main" class="">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Inicio" border=0 height="40px" width="40px"/>
          </a>
          <a href="{{route('PersonalPanel', ['id_rol' => $id_Rol])}}" title="Panel Personal">
            <img style="border:1px solid black;" src="/img/ujus.png" alt="Panel personal" border=0 height="40px" width="40px"/>
          </a><label style="font-size: 18px;">&nbsp;PERSONAL PARA LA UNIDAD DE&nbsp;{{$nom_dep}}</label>
          <br>
          <label style="font-size:15px;">&nbsp;&nbsp;Responsables de la unidad:
            {{$nombres}}
            @foreach($objDatosQ5 as $datos)
                  {{ $datos['name']}} |
              @endforeach
            </label>
        </h1>
      </div>

     <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Captura de Personal</h4>
           <div id="msjGuardar">
            <table>
              <tr>
                <td style="border: medium; color:#1d44e0; font-size:100%; font-weight:bold; text-align: center;">{{ $msj2 }}</td>
              </tr>
              <td><h5 class="mb-3">Datos</h5></td>
            </table>
          </div>
          <form role="form" data-toggle="validator" class="needs-validation form-guardar" novalidate action="{{ route('runCapturaJusticia') }}" name="formulario" method="post">
            @csrf
                <input type="hidden" name="idRol" id="idRol" value="{{$id_Rol ?? ''}}">
            <div class="row">
              <div class="col-md-4 mb-4">
                <label for="nombre">Nombre(s)</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="" autocomplete="off" onkeypress="return checkletra(event)" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-4">
                <label for="apellidop">Apellido Paterno</label>
                <input type="text" class="form-control" name="apellidop" id="apellidop" placeholder="" value="" autocomplete="off" onkeypress="return checkletra(event)" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-4">
                <label for="apellidom">Apellido Materno</label>
                <input type="text" class="form-control" name="apellidom" id="apellidom" placeholder="" value="" autocomplete="off" onkeypress="return checkletra(event)" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="colonia">Colonia</label>
                <input type="text" class="form-control" name="colonia" id="colonia" autocomplete="off" placeholder="" value="" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="calle">Calle(Lote, Mzna, otro)</label>
                <input type="text" class="form-control" name="calle" id="calle" autocomplete="off" placeholder="" value="" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="numext">Número Exterior</label>
                <input type="number" class="form-control" name="numext" id="numext" autocomplete="off" placeholder="" value="" maxlength="10" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>        
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="cp">Código Postal</label>
                <input type="number" class="form-control" name="cp" id="cp" autocomplete="off" placeholder="" value="" maxlength="10" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="telefono">Teléfono</label>
                <input type="number" class="form-control" name="telefono" id="telefono" autocomplete="off" placeholder="" value="" maxlength="10" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="rfc">RFC</label>
                <input type="text" class="form-control" name="rfc" id="rfc" autocomplete="off" placeholder="" value="" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="" value="" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              @if(Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
              <div class="col-md-4 mb-3">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" name="user" id="user" autocomplete="off" placeholder="" value="" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="pass">Password</label>
                <input type="text" class="form-control" name="pass" id="pass" autocomplete="off" placeholder="" value="" required>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
            
            @else
              <div class="col-md-4 mb-3">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" name="user" id="user" autocomplete="off" placeholder="" value="" disabled>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="pass">Password</label>
                <input type="text" class="form-control" name="pass" id="pass" autocomplete="off" placeholder="" value="" disabled>
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>
            </div>
            @endif


             
            
            <hr class="mb-2">
        

           <!-- <button type="button" class="btn btn-success btn-lg" onclick="ejecutarAccion('S')">Guardar y salir</button>
            <input type="hidden" name="opcion" id="opcion"></input> -->
            <button type="submit" class="btn btn-primary btn-lg mr-2" {{-- onclick="ejecutarAccion()" --}}>Guardar</button>
            <a href="{{route('home')}}">
              <button type="button"class="btn btn-dark btn-lg">Cancelar</button>
            </a>    
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
          if (result.isConfirmed) {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Personal guardado',
              showConfirmButton: false,
              timer: 1500
            })
            this.submit();
          }
        })
      });
     </script>

@endsection
