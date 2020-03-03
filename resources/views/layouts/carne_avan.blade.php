@extends('layouts.new_layout')
@section('carne')
<div class="container">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 head-carne">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 head-logo">
                <img src="{{asset('img/logo.png')}}" alt="">
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-5 col-lg-6">
                    <h1>Carné de Vacunacion</h1>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-5 col-lg-6 table_avanc_info">
                     <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                            <span class="titulo_carne">Nombre: </span>
                                <span>{{$paciente->nombre}}</span>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                            <span class="titulo_carne">Apellido: </span>
                                <span>{{$paciente->apellidos}}</span>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                             <span class="titulo_carne">Fecha de nacimiento: </span>
                                <span>{{$paciente->fecha_nacimiento}}</span>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                             <span class="titulo_carne">Numero de Identificacion: </span>
                               <span>{{$paciente->numdoc}}</span>
                        </div>
                     </div>
                </div>

            </div>
            <div class="row signos_vacunas">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 icono cuadro">
                    <i class="material-icons">
                        aspect_ratio
                    </i>
                    <p>Vacuna No Reportada</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 icono triangulo">
                    <i class="material-icons">
                        change_history
                    </i>
                    <p>Vacuna Aplicada</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 icono circulo">
                    <i class="material-icons">
                        panorama_fish_eye
                    </i>
                    <p>Vacuna Reportada</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 icono p">
                    <i class="material-icons">
                        local_parking
                    </i>
                    <p>Vacuna Pendiente</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 icono star">
                    <i class="material-icons">
                        star_border
                    </i>
                    <p>A Criterio Médico</p>
                </div>
            </div>
        </div>
            <table class="table table-bordered table_avanc">
                <thead>
                    <tr class="etiqueta_v">
                    <th scope="col">PATOLOGIA / DOSIS</th>
                    <th scope="col">AL NACER</th>
                    <th scope="col"><span class="num_dosis">1</span>DOSIS</th>
                    <th scope="col"><span class="num_dosis">2</span>DOSIS</th>
                    <th scope="col"><span class="num_dosis">3</span>DOSIS</th>
                    <th scope="col"><span class="num_dosis">4</span>DOSIS</th>
                    <th scope="col"><span class="num_dosis">5</span>DOSIS</th>
                    <th scope="col">CRITERIO MEDICO</th>
                    <th scope="col">CRETERIO MEDICO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacuna as $vacunas)
                <tr>
                    <th scope="head col">
                        <span class="etiqueta_v ">
                            {{ $vacunas->nombre }}
                        </span>
                    </th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

