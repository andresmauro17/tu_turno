@extends('layouts.new_layout')
    @section('content_option_carnet')
        <div class="row align-items-center login">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card card-pricing card-raised mx-auto"  style="margin:5% 5% 10% 25%;width:300px;">
                    <div class="card-content">
                        <h6 class="category">Carne Avanzado</h6>
                        <div class="icon icon-rose">
                            <i class="material-icons">recent_actors</i>
                        </div>
                    <a  href="{{route('paciente.home.carnet-avanzado', [ $noDoc,$birthDate ])}}" class="btn  btn-round">Ver mas</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card card-pricing card-raised mx-auto"  style="margin:5% 5% 10% 25%;width:300px;">
                    <div class="card-content">
                        <h6 class="category">Carne Tradicial</h6>
                        <div class="icon icon-rose">
                            <i class="material-icons">contacts</i>
                        </div>
                    <a  href="{{route('paciente.home.carnet-tradicional', [ $noDoc,$birthDate ])}}" class="btn  btn-round">Ver mas</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
