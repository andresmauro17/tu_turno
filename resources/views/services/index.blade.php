@extends('layouts.new_layout_dashboard')
@section('content_user')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>

            <div class="card-content">
                <h4 class="card-title">DataTables.net</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Observacines</th>
                                    <th>Iniciales</th>
                                    <th>Estado</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Observacines</th>
                                    <th>Iniciales</th>
                                    <th>Estado</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->observations}}</td>
                                        <td>{{$service->short_name}}</td>
                                        <td>{{$service->is_active}}</td>
                                        <td class="text-right">
                                            <a href="/services/{{$service->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i>  Editar</a>

                                            <a href="/services/create" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i>  Crear</a>
                                            
                                            {{-- <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a> --}}
                                        </td>
                                        <td class="text-right col-md-12" >
                                            <form method="POST" action="/services/{{$service->id}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i> Eliminar</button>
                                            </form>
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
@endsection
    
