@extends('layouts.menu')
@section('content')
<script type="text/javascript">
function verF() {
    var idF = $('select[name="fotos"] option:selected').val();
    $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('traerFoto') }}",
            type:"post",
            data: {idP:idF},
            async: false,
            success: function(result){
              //console.log(result);
              var construirFoto = "<img src='data:image/png;base64,"+result+"'>";
              $('#foto').html(construirFoto);
            }
        });
}
</script>
<body>
</main>

    <br>
	<br>
	<h3 align="center">Seleccione Imagen</h3>
    <br>
    <br>
    <p align= "center">
    <select name="fotos">
    @forelse($datosFotos as $fotos)
        <option value="{{$fotos['id']}}">{{$fotos['nomF']}}</option>
    @empty
        <option>Sin datos</option>
    @endforelse
    </select>
    <button class="btn btn-success" onclick="verF()">Ver foto</button>
    </p>
    <div id="foto"></div>
</main>
@endsection
