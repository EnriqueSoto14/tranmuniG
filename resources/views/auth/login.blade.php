@extends('layouts.app')
<script src="js/captcha.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio de sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="formulario">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <!--@ error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{ { $message }}</strong>
                                    </span>
                                @ enderror-->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <!--captcha-->
                        <div class="row">

                        <div style="width: 6%; margin-inline-start: 30%; margin-left: 140px;">
                            <div class="form-group" id="captcha" style="width: 15%;">
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                        <div class="" width="25px" height="25px">
                          <button class="btn btn-default" onclick="refrescar()" height="20px" width="20px" type="button">
                            <img border="0" height="25px" src="/img/reload.ico" title="refrescar el captcha" width="25px"/>
                          </button>
                        </div>
                        <div class="">
                            <input class="form-group" type="text" autocomplete="off" style="width: 230px;margin-inline-start: 120%;margin-left: 0px;" placeholder="Captcha" id="cpatchaTextBox">

                        </div>


                      </div>
                        <!--captcha-->
                        <!--
                        <div class="row">

                        <div style="width: 6%; margin-inline-start: 30%; margin-left: 140px;">
                            <div class="form-group" id="captcha" style="width: 15%;">
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                        <div class="" width="25px" height="25px">
                          <button class="btn btn-default" onclick="refrescar()" height="20px" width="20px" type="button">
                            <img border="0" height="25px" src="../img/reload.ico" title="refrescar el captcha" width="25px"/>
                          </button>
                        </div>
                        <div class="">
                            <input class="form-group" type="text" autocomplete="off" style="width: 325px;margin-inline-start: 120%;margin-left: 0px;" placeholder="Captcha" id="cpatchaTextBox">

                        </div>


                      </div> -->

                        <!--<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" { { old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        { { __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary" onclick="validateCaptcha();">
                                    {{ __('Ingresar') }}
                                </button> 

                                <!--@ if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{ { route('password.request') }}">
                                        { { __('Olvidaste tu contraseña?') }}
                                    </a>
                                @ endif-->
                            </div>
                        </div>
                        <br>
                        {{-- <div class="row justify-content-center" >
                            <a type="button" class="btn btn-light" href='https://buzondr.recide4t.org/public/' target="_blank">
                                <img src="{{asset('img/buzon.png')}}" width="60px" height="60px" />
                                <br>SEGUIMIENTO DUDAS/RECLAMOS
                            </a>
                            <a type="button" class="btn btn-light" href='https://ecm.recide4t.org/public/' target="_blank">
                                <img src="{{asset('img/saludlogo.png')}}" width="60px" height="60px" />
                                <br>EXPEDIENTE MEDICO MUNICIPAL
                            </a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
