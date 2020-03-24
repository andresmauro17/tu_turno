@extends('layouts.new_layout_dashboard')
@section('content_user')
<div class="row">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>

                <div class="card-content">
                    <div class="row">
                        <h4 class="card-title">Modulos</h4>
                        <div class="toolbar text-right">
                                <a href="/modules/create" class="btn btn-primary btn-just-icon btn-round">
                                    <i class="material-icons">add</i>
                                </a>
                        </div>
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                    <th>Tramite</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                    <th>Tramite</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($modules as $module)
                                    <tr>
                                        <td>{{$module->name}}</td>
                                        <td>{{$module->description}}</td>
                                        
                                        @if ($module->is_active == 0)
                                            <td> <strong> NA </strong></td>
                                        @else
                                            <td><strong> ACTIVO </strong></td>
                                        @endif

                                        @if ($module->user)
                                            <td>{{$module->user->name}}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if ($module->diligences)
                                            <td>
                                                @foreach ($module->diligences as $diligence)
                                                    {{$diligence->name}}, 
                                                @endforeach
                                            </td>
                                        @else
                                            <td></td>
                                        @endif  
                                        
                                        
                                        <td class="text-right">

                                            {{-- <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a> --}}
                                            
                                            <a href="/modules/{{$module->id}}/edit" class="btn btn-simple btn-info btn-icon"><i class="material-icons">edit</i></a>
                                            {{-- <a href="/services/create" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a> --}}
                                            <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- end content-->
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div>
</div>
@endsection