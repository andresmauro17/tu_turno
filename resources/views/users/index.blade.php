@extends('layouts.new_layout_dashboard')
@section('content_user')
<user-index-component inline-template v-bind:users="{{$users}}">
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">assignment</i>
                    </div>
    
                    <div class="card-content">
                        <div class="row">
                            <h4 class="card-title">Usuarios</h4>
                            <div class="toolbar text-right">
                                    <a href="/users/create" class="btn btn-primary btn-just-icon btn-round">
                                        <i class="material-icons">add</i>
                                    </a>
                            </div>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <template v-for="user in users">
                                        <tr>
                                            <td>@{{user.id}}</td>
                                            <td>@{{user.name}}</td>
                                            <td>@{{user.email}}</td>

                                            <td v-if="!user.is_active">
                                                <strong> NA </strong>
                                            </td>
                                            <td v-else>
                                                <strong> ACTIVO </strong>
                                            </td>

                                            <td class="text-right">
                                                {{-- ANDRES DIJO Q TE SOLUCIONABA --}}
                                                <a href="`/users/@{user.id}/edit`" class="btn btn-simple btn-info btn-icon"><i class="material-icons">edit</i></a>
    
                                                <button  @click.prevent="borrar(user.id)" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></button>
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
</user-index-component>

@endsection