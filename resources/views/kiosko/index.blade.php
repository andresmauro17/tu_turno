@extends('layouts.layout')


@section('app')
    <kiosk-component inline-template>
        <div class="full-page login-page" filter-color="black" data-image="{{asset('img/bg-pricing.jpeg')}}">
            <div class="content">
                <div class="container"> 
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-md-4">
                                <kiosk-card-component inline-template>
                                    <div class="card card-profile card-hidden">
                                        <div class="card-avatar">
                                            <img style="height: 150px; width: 150px;" class="avatar" src="{{asset('img/vacua-bebe.jpg')}}" alt="...">
                                        </div>
                                        <div class="card-content">
                                        <h4 class="card-title"><strong>{{$service->name}}</strong></h4>
                                        </div>
                                        <div class="form-group label-floating">
                                            <p class="control-label">
                                                {{$service->observations}}
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-primary" href="/pdf">VER HTML DEL PDF</a>
                                            <a class="btn btn-rose btn-round" 
                                            href="{{route('imprimir')}}">PEDIR TURNO</a>
                                        </div>
                                    </div>
                                </kiosk-card-component>
                            </div>
                        @endforeach
    
                    </div>
                </div>
            </div>  
        </div>
    </kiosk-component>
@endsection

@section('aditional_scripts')
<script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();
            setTimeout(function(){
        // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
@endsection
