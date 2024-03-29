@extends('layouts.new_layout_dashboard')
@section('content_user') 

<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">contacts</i>
        </div>
        <div class="card-content">
            <div class="row">
                <h4 class="card-title">Modulo</h4>
                <div class="toolbar text-right">
                        <a href="/modules" class="btn btn-primary btn-just-icon btn-round">
                            <i class="material-icons">keyboard_backspace</i>
                        </a>
                </div>
            </div>

            @include('common.errors')

            <form class="form-horizontal" method="POST" action="/modules/{{$module->id}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <label class="col-md-3 label-on-left">Nombre</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="name" class="form-control" value="{{$module->name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Descripcion</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="description" class="form-control" value="{{$module->description}}">
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <legend>Seleccionar Tramites</legend>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <select class="selectpicker" data-style="select-with-transition" multiple title="Tramites Actuales" data-size="7" name="diligences[]">
                                        
                                        @foreach ($diligences as $diligence)
                                            @if($module->diligences->find($diligence->id))
                                                <option selected value="{{$diligence->id}}"> {{$diligence->name}} </option>
                                            @else
                                                <option value="{{$diligence->id}}"> {{$diligence->name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 label-on-left">Usuarios</label>

                    <div class="col-lg-8 ">

                        @if ($module->user)
                            <select class="selectpicker" data-style="btn btn-primary btn-round" title="{{$module->user->name}}" data-size="7" name="user_id">
                                <option selected value="{{$module->user->id}}">{{$module->user->name}}</option>
                                <option value="">QUITAR USUARIO</option>
                                @foreach ($users as $user)
                                    @if($module->user_id == $user->id || $user->module || $user->is_active == null)
                                        <option disabled>{{$user->name}}</option>
                                    @else
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Seleccionar Usuario" data-size="7" name="user_id">
                                @foreach ($users as $user)
                                    @if($module->user_id == $user->id || $user->module || $user->is_active == null)
                                        <option disabled>{{$user->name}}</option>
                                    @else
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>

                </div>

                @include('checkBox.check')

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