@extends('layouts.menu')
@section('content')
<script src="../js/TableToExcel.js"></script>
<script type="text/javascript" class="init">
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        responsive: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
          "language": {
      "emptyTable": "Aun no se registran actividades"
    }
    } );

    table.buttons
    .container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

    function borrarActividad(id) {
    // body...
    var a = confirm('¿Esta seguro de que desea borrar a esta actividad?');
    var idR= $('#uni').val();
    var idC = id;
    if(a){
        window.location="/eliminaActividad/" + idC +"/"+ idR +"";
       
    }
}

function tablapdf() {
  var unidad = $('#uni').val();
  window.location="/descargarPDF/" + unidad +"";

}

</script>
<main role="main" class="">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
      <?php if($area=='ADMINISTRACION'){?>
        <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a>
          <a href="{{route('justiciaActividades', ['id_rol' => $id_rol])}}" title="Agregar actividad">
            <img style="border:1px solid black;" alt="Inicio" border="0" height="40px" src="/img/add.png" width="40px"/>
          </a>
          <label style="font-size:15px;">&nbsp; ACTIVIDADES ASIGNADAS A LA UNIDAD DE:&nbsp;{{ $area }}</label>
          <br>
          <label style="font-size:13px;">&nbsp;&nbsp;Responsables de la unidad: {{$nombres}}  @foreach($objDatosQ6 as $datos)
                  {{ $datos['name']}} | 
              @endforeach </label>
        </h1>
          <?php }elseif($area==''){?>
        <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a>
          <a href="{{route('justiciaActividades', ['id_rol' => $id_rol])}}" title="Agregar actividad">
            <img style="border:1px solid black;" alt="Inicio" border="0" height="40px" src="/img/add.png" width="40px"/>
          </a>
          <label style="font-size:15px;">&nbsp; ACTIVIDADES ASIGNADAS A LA UNIDAD DE:&nbsp;{{ $departamento }}</label>
          <label style="font-size:10px; color: blue;">&nbsp;AUN NO SE REGISTRAN ACTIVIDADES</label>
          <br>
          <label style="font-size:13px;">&nbsp;&nbsp;Responsables de la unidad: {{$nombres}} @foreach($objDatosQ6 as $datos)
                  {{ $datos['name']}} | 
              @endforeach </label>
         
        </h1>
         
       <?php }else{?>
        <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a>
          <a href="{{route('justiciaActividades', ['id_rol' => $id_rol])}}" title="Agregar actividad">
            <img style="border:1px solid black;" alt="Inicio" border="0" height="40px" src="/img/add.png" width="40px"/>
          </a>
          <label style="font-size:15px;">&nbsp;ACTIVIDADES ASIGNADAS A LA UNIDAD DE:&nbsp;{{ $area }}</label>
          <br>
           <label style="font-size:13px;">&nbsp;&nbsp;Responsables de la unidad: @foreach($objDatosQ6 as $datos)
                  {{ $datos['name']}} | 
              @endforeach {{$nombres}}</label>
        </h1>
         <?php }?>
    
      </div>
      <input type="hidden" value="{{$id_rol}}" id="uni" name="uni">
&nbsp;&nbsp;&nbsp;&nbsp; <button onclick="tableToExcel('example2', 'listaActividades','Actividades')" type="button" class="btn btn-primary" id="exceltabla" name="exceltabla">EXCEL</button>
     <button class="btn btn-success" onclick="tablapdf()">PDF</button>
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

            <table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%;">
              <thead style="text-align: center;" class="thead-dark" id="panel">
               
                  <tr>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Actividad</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Personal</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de inicio</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de término</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Recursos</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Subir/Descargar archivos</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Estatus</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Acciones</th>

                  </tr>
               
               
              </thead>
              <tbody>
               
                  @foreach($objDatos as $arregloDatosItem)
                    <tr style="font-size: 12px">
                          <td><a href="../modificaActividad/{{$arregloDatosItem['actividad']}}/{{$id_rol}}">{{ $arregloDatosItem['actividad'] }}</a></td>
                          <td><b>{{ $arregloDatosItem['nombre'] }}</b></td>
                          <td>{{ $arregloDatosItem['fecha_inicio'] }}</td>
                          <td>{{ $arregloDatosItem['fecha_fin'] }}</td>
                          <td>{{ $arregloDatosItem['recursos'] }}</td>
                          <td align="center"><a href="/subirArchivo/{{$id_rol}}/{{$arregloDatosItem['actividad']}}">
                             <button type="button"class="btn btn-info btn-md"><span class="fa fa-folder-open"></span></button>
                               </a> </td>
                          <td>{{ $arregloDatosItem['estatus'] }}</td>
                          <td><button type="button" class="btn btn-sm btn-danger" style="font-size: 11px;"  title="Eliminar Actividad" onclick="borrarActividad({{ $arregloDatosItem['id_actividad'] }})"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                    </tr>
                  
                  @endforeach
              
                  

              </tbody>
            </table>

              <table id="example2" style="display:none;">
                 <thead style="text-align: center;" class="thead-dark" id="">
                     <tr>
                      <th colspan="7" style="text-align: center;">{{ $area }}</th>
                    </tr>
                    <tr>
                       <th style="text-align: center; font-size: 12px;" WIDTH="15%">Actividad</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Personal</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de inicio</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Fecha de termino</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Recursos</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Archivos</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Estatus</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($objDatos as $arregloDatosItem)
                    <tr style="font-size: 12px">
                          <td>{{ $arregloDatosItem['actividad'] }}</td>
                          <td><b>{{ $arregloDatosItem['nombre'] }}</b></td>
                          <td>{{ $arregloDatosItem['fecha_inicio'] }}</td>
                          <td>{{ $arregloDatosItem['fecha_fin'] }}</td>
                          <td>{{ $arregloDatosItem['recursos'] }}</td>
                          <td style="font-size: 10px">
                          <?php
                            $sub = '';
                            $sub = str_replace(",", " \n </li><li> ", $arregloDatosItem['docs']);
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

  </main>
@endsection