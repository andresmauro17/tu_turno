@extends('layouts.new_layout_dashboard')
@section('content_user')
<diligence-index-component inline-template v-bind:diligences="{{$diligences}}">
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">assignment</i>
                    </div>
    
                    <div class="card-content">
                        <div class="row">
                            <h4 class="card-title">Tramites</h4>
                            <div class="toolbar text-right">
                                    <a href="/diligences/create" class="btn btn-primary btn-just-icon btn-round">
                                        <i class="material-icons">add</i>
                                    </a>
                            </div>
                        </div>

                        @include('common.success')

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <template v-for="diligence in diligences">
                                        <tr>
                                            <td>@{{diligence.id}}</td>
                                            <td>@{{diligence.name}}</td>
    
                                            <td class="text-right">
                                                {{-- ANDRES DIJO Q TE SOLUCIONABA --}}
                                                <a href="`/diligences/@{diligence.id}/edit`" class="btn btn-simple btn-info btn-icon"><i class="material-icons">edit</i></a>
    
                                                <button  @click.prevent="borrar(diligence.id)" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></button>
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
</diligence-index-component>

@endsection