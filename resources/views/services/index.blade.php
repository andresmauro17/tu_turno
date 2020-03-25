@extends('layouts.new_layout_dashboard')
@section('content_user')
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <service-index-component inline-template>
                    <div>
                        <div class="card" >
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">assignment</i>
                            </div>
            
                            <div class="card-content">
                                <div class="row">
                                    <h4 class="card-title">Servicios</h4>
                                    <div class="toolbar text-right">
                                            <a href="/services/create" class="btn btn-primary btn-just-icon btn-round">
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
                                                <th>Iniciales</th>
                                                <th>Estado</th>
                                                <th>Tramite</th>
                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Iniciales</th>
                                                <th>Estado</th>
                                                <th>Tramite</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>{{$service->name}}</td>
                                                    <td>{{$service->description}}</td>
                                                    <td>{{$service->short_name}}</td>

                                                    @if ($service->is_active == 0)
                                                        <td> <strong> NA </strong></td>
                                                    @else
                                                        <td><strong> ACTIVO </strong></td>
                                                    @endif
                                                    
                                                    
                                                    @if ($service->diligences)
                                                        <td>
                                                            @foreach ($service->diligences as $diligence)
                                                                {{$diligence->name}}, 
                                                            @endforeach
                                                        </td>
                                                    @else
                                                        <td></td>
                                                    @endif  
                                                    
                                                    <td class="text-right">
        
                                                        {{-- <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a> --}}
                                                        
                                                        <a href="/services/{{$service->id}}/edit" class="btn btn-simple btn-info btn-icon"><i class="material-icons">edit</i></a>
                                                        {{-- <a href="/services/create" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a> --}}
                                                        <a href="#" @click.prevent="deleteitem()" class="btn btn-simple btn-danger btn-icon "><i class="material-icons">close</i></a>
                                                        <button class="btn btn-primary btn-fill" onclick='Swal({ title:"Good job!", text: "You clicked the button!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})'>Try me!</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </div>
                </service-index-component>

            </div> <!-- end col-md-12 -->
        </div>
    </div>
@endsection
    
