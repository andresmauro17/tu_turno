@extends('layouts.new_layout_dashboard')
@section('content_user') 

<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">contacts</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Servicio</h4>
            <form class="form-horizontal" method="POST" action="/services/{{$service->id}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <label class="col-md-3 label-on-left">Nombre</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="name" class="form-control" value="{{$service->name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Observaciones</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="observations" class="form-control" value="{{$service->observations}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Iniciales</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="short_name" class="form-control" value="{{$service->short_name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3"></label>

                    <div class="col-md-9">
                        <div class="form-group form-button">
                            <button type="submit" class="btn btn-fill btn-rose">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection