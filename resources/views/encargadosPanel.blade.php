@extends('layouts.menu')
@section('content')
<script type="text/javascript" class="init">
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        responsive: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );

    table.buttons
    .container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
<main role="main" class="">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       @if(Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                 <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a><label style="font-size:15px;">&nbsp;RESPONSABLES DE LAS UNIDADES</label>
        </h1>
                @else
                 <h1 class="h2">
          <a href="{{ url('/home') }}" title="Inicio">
            <img style="border:1px solid black;" src="/img/casa.png" alt="Panel" border=0 height="40px" width="40px"/>
          </a><label style="font-size:15px;">&nbsp;RESPONSABLES DE LA UNIDAD DE:&nbsp;{{ $area }}</label>
        </h1>
                @endif
       
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

            <table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" aria-describedby="example_info" role="grid" style="width: 100%;">
              <thead style="text-align: center;" class="thead-dark" id="panel">
                @if(Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                  <tr>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Unidad</th>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Responsable</th>
                   
                  </tr>
                @else
                  <tr>
                    <th style="text-align: center; font-size: 12px;" WIDTH="15%">Responsable</th>
                  </tr>
                @endif
              </thead>
              <tbody>
                @if(Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                  @forelse($objDatos as $arregloDatosItem)
                    <tr style="font-size: 12px;">
                          <td><b>{{ $arregloDatosItem['area'] }}</b></td>
                          <td><b>{{ $arregloDatosItem['nombre'] }}</b></td>
                          
                    </tr>
                  @empty
                      <div class="col-md-6 mb-12">
                          <td>
                              <div id="tipoFichas">
                                  Sin datos
                              </div>
                          </td>
                      </div>
                  @endforelse
                @else
                  @forelse($objDatos as $arregloDatosItem)
                    <tr style="font-size: 12px;">
                          <td><b>{{ $arregloDatosItem['nombre'] }}</b></td>
                    </tr>
                  @empty
                      <div class="col-md-6 mb-12">
                          <td>
                              <div id="tipoFichas">
                                  Sin datos
                              </div>
                          </td>
                      </div>
                  @endforelse
                @endif

              </tbody>
            </table>
        </form>

    </div>

  </main>
@endsection
