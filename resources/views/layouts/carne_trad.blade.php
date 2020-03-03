@extends('layouts.new_layout')
@section('carne')
<div class="container">
    <div class="row ">
        {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 head-carne">
        </div> --}}
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <table class="table table-bordered table_carne_trad">
                <thead>
                    <tr class="etiqueta_v">
                        <th scope="col">VACUNA</th>
                        <th scope="col">DOSIS</th>
                        <th scope="col">PRESENTACION</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">No. LOTE</th>
                        <th scope="col">IPS/FIRMA</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <table class="table table-bordered table_carne_trad">
                <thead>
                    <tr class="etiqueta_v">
                        <th scope="col">VACUNA</th>
                        <th scope="col">DOSIS</th>
                        <th scope="col">PRESENTACION</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">No. LOTE</th>
                        <th scope="col">IPS/FIRMA</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

