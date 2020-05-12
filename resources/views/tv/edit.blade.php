@extends('layouts.new_layout_dashboard')
@section('content_user') 

<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">contacts</i>
        </div>
        <div class="card-content">
            <div class="row">
                <h4 class="card-title">Informacion TV</h4>
                <div class="toolbar text-right">
                    <a href="/tv" class="btn btn-primary btn-just-icon btn-round">
                        <i class="material-icons">keyboard_backspace</i>
                    </a>
                </div>
            </div>

            {{-- @include('common.errors') --}}

            <form class="form-horizontal" method="POST" action="/tv/{{$tv->id}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <label class="col-md-3 label-on-left">Mensaje Movil</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="message" class="form-control" value="{{$tv->message}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">URL Video</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="url" class="form-control" placeholder="Selecciona despues de /watch?v=  ">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Turnos Maximos</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="number" name="turn_max" class="form-control" value="{{$tv->turn_max}}">
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