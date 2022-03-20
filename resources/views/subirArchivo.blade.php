@extends('layouts.menu')
@section('content')
<script type="text/javascript">
  function ejecutarform() {
    var nom = document.getElementById('docu[]').files[0];
    console.log(nom);
    if(nom === undefined){
      console.log('ok');
      alert('Selecciona un archvio por favor');
    }else{
       document.getElementById('formulario').submit();
    }
  }

  function downloadDoc(nom,ruta) {
  // body...
  //console.log(nom+' '+ruta);
  $('#ruta').val(ruta);
  $('#nom_doc2').val(nom);

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


<title>Cargar Ficheros</title>
  <hr class="mb-2">
  <h2>Cargar evidencias</h2>
   <h6>Actividad: {{$actividad}}</h6>
  <hr class="mb-2">
  <label style="font-size: 14px; color: blue;">Puede cargar archivos con extensión .pdf, .xls (excel), .docx (word) , pptx (powerpoint), .jpg y .png (fotos) , .zip o .rar (archivos o carpetas comprimidas)</label>
  <div class="container">
    <div class="row">
      <div class="panel">
        <div class="">
          <h3 class="">Cargar Archivo</h3>
        </div>
      <div class="panel-body">
      <div class="col-lg-12">
        <form id="formulario" method="POST" action="{{ route('addDocXUni2') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="btn " for="doc">
              <input required="" type="file" name="docu[]" id="docu[]" multiple="multiple">
            </label>

            <input type="hidden" name="id_unidad" id="id_unidad" value="{{$id_unidad}}">
            <input type="hidden" name="actividad" id="actividad" value="{{$actividad}}">
            <input type="hidden" name="nom_doc" id="nom_doc" value="">
          </div>
          <button class="btn btn-primary" type="button" onclick="ejecutarform()">Cargar Archivo(s)</button>
          <a href="{{route('ActividadesPanel', ['id_rol' => $id_unidad])}}">
            <button type="button"class="btn btn-success btn-md">Regresar     <span class="fa fa-reply"></span></button>
          </a>
        </form>
      </div>
      <hr class="mb-2">
                 <div class="panel panel-primary">
      <div class="panel-heading">
        <h5 class="panel-title">Descargas Disponibles</h5>
        <label style="font-size:11px; color: blue;">Nota: Solo la persona que haya subido archivos podrá descargarlos y eliminarlos del sistema.</label>
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
    @foreach($objDatosQF as $datos)
      <tr>
        <td width="7%"></td>
        <td width="70%">{{ $datos['NOMBRE_DOC']}}</td>
         @if($datos['PERMISOS'] == 1)
        <td width="13" align="center"><button class="btn " style="color: blue; font-size:18px;" type="button" onclick="downloadDoc('{{ $datos['NOMBRE_DOC']}}','{{$datos['RUTA_DOC']}}')"> <span class="fa fa-download" aria-hidden="true"></span></button></td>
        <td width="10%" align="center"><button class="btn" type="button" style="color:red; font-size:18px;" onclick="deleteDoc('{{$datos['RUTA_DOC']}}','{{$datos['ID_DOC']}}')"><span class="fa fa-trash" aria-hidden="true"></span></button></td>
        @else
        <td width="13" align="center"><button class="btn " style="color: blue; font-size:18px;" type="button" onclick="" disabled title="No puedes descargar este archivo, solo quien lo subio podra realizar esta acción."> <span class="fa fa-download" aria-hidden="true"></span></button></td>
        <td width="10%" align="center"><button class="btn" type="button" style="color:red; font-size:18px;" onclick="" disabled title="No puedes eliminar este archivo, solo quien lo subio podra realizar esta acción."><span class="fa fa-trash" aria-hidden="true"></span></button></td>
        @endif
      </tr>
    @endforeach
<!--< ?php
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
 < ?php }?> -->

  </tbody>
</table>

</div>
</div>
      </div>
    </div>
  </div>
</div>
<form class="needs-validation" action="{{ route('downloadDoc') }}" name="formulario2" id="formulario2" method="post">
            @csrf
            <input type="hidden" name="ruta" id="ruta">
            <input type="hidden" name="nom_doc2" id="nom_doc2">
        </form>
         <form class="needs-validation" action="{{ route('deleteDoc') }}" name="formulario3" id="formulario3" method="post">
            @csrf
            <input type="hidden" name="ruta3" id="ruta3">
            <input type="hidden" name="id_doc" id="id_doc">
            <input type="hidden" name="idrol3" id="idrol3" value="{{$id_unidad ?? ''}}">
        </form>
@endsection