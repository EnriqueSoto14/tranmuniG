<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                <a class="nav-link" href="{{ url('/home') }}">
                    Inicio
                </a>
                <!--<div class="sb-sidenav-menu-heading">Modulos</div>-->

                <!-- Modulo de empleados -->
                @if(Auth::user()->ID_ROL_LLAVE_FK == 3 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuTA" aria-expanded="false" aria-controls="menuTA" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Coord. de Transición Adjunta</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                      <div class="collapse" id="menuTA" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 3])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/3">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 3])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 3])}}">Grafica</a>
                            </nav>
                        </div>
                @endif


                @if(Auth::user()->ID_ROL_LLAVE_FK == 4 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPMD" aria-expanded="false" aria-controls="menuPMD" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Plan Municipal de Desarrollo</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                      <div class="collapse" id="menuPMD" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 4])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/4">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 4])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 4])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 5 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuJ" aria-expanded="false" aria-controls="menuJ" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Justicia</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                      <div class="collapse" id="menuJ" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 5])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/5">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 5])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 5])}}">Grafica</a>
                            </nav>
                        </div>

                @endif
                @if(Auth::user()->ID_ROL_LLAVE_FK == 6 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2 || Auth::user()->id == 39 )
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuG" aria-expanded="false" aria-controls="menuG" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Gobernabilidad</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuG" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                           <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 6])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/6">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 6])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 6])}}">Grafica</a>
                            </nav>
                        </div>

                @endif
                @if(Auth::user()->ID_ROL_LLAVE_FK == 7 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuDHAC" aria-expanded="false" aria-controls="menuDHAC" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Desarrollo Humano y Atención Ciudadana</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuDHAC" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                           <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 7])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/7">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 7])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 7])}}">Grafica</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('avisosCaptura', ['id_rol' => 7])}}">Capturar Aviso</a>
                            </nav>
                        </div>

                @endif
                @if(Auth::user()->ID_ROL_LLAVE_FK == 8 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuARHM" aria-expanded="false" aria-controls="menuARHM" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Administración, RH y Materiales</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuARHM" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 8])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/8">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 8])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 8])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 9 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2 || Auth::user()->id == 81)
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu6" aria-expanded="false" aria-controls="menu6" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Desarrollo económico y solidario</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menu6" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                           <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 9])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/9">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 9])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 9])}}">Grafica</a>
                            </nav>
                        </div>

                @endif
                @if(Auth::user()->ID_ROL_LLAVE_FK == 10 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu4" aria-expanded="false" aria-controls="menu4" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Hacienda y Tesorería</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menu4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 10])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/10">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 10])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 10])}}">Grafica</a>
                            </nav>
                        </div>

                @endif
                @if(Auth::user()->ID_ROL_LLAVE_FK == 11 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu5" aria-expanded="false" aria-controls="menu5" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Obras y proyectos</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menu5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 11])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/11">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 11])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 11])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 12 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2 || Auth::user()->id == 39 )
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuTAC" aria-expanded="false" aria-controls="menuTAC" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Territorios, Agencias y Colonias</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuTAC" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 12])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/12">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 12])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 12])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 13 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2 || Auth::user()->id == 42)
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuMCAA" aria-expanded="false" aria-controls="menuMCAA" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Mercados y Ambulantes</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuMCAA" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 13])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/13">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 13])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 13])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                  @if(Auth::user()->ID_ROL_LLAVE_FK == 18 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuCA" aria-expanded="false" aria-controls="menuCA" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Central de Abastos</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuCA" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 18])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/13">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 18])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 18])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 14 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2 || Auth::user()->id == 45 )
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuOMSG" aria-expanded="false" aria-controls="menuOMSG" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Oficialía Mayor y Servicios Generales</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuOMSG" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 14])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/14">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 14])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 14])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 15 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuS" aria-expanded="false" aria-controls="menuS" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Seguridad</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuS" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 15])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/15">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 15])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 15])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 16 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuC" aria-expanded="false" aria-controls="menuC" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Comunicación</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuC" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 16])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/16">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 16])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 16])}}">Grafica</a>
                            </nav>
                        </div>

                @endif

                @if(Auth::user()->ID_ROL_LLAVE_FK == 17 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuCyA" aria-expanded="false" aria-controls="menuCyA" style="font-size:15px;">
                            <div class="sb-nav-link-icon"></div>
                            <B>Cultura y Arte</B>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuCyA" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                             <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('PersonalPanel', ['id_rol' => 17])}}">Personal</a>
                                <!--<a class="nav-link" href="/justiciaCaptura/17">Personal</a>-->
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ActividadesPanel', ['id_rol' => 17])}}">Actividades</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('Graficos', ['id_rol' => 17])}}">Grafica</a>
                            </nav>
                        </div>

                @endif



                <a class="dropdown-item" href="{{ route('EncargadoPanel') }}">
                    <B> Panel de responsables </B>
                </a>

                <!--@ if(Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->id == 4)-->

                        <a class="dropdown-item" href="{{ route('avisosCaptura') }}">
                    <B> Capturar Aviso </B>
                <!--</a>
                @ endif-->
                @if(Auth::user()->ID_ROL_LLAVE_FK == 3 || Auth::user()->ID_ROL_LLAVE_FK == 1 || Auth::user()->ID_ROL_LLAVE_FK == 2)
                        <a class="dropdown-item" href="{{ route('PanelGeneral') }}">
                            <B> Estadísticos </B>
                        </a>

                @endif
                         

                <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Salir') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <label style="font-size: 10px ; color: white; " >SCTM OAX 22/07/2021 v1.00 </label>
        <div class="sb-sidenav-footer">
            <div class="small"></div>
            Copyright &copy; 2021
        </div>

    </nav>
</div>