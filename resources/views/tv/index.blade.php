@extends('layouts.layout')

@section('app')
	<tv-component inline-template>
		<div>
			<div class="row">
				<div class="col-md-8" style="padding-top: 3%">
					<div class="card">
						<div class="card-header card-header-icon" data-background-color="blue">
							<i class="material-icons">announcement</i>
						</div>
						<div class="card-content text-center">
							<h4><strong>Informacion Publicitaria</strong></h4>
						</div>
					</div>
				</div>
			</div>
			<div id="indice">
				{{-- <iframe   width="870" height="520" src="https://www.youtube.com/embed/qIDzPUt20F4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
			</div>
			
			<div id="contenido">
				<div class="row">
					@foreach ($modules as $module)
						<div class="col">
							<tv-module-card-component inline-template>
								<div class="card">
									<div class="card-header card-header-icon" data-background-color="blue">
										<i class="material-icons">all_inbox</i>
									</div>
									<div class="card-content text-center">
										<h4><strong>{{strtoupper($module->name)}}</strong></h4>
										<h3>TURNO ACTUAL A53</h3>
										{{-- <h4>TURNO ANTERIOR A52</h4>									 --}}
									</div>
								</div>
							</tv-module-card-component>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</tv-component>
@endsection



@section('aditional_style')
	<style>
		div#indice {
		position: absolute;
		left: 3%;
		top: 26%;
		height: 100%;
		width: 65%;
		background-color: ;
		}

		div#contenido {
		position: absolute;
		left: 70%;
		top: 5%;
		height: 100%;
		width: 27%;
		overflow: ;
		background-color: ;
		}
	</style>
@endsection
</html>