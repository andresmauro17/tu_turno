@extends('layouts.new_layout_dashboard')
@section('content_user') 

<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">contacts</i>
        </div>
        <div class="card-content">
            <div class="row">
                <h4 class="card-title">Cliente</h4>
                <div class="toolbar text-right">
                    <a href="/clients" class="btn btn-primary btn-just-icon btn-round">
                        <i class="material-icons">keyboard_backspace</i>
                    </a>
                </div>
            </div>

            @include('common.errors')

            <form class="form-horizontal" method="POST" action="/clients/{{$client->id}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <label class="col-md-3 label-on-left">Nombre</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="name" class="form-control" value="{{$client->name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Apellido</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="lastname" class="form-control" value="{{$client->lastname}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Telefono</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="phone_number" class="form-control" value="{{$client->phone_number}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">DNI</label>

                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <select class="selectpicker" data-style="btn btn-primary btn-round" title="Seleccionar DNI" data-size="8" name="type_dni">
                            <option selected>{{$client->type_dni}}</option>
                            <option value="1">CC </option>
                            <option value="2">TI </option>
                            <option value="3">RC</option>
                            <option value="4">CE</option>
                            <option value="5">AS</option>
                            <option value="6">MS </option>
                            <option value="7">PS</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left"># Documento</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="dni" class="form-control" value="{{$client->dni}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Sexo</label>

                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <select class="selectpicker" data-style="btn btn-primary btn-round" title="Seleccionar Sexo" data-size="3" name="sex">
                            <option selected>{{$client->sex}}</option>
                            <option value="1">F</option>
                            <option value="2">M</option>
                        </select>
                    </div>
                </div>

                @include('checkBox.check')

                <div class="row">
                    <label class="col-md-3"></label>

                </div>

                <div class="row">
                    <label class="col-md-3"></label>

                    <div class="col-md-9">
                        <div class="form-group form-button">
                            <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection