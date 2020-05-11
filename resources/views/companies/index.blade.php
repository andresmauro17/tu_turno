@extends('layouts.new_layout_dashboard')
@section('content_user')

<company-index-component inline-template v-bind:companies="{{$companies}}">

    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <template v-for="company in companies">
                            <div class="card card-product">
                                <div class="card-header card-header-image" data-header-animation="true">
                                    <img class="img" src="./images/logo.png">
                                </div>
                                <div class="card-body">
                                    <div class="card-actions text-center">
                                        <a v-bind:href="`/company/${ company.id }/edit/`" class="btn btn-success btn-link">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </div>
                                    <h3 class="card-title">
                                        <strong>@{{company.name}}</strong>
                                    </h3>
                                    <div class="card-description">
                                        <h4>
                                            <strong>NIT</strong> @{{company.nit}}
                                        </h4>
                                    </div>
                                    
                                </div>
                                <div class="card-footer text-center">
                                    <div class="stats">
                                        <h4><i class="material-icons">phone</i> @{{company.phone_number}}</h4>
                                    </div>
                                    <div class="stats">
                                        <h4><i class="material-icons">place</i> @{{company.address}} </h4>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div>
        </div>
    </div>
   
    
</company-index-component>

@endsection