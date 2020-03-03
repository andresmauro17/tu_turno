@extends('layouts.new_layout_dashboard')
    @section('content_user')
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="container-fluid">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <form id="allInputsFormValidation" action="/pacientes/{{$paciente->id}}" method="post" novalidate="novalidate" _lpchecked="1">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                <div class="col-xs-10 col-sm-10 col-md-10	col-lg-10">
                                                        Editar Paciente
                                                </div>
                                                {{-- <div class="col-xs-2 col-sm-2 col-md-2	col-lg-2 logo">
                                                    <img src="{{asset('img/logo.png')}}" alt="" style="">
                                                </div> --}}
                                                </h4>
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-12">
                                                            @if($errors->any())
                                                                <div class="alert alert-danger alert-with-icon">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                                                                    <i class="material-icons" data-notify="icon" >error_outline</i>
                                                                    <span data-notify="message"><b>Los compos con * son obligatorios:</b>
                                                                            <ul>
                                                                                @foreach ($errors->all() as $error)

                                                                                <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                                                                                    <div class="row">
                                                                                        <li>{{ $error }}</li>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                            </ul>
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-content">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="nombre">
                                                                Nombres <star>*</star>
                                                            </label>
                                                        <input type="text" name="nombre" id="nombre" class="form-control" required="" maxlength="100" aria-required="true" value='{{$paciente->nombre}}'>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="apellidos">
                                                                Apellidos <star>*</star>
                                                            </label>

                                                            <input type="text" name="apellidos" id="apellidos" class="form-control" required="" maxlength="100" aria-required="true" value='{{$paciente->apellidos}}'>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="genero">
                                                                Genero <star>*</star>
                                                            </label>
                                                            <select class="selectpicker" data-style="btn dropdown-toggle" multiple data-max-options="1" name="genero" id="id_genero" required="true" aria-required="true" value='{{$paciente->genero}}'>
                                                                <option value=""  disabled>Seleccionar</option>
                                                                <option
                                                                    value="M"
                                                                    @if ($paciente->genero === "M")
                                                                        selected=""
                                                                    @endif>masculino
                                                                </option>
                                                                <option
                                                                    value="F"
                                                                    @if ($paciente->genero === "F")
                                                                        selected=""
                                                                    @endif>femenino
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        {{-- <div class="col-lg-2">
                                                            <label class="control-label" for="tipo_documento">
                                                                Tipo de documento <star>*</star>
                                                            </label>
                                                            <select class="selectpicker" data-style="btn dropdown-toggle" multiple data-max-options="1" name="tipo_documento" id="tipo_documento" required="true" aria-required="true">
                                                                <option value="" disabled>Seleccionar</option>
                                                                <option
                                                                     value="CC"
                                                                    @if ($paciente->tipo_documento === 'CC')
                                                                         selected=""
                                                                    @endif>Cedula
                                                                </option>
                                                                <option
                                                                     value="Ti"
                                                                    @if ($paciente->tipo_documento === 'Ti')
                                                                         selected=""
                                                                    @endif>Tarjeta_identidad
                                                                </option>
                                                                <option
                                                                     value="RC"
                                                                    @if ($paciente->tipo_documento === 'RC')
                                                                         selected=""
                                                                    @endif>Registro_civil
                                                                </option>
                                                                <option
                                                                     value="CE"
                                                                    @if ($paciente->tipo_documento === 'CE')
                                                                         selected=""
                                                                    @endif>Cedula_extrangeria</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label class="control-label" for="numdoc">
                                                                Numero de documento <star>*</star>
                                                            </label>
                                                            <input type="text" name="numdoc" id="numdoc" class="form-control" required="" aria-required="true" value='{{$paciente->numdoc}}'>
                                                        </div> --}}
                                                        <div class="col-lg-5">
                                                            <label class="control-label" for="fecha_nacimiento">
                                                                Fecha de nacimiento, por favor dijite: año/mes/dia<star>*</star>
                                                            </label>
                                                            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control datepicker" required="" aria-required="true" value='{{$paciente->fecha_nacimiento}}'>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <label class="control-label" for="lugar_nacimiento">
                                                                Lugar de nacimiento <star>*</star>
                                                            </label>
                                                            <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" class="form-control" required="true" maxlength="100" aria-required="true" value='{{$paciente->lugar_nacimiento}}'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="control-label" for="nombre_padre">
                                                                Nombre padre <star>*</star>
                                                            </label>
                                                            <input type="text" name="nombre_padre" id="nombre_padre" class="form-control" required="" aria-required="true" value='{{$paciente->nombre_padre}}'>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="control-label" for="documento_padre">
                                                                Numero de documento <star>*</star>
                                                            </label>
                                                            <input type="text" name="documento_padre" id="documento_padre" class="form-control" required="" aria-required="true" value='{{$paciente->documento_padre}}'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="control-label" for="nombre_madre">
                                                                Nombre madre <star>*</star>
                                                            </label>
                                                            <input type="text" name="nombre_madre" id="nombre_madre" class="form-control" required="" aria-required="true" value='{{$paciente->nombre_madre}}'>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="control-label" for="documento_madre">
                                                                Numero de documento <star>*</star>
                                                            </label>
                                                            <input type="text" name="documento_madre" id="documento_madre" class="form-control" required="" aria-required="true" value='{{$paciente->documento_madre}}'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="documento_acudiente">
                                                        Numero de documento acudiente <star>*</star>
                                                    </label>
                                                    <input type="text" name="documento_acudiente" id="documento_acudiente" class="form-control" required="" aria-required="true" value='{{$paciente->documento_acudiente}}'>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="telefono1">
                                                                Telefono 1 <star>*</star>
                                                            </label>
                                                            <input type="text" name="telefono1" id="telefono1" class="form-control" required="" maxlength="100" aria-required="true"  value='{{$paciente->telefono1}}'>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="telefono2">
                                                                Telefono 2<star>*</star>
                                                            </label>
                                                            <input type="text" name="telefono2" id="telefono2" class="form-control" required="" maxlength="100" aria-required="true"  value='{{$paciente->telefono2}}'>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="celular">
                                                                Celular <star>*</star>
                                                            </label>
                                                            <input type="text" name="celular" id="celular" class="form-control" required="" maxlength="100" aria-required="true" value='{{$paciente->celular}}'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="deccion_domicilio">
                                                                Direccion domicilio <star>*</star>
                                                            </label>
                                                            <input type="text" name="direccion_domicilio" id="direccion_domicilio" class="form-control" required="" maxlength="100" aria-required="true" value='{{$paciente->direccion_domicilio}}'>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="barrio">
                                                                Barrio <star>*</star>
                                                            </label>
                                                            <input type="text" name="barrio" id="barrio" class="form-control" required="" maxlength="50" aria-required="true"  value='{{$paciente->barrio}}'>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="control-label" for="ciudad">
                                                                Ciudad
                                                            </label>
                                                            <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50"  value='{{$paciente->ciudad}}'>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="control-label" for="correo1">
                                                                Correo electronico 1
                                                            </label>

                                                            <input type="text" name="correo1" id="correo1" class="form-control" maxlength="100" value='{{$paciente->correo1}}'>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="control-label" for="correo2">
                                                                Correo electronico 2
                                                            </label>
                                                            <input type="text" name="correo2" id="correo2" class="form-control" maxlength="100" value='{{$paciente->correo2}}'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="control-label" for="observaciones">
                                                                Observaciones
                                                            </label>
                                                            <textarea name="observaciones" class = "form-control" rows = "3"  id="observaciones" placeholder = "Escribe las observaciones....." maxlength="500" >{{$paciente->observaciones}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="control-label" for="fecha_ingreso">
                                                                Fecha de ingreso, por favor dijite: año/mes/dia<star>*</star>
                                                            </label>
                                                            <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control datepicker" required="" aria-required="true" value='{{$paciente->fecha_ingreso}}'>
                                                        </div>
                                                        <div class="col-lg-2">
                                                                <label class="control-label" for="peso_al_nacer">
                                                                Peso al nacer<star>*</star>
                                                                </label>
                                                                <input type="text" name="peso_al_nacer" id="peso_al_nacer" class="form-control" required="" aria-required="true" value='{{$paciente->peso_al_nacer}}'>
                                                            </div>
                                                        <div class="col-lg-2">
                                                                <label class="control-label" for="talla_al_nacer">
                                                                Talla al nacer<star>*</star>
                                                                </label>
                                                                <input type="text" name="talla_al_nacer" id="talla_al_nacer" class="form-control" required="" aria-required="true" value='{{$paciente->talla_al_nacer}}'>
                                                            </div>
                                                        <div class="col-lg-5">
                                                                <label class="control-label" for="estado">
                                                                Estado<star>*</star>
                                                                </label>
                                                                <select class="selectpicker" data-style="btn dropdown-toggle" multiple data-max-options="1" name="estado" id="estado" required="true" aria-required="true">
                                                                        <option value="" disabled>Seleccionar</option>
                                                                <h1>{{$paciente->estado}}</h1>
                                                                        <option
                                                                            value="1"
                                                                            @if ($paciente->estado === 1)
                                                                                selected=""
                                                                            @endif
                                                                                >activo</option>
                                                                        <option
                                                                             value="0"
                                                                            @if ($paciente->estado === 0)
                                                                                selected=""
                                                                            @endif
                                                                             >inactivo
                                                                        </option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-info btn-fill btn-lg pull-right">Actualizar</button>
                                                <div class="form-group pull-left">
                                                    <label class="checkbox">
                                                        <star>*</star> indica obligatorios
                                                    </label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

