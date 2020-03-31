@extends('layouts.new_layout_dashboard')
@section('content_user')
<module-index-component inline-template v-bind:modules="{{$modules}}">
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

                        @include('common.success')

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
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
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Tramite</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <template v-for="module in modules">
                                        <tr>
                                            <td>@{{module.id}}</td>
                                            <td>@{{module.name}}</td>
                                            <td>@{{module.description}}</td>
                                            
                                            <td v-if="module.is_active">
                                                <strong> ACTIVO </strong>
                                            </td>
                                            <td v-else> 
                                                <strong> NA </strong>
                                            </td>
                                            
                                            <td v-if="module.user">
                                                @{{module.user.name}}
                                            </td>
                                                <td v-else> <strong> NULL </strong>
                                            </td>
                                            
                                            <td v-if="module.diligences">
                                                <template v-for="diligence in module.diligences">
                                                    @{{diligence.name}}
                                                </template>
                                            </td>
                                            <td v-else></td>
                                           
                                            
                                            <td class="text-right">
                                                <a v-bind:href="`/modules/${ module.id }/edit/`" class="btn btn-simple btn-info btn-icon"><i class="material-icons">edit</i></a>
    
                                                <button  @click.prevent="borrar(module.id)" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></button>
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
</module-index-component>

@endsection