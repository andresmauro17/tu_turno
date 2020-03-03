@extends('layouts.new_layout_dashboard')
    @section('content_user')
<div class="content">
	<div class="container-fluid">
<div class="content">
	<div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon">
                    <i class="material-icons">assignment</i>
                </div>

                <div class="card-content">
                    <h4 class="card-title">Lista de Pacientes</h4>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Numero de Documento</th>
                                    <th class="disabled-sorting text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Numero de Documento</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($pacientes as $paciente)
                                    <tr>
                                        <td>{{$paciente->id}}</td>
                                        <td>{{$paciente->nombre}}</td>
                                        <td>{{$paciente->apellidos}}</td>
                                        <td>{{$paciente->numdoc}}</td>
                                        <td class="text-right">
                                            <a href="{{route('paciente.home.root', [$paciente->numdoc,date('Y-m-d', strtotime($paciente->fecha_nacimiento))])}}" class="btn btn-simple btn-info btn-icon" alt="Editar"><i class="material-icons">visibility</i></a>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{route('pacientes.editar', $paciente->id)}}" class="btn btn-simple btn-info btn-icon" alt="Editar"><i class="material-icons">border_color</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- end content-->
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
  </div>
</div>

@endsection
