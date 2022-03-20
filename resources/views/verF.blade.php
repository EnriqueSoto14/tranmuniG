@extends('layouts.menu')
@section('content')
<script type="text/javascript">
function mostrarfoto(idP) {
    var idP = idP;
    $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('traerFoto') }}",
            type:"post",
            data: {idP:idP},
            async: false,
            success: function(result){
              //console.log(result);
              var construirFoto = "<img src='data:image/png;base64,"+result+"'>";
              $('#foto').html(construirFoto);
            }
        });
  }
</script>

<body onload="mostrarfoto({{$idFoto}})">

    <p>Numero de Foto:<input type='text' id='id' name='id' value="{{$idFoto}}" disabled /></p> 
    
    <div id="foto"></div>
    
</body>
@endsection