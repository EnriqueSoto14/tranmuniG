@extends('layouts.menu')

@section('content')
<script src="js/TableToExcel.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script class="init" type="text/javascript">
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
<!--<div class="container">-->
    <main role="main" class="">
      <div class="col-md-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style="text-align: left; font-size: 20px;">
          <a href="" accesskey="i">
            <button class="btn btn-outline-secondary" data-func="dt-add"  onclick="" title="inicio" type="button">
                <img height="30px" src="/public/img/logo.png" width="30px"/>
            </button>
            </a>
            &nbsp;Colonias
        </h1>
      </div>
      </div>
     
      <div> &nbsp; &nbsp; &nbsp;<button onclick="tableToExcel('example2', 'Secciones','Secciones')" type="button" class="btn btn-primary" id="exceltabla" name="exceltabla" disabled>EXCEL</button></div>
      <div class="col-md-12">
        <table aria-describedby="example_info" cellspacing="0" class="table table-striped table-bordered dataTable no-footer" id="example" role="grid" style="width: 100%;" width="100%">
                 <thead style="text-align: center;" class="thead-dark" id="panelSocios">
                    <tr>
                         <th style="text-align: center; font-size: 12px;">
                            Colonia
                        </th>
                        <th style="text-align: center; font-size: 12px;" colspan="2">
                            Votos MORENA
                        </th>
                        <th style="text-align: center; font-size: 12px;" colspan="2">
                           Votos OPOSICION
                        </th>
                        <th style="text-align: center; font-size: 12px;">
                            VOTARON
                        </th>
                        <th style="text-align: center; font-size: 12px;">
                            Lista Nominal 
                        </th>
                        
                      
                    </tr>
                      <tr>
                         <th style="text-align: center; font-size: 12px;">
                            
                        </th>
                        <th style="text-align: center; font-size: 12px;">
                            Num votos
                        </th>
                        <th style="text-align: center; font-size: 12px;">
                           %
                        </th>
                        <th style="text-align: center; font-size: 12px;">
                            Num votos
                        </th>
                        <th style="text-align: center; font-size: 12px;">
                            %
                        </th>
                        <th style="text-align: center; font-size: 12px;">
                            
                        </th>
                         <th style="text-align: center; font-size: 12px;">
                            
                        </th>
                        
                      
                    </tr>
                </thead>
                <tbody>
                    @forelse($listaDatos as $arregloDatosItem)
                    <tr>
                        <td style="text-align: left; font-size: 12px;">
                            {{ $arregloDatosItem['colonia'] }}
                        </td>
                        <td style="text-align: center; font-size: 12px;">
                            0
                        </td>
                        <td style="text-align: center; font-size: 12px;">
                            0%
                        </td>
                         <td style="text-align: center; font-size: 12px;">
                            0
                        </td>
                        <td style="text-align: center; font-size: 12px;">
                            0%
                        </td>
                          <td style="text-align: center; font-size: 12px;">
                            0
                        </td>
                        <td style="text-align: center; font-size: 12px;">
                            0%
                        </td>
                       
                     
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
                </tbody>
            </table>
      </div>
      <div class="row">
         
      </div>
      <form id="prueba" class="needs-validation" action="" method="post">
        @csrf
        <!--<button class="btn btn-primary btn-lg" type="submit" onclick="">Probar</button>-->
      </form>
</main>
<!--</div>-->
@endsection
