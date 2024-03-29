@extends('layouts.new_layout_dashboard')
@section('content_user')
<service-index-component inline-template v-bind:services="{{$services}}">
    <div class="row">
        <div class="row">
            <div class="col-md-12">
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

                        @include('common.success')

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Iniciales</th>
                                        <th>Estado</th>
                                        <th>Tramite</th>
                                        <th>Consecutivo</th>
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
                                        <th>Consecutivo</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <template v-for="service in services">
                                        <tr>
                                            <td>@{{service.name}}</td>
                                            <td>@{{service.description}}</td>
                                            <td>@{{service.short_name}}</td>

                                            <td v-if="service.is_active">
                                                <strong> ACTIVO </strong>
                                            </td>
                                            <td v-else>
                                                <strong> NA </strong>
                                            </td>

                                            <td v-if="service.diligences">
                                                <template v-for="diligence in service.diligences">
                                                    @{{diligence.name}}
                                                </template>
                                            </td>
                                            <td v-else></td>

                                            <td >@{{service.consecutive_number}}</td>

                                            <td class="text-right">

                                                <button  @click.prevent="reiniciar(service.id)" class="btn btn-danger btn-just-icon btn-round">
                                                    <i class="material-icons">swap_calls</i>
                                                </button>

                                                <a v-bind:href="`/services/${ service.id }/edit/`" class="btn btn-simple btn-info btn-icon">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                    
                                                <button  @click.prevent="borrar(service.id)" class="btn btn-simple btn-danger btn-icon">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end content-->
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div>
    </div>
</service-index-component>
@endsection
    
