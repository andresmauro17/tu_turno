@extends('layouts.new_layout_dashboard')
@section('content_user') 

<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">contacts</i>
        </div>
        <div class="card-content">
            <div class="row">
                <h4 class="card-title">Usuario</h4>
                <div class="toolbar text-right">
                        <a href="/users" class="btn btn-primary btn-just-icon btn-round">
                            <i class="material-icons">keyboard_backspace</i>
                        </a>
                </div>
            </div>

            @include('common.errors')

            <form class="form-horizontal" method="POST" action="/users/{{$user->id}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <label class="col-md-3 label-on-left">Nombre</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Email</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Contraseña</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="password" class="form-control" value="{{$user->password}}">
                        </div>
                    </div>
                </div>
                
                @include('checkBox.check')
                
                <div class="row">
                    <label class="col-md-3"></label>

                    <div class="col-md-9">
                        <div class="form-group form-button">
                            <button type="submit" class="btn btn-fill btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection