@extends('layouts.new_layout_dashboard')
@section('content_user') 

<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">contacts</i>
        </div>
        <div class="card-content">
            <div class="row">
                <h4 class="card-title">Empresa</h4>
                <div class="toolbar text-right">
                    <a href="/company" class="btn btn-primary btn-just-icon btn-round">
                        <i class="material-icons">keyboard_backspace</i>
                    </a>
                </div>
            </div>

            @include('common.errors')

            <form class="form-horizontal" method="POST" action="/company/{{$company->id}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <label class="col-md-3 label-on-left">Nombre</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name}}" placeholder="Nombre de la Empresa">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Nit</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="nit" class="form-control" value="{{ $company->nit}}" placeholder="111222333-4">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Direccion</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="address" class="form-control" value="{{ $company->address}}" placeholder="Direccion Empresarial">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Telefono</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $company->phone_number}}" placeholder="Numero de Contacto">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 mt-3"></label>

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