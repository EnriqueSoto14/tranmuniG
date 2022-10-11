@extends('layouts.menu')

@section('content')
<div class="content">
    <main> <br><br>
        <h2>Agrega una ubicacion</h2>
        <form action="{{route("store")}}" method="post"></form>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitud">Latitud</label>
                    <input type="text" id="latitud" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitud">Longitud</label>
                    <input type="text" id="longitud" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="mapa" style="width: 100%; height: 400px;"></div>
                {{-- <button type="submit" class="btn btn-primary">Guardar</button> --}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary form-control mt-2" >Guardar</button>
            </div>
        </div>
        
    </main>
</div>
<script>
    function iniciarMapa() {
        var latitud = 17.0793153;
        var longitud = -96.7354613;

        coordenadas = {
            lng: longitud,
            lat: latitud
        }

        generarMapa(coordenadas);            
    }

    function generarMapa(coordenadas) {
        var mapa = new google.maps.Map(document.getElementById('mapa'),{
            zoom: 12,
            center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
        });

        marcador = new google.maps.Marker({
            map: mapa,
            draggable: true,
            position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
        });

/*         marcador.addListener('dragend', function(event) {
            document.getElementById("latitud").value = this.getPosition().lat();
            document.getElementById("longitud").value = this.getPosition().lng();
        }); */

        google.maps.event.addListener(marcador, 'position_changed', function(){
            document.getElementById("latitud").value = this.getPosition().lat();
            document.getElementById("longitud").value = this.getPosition().lng();
        })
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7xEuxdibLSeFa8iPDo4xZl3KJU5Rj2BY&callback=iniciarMapa"></script>
@endsection