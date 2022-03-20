@extends('layouts.menu')
@section('content')
<script type="text/javascript" class="init">




    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        responsive: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
  "language": {
      "emptyTable": "Aun no se registra personal auxiliar"
    }
    
    } );

    table.buttons
    .container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
<main role="main" class="">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
      
          <?php if($area==''){?>
        <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Inicio" border=0 height="40px" width="40px"/>
          </a>
          <a href="{{route('justiciaCaptura', ['id_rol' => $id_rol])}}" title="Agregar personal">
            <img style="border:1px solid black;" alt="Inicio" border="0" height="40px" src="/img/add.png" width="40px"/>
          </a>
          <label style="font-size:15px;">&nbsp; PERSONAL REGISTRADO EN LA UNIDAD DE:&nbsp;{{ $departamento }}</label>
          <br>
          <label style="font-size:10px; color: blue;">&nbsp;AUN NO SE REGISTRA PERSONAL AUXILIAR</label>
                    <br>
          <label style="font-size:15px;">&nbsp;&nbsp;Responsables de la unidad:
             {{$nombres}} @foreach($objDatosQ4 as $datos)
                  {{ $datos['name']}} |
              @endforeach
            </label>
        </h1>
         
       <?php }else{?>
        <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="../img/casa.png" alt="Inicio" border=0 height="40px" width="40px"/>
          </a>
          <a href="{{route('justiciaCaptura', ['id_rol' => $id_rol])}}" title="Agregar personal">
            <img style="border:1px solid black;" alt="Inicio" border="0" height="40px" src="../img/add.png" width="40px"/>
          </a>
          <label style="font-size:15px;">&nbsp;PERSONAL REGISTRADO EN LA UNIDAD DE:&nbsp;{{ $area }}</label>
          <br>
          <label style="font-size:15px;">&nbsp;&nbsp;Responsables de la unidad:
            {{$nombres}} @foreach($objDatosQ4 as $datos)
                  {{ $datos['name']}} |
              @endforeach
             </label>
        </h1>
         <?php }?>
     
      </div>

      <div class="border-bottom mb-3 Tele ">
        <?php if($id_rol==4 && Auth::user()->id){?>
          <p> ¿Aún no estas en el canal de Telegram? <br> ¡Unete!
            <a href="https://t.me/+90QlIU5U8vZiNmE5">
              <img style="height:30px;" alt="Telegram" src="../img/telegrama.png"> 
            </a>
          </p>
        <?php }
          else if($id_rol==5 && Auth::user()->id){?>
            <p> ¿Aún no estas en el canal de Telegram? <br> ¡Unete!
              <a href="https://t.me/+_y-pVDWQv3llYmQx">
                <img style="height:30px;" alt="Telegram" src="../img/telegrama.png"> 
              </a>
            </p>
          <?php }
            else if($id_rol==12 && Auth::user()->id){?>
              <p> ¿Aún no estas en el canal de Telegram? <br> ¡Unete!
                <a href="https://t.me/+9EeFeh-M0ElmYzE5">
                  <img style="height:30px;" alt="Telegram" src="../img/telegrama.png"> 
                </a>
              </p>
            <?php }
              else {?>
              <style>
                div .Tele{
                  visibility: hidden;
                }
              </style>
            <?php }?>
      </div>

     <div class="table-responsive col-md-12 order-md-1">
          <div id="avisos">
            <table>
              <tr>
                <td style="border: medium; color:#1d44e0; font-size:100%; font-weight:bold; text-align: center;"></td>
              </tr>
            </table>
          </div>
          <form class="needs-validation" novalidate method="POST" action="">
            @csrf

            <table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%; ">
              <thead style="text-align: center;" class="thead-dark" id="panel">
               
                  <tr>
                    
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Nombre</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Dirección</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">RFC</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Email</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Teléfono</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Acciones</th>

                  </tr>
               
               
              </thead>
              <tbody>
               
                  @foreach($objDatos as $arregloDatosItem)
                    <tr style="font-size: 10px;">
                          <td ><b>{{ $arregloDatosItem['nombre'] }}</b></td>
                          <td>{{ $arregloDatosItem['direccion'] }}</td>
                          <td>{{ $arregloDatosItem['rfc'] }}</td>
                          <td>{{ $arregloDatosItem['email'] }}</td>
                          <td>{{ $arregloDatosItem['telefono'] }}</td>
                          <td><button type="button" class="btn btn-sm btn-success" style="font-size: 11px;"  title="" disabled><i class="fa fa-pencil" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-sm btn-danger" style="font-size: 11px;"  title="Eliminar personal" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-sm btn-warning" style="font-size: 11px;"  title="Editar personal" ><i class="fas fa-pen-square" aria-hidden="true"></i></button>
                          </td>
                    </tr>
                  
                  @endforeach
              
                  

              </tbody>
            </table>
        </form>

    </div>

  </main>
@endsection