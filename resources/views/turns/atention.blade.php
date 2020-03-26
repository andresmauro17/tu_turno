@extends('layouts.new_layout_dashboard')
@section('content_user')
<atending-component inline-template :user-module="{{$module}}">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h1>hola {{$module->diligences}}</h1> --}}
                    <div class="col-lg-5 col-md-6 col-sm-3" v-if="userModule.diligences.length > 1 ">
                        <select v-model="selectDiligence" class="selectpicker" data-style="btn btn-primary btn-round"  data-size="7">
                            <template v-for="diligence in userModule.diligences">
                                <option>@{{diligence.name}}</option>
                            </template>                            
                        </select>
                    </div>

                    <atending-card-component inline-template :atending-data = "atendingData">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">phone_in_talk</i>
                            </div>
            
                            <div class="card-content">
                                <div class="row">
                                    <h4 class="card-title">Administrador de Turno {{Route::currentRouteName()}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="text-center"><i class="material-icons">face</i> Turno Actual</h2>
                                                <p class="text-center"> <b>@{{currentTurn}}</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="text-center"><b>Estado</b></h4>
                                                <p class="text-center">@{{turnState}}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="text-center"><b>Tiempo de atencion</b></h4>
                                                <p class="text-center">@{{turnTimeAtention}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="text-center"><b>Turnos en Espera:</b></h4>
                                                <p class="text-center">@{{turnsWaiting}}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="text-center"><b>Tiempo de espera</b></h4>
                                                <p class="text-center">@{{waitQueueTime}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="text-center"><b>Turnos Atendidos:</b></h4>
                                                <p class="text-center">@{{turnState}}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="text-center"><b>Tiempo promedio</b></h4>
                                                <p class="text-center">@{{averageTime}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button @click="nexTurn" class="btn btn-lg btn-primary btn-round btn-block">
                                                    <i class="material-icons">navigate_next</i> Siguiente
                                                </button>
                                                <br>
                                                <button @click="callAgain" class="btn btn-warning btn-round btn-block">
                                                    <i class="material-icons">call</i> LLamar de nuevo
                                                </button>
                                                <br>
                                                <button @click="atendTurn" class="btn btn-success btn-round btn-block">
                                                    <i class="material-icons">check</i> Atender
                                                </button>
                                                <br>
                                                <button @click="finishTurn" class="btn btn-rose btn-round btn-block">
                                                    <i class="material-icons">block</i> Finalizar
                                                </button>
                                                <br>
                                                <button @click="cancelTurn" class="btn btn-danger btn-round btn-block">
                                                    <i class="material-icons">delete</i> Anular
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
    
                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </atending-card-component>
                </div> <!-- end col-md-12 -->
            </div>
        </div>
    </atending-component>
@endsection
    
