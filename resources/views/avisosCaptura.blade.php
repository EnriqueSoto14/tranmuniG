@extends('layouts.menu')

@section('content')


<script type="text/javascript">
function ejecutarAccion(){
  var opcionE = confirm("¿Esta seguro que desea guardar este aviso?");
 
  if (opcionE == true) { 
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
          
          <a href="" title="Avisos">
            &nbsp;&nbsp;<img style="border:1px solid black;" src="/img/avisos.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a><label style="font-size: 25px;">&nbsp;CAPTURA DE AVISOS PARA EL PERSONAL</label>&nbsp;
          <br>
         
        </h1>  
        
      </div>

     <div class="col-md-8 order-md-1">
           <div id="msjGuardar">
            <table>
              <tr>
                <td style="border: medium; color:#1d44e0; font-size:100%; font-weight:bold; text-align: center;">{{ $msj2 }}</td>
              </tr>
             
            </table>
          </div>
          <form class="needs-validation form-guardar" novalidate action="{{ route('runCapturaAviso') }}" name="formulario" method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="row">           
              <div class="col-md-4 mb-4">
                <label>Fecha de Publicación:</label>  <label><b>{{$fecha_actual}}</b></label>                 
              </div>
              
              <div class="col-md-8 mb-4">
                <label for="titulo">TÍtulo del aviso</label>
                <input type="text" class="form-control" name="titulo" id="titulo" autocomplete="off" placeholder="" required >
                <div class="valid-feedback"> </div>
                <div class="invalid-feedback">Ingresa datos correctos.</div>
              </div>              
            </div>

            <label>Escriba el aviso para el personal</label>
                <hr class="mb-2">
            <textarea class="form-control" id="aviso" name="aviso" rows="10" cols="50" placeholder="Aviso" style="margin-top: 0px; margin-bottom: 0px; height: 131px;" required></textarea>
            <div class="valid-feedback"> </div>
            <div class="invalid-feedback">Ingresa datos correctos.</div>
            <hr class="mb-2">
            <br>

            <input type="hidden" name="idPer" id="idPer"></input>
            <input type="hidden" name="estat" id="estat"></input>

              <label for="Archivo"></label>
              <input type="file" name="Archivo" id="Archivo" >

            </label></p>
            
            
            
           <!-- <button type="button" class="btn btn-success btn-lg" onclick="ejecutarAccion('S')">Guardar y salir</button>
            <input type="hidden" name="opcion" id="opcion"></input> -->
            <button type="submit" class="btn btn-primary btn-lg" {{-- onclick="ejecutarAccion() --}}">Guardar</button>
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
                  title: 'Avisp guardado',
                  showConfirmButton: false,
                  timer: 5500
                })
                this.submit();
              }
            })
          });
        </script>
@endsection