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
            <form class="form-horizontal" method="POST" action="/modules">
                @csrf
                <div class="row">
                    <label class="col-md-3 label-on-left">Nombre</label>

                    <div class="col-md-9">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3"></label>

                    <div class="col-md-9">
                        <div class="checkbox form-horizontal-checkbox">
                            <label>
                                <input type="checkbox" name="is_active" value="1">
                                Estado
                            </label>
                        </div>
                    </div>
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