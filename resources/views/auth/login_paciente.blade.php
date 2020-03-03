@extends('layouts.new_layout')
    @section('content_login')

        <div class="row login">
            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                <form method="POST" action="{{ route('buscar_paciente') }}">
                    @csrf
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-12">
                        @if($errors->any())
                            <div class="alert alert-danger alert-with-icon">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                                <i class="material-icons" data-notify="icon" >error_outline</i>
                                @if($errors)
                                    <span data-notify="message"><b>Los compos con * son obligatorios:</b>
                                            <ul>
                                                @foreach ($errors->all() as $error)

                                                    <div class="col-xs-12 col-sm-5 col-md-12 col-lg-12">
                                                        <div class="row">
                                                            <li>{{ $error }}</li>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </ul>
                                    </span>
                                @endif
                            </div>
                        @endif
                        @if(isset($message))
                            <div class="alert alert-danger alert-with-icon">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                                <i class="material-icons" data-notify="icon" >error_outline</i>
                                    <span data-notify="message"><b>Error:</b>
                                            <ul>
                                                <div class="col-xs-12 col-sm-5 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <li>{{ $message }}</li>
                                                    </div>
                                                </div>
                                            </ul>
                                    </span>

                            </div>
                        @endif
                    </div>
                    <div class="card card-login card-hidden">
                        <div class="card-header text-center primary" data-background-color="black">
                            <h4 class="card-title">Iniciar sesion paciente</h4>
                        </div>
                        <div class="card-content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">event_note</i>
                                </span>

                                <div class="form-group">
                                    <label class="control-label">Fecha de Nacimiento</label>

                                    <input id="fechaExpedicion" name="fecha_naci" type="date" class="form-control"   autofocus>
                                    <!-- input with datetimepicker -->


                                </div>
                            </div>


                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">assignment_ind</i>
                                </span>

                                <div class="form-group label-floating">
                                    <label class="control-label">Numero de Identificacion</label>
                                    <input id="num_ident" type="text" class="form-control" name="num_ident" value=""  autofocus>

                                </div>
                            </div>

                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-success primary">
                                {{ __('Acceder') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

