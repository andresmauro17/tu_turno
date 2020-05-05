@extends('layouts.layout')

@section('app')
	<tv-component inline-template 
		v-bind:modules="{{$modules}}" 
		v-bind:services="{{$services}}" 
		v-bind:turnstotales="{{$turnstotales}}"
		>

		<div class="container-fluid">
			<div class="col-xs-8">
					<div class="row">

						<div class="card">
							<div class="card-header card-header-icon" data-background-color="blue">
								<i class="material-icons">announcement</i>
							</div>
							{{-- <div class="toolbar text-right card-header card-header-icon " data-background-color="yellow" @click.prevent="showNotification('top','left')"> --}}
								<div class="toolbar text-right card-header card-header-icon " data-background-color="yellow" @click.prevent="turnstotales++">
								<i>@{{turnstotales}}</i>
							</div>
							
							<div class="card-content text-center">
																
								<MARQUEE behavior="scroll" direction="left" scrollamount="8">
									<h4>
										<strong> Informacion Publicitaria </strong>
									</h4>
								</MARQUEE>
								
								<h4>@{{hours}}</h4>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">

							<iframe id="video-iframe"  width="80%" src="https://www.youtube.com/embed/l-aS0XSmShM?loop=1&playlist=l-aS0XSmShM&autoplay=1" frameborder="0" allowfullscreen></iframe>

						</div>
					</div>
			</div>
			<div class="col-xs-4">
				<template v-for="module in modulesLocal">
					<div>
						<div class="col-xs-12">
							<tv-module-card-component inline-template v-bind:module="module">
								<div class="card" @click.prevent="notification" v-bind:class="noti">
									<div class="card-header card-header-icon " data-background-color="blue">
										<i class="material-icons">all_inbox</i>
									</div>
									<div class="card-content text-center">
										<h4><strong>@{{module.module_name}}</strong></h4>
										<h3>@{{module.consecutive_string}}</h3>
										{{-- <h4>TURNO ANTERIOR A52</h4>									 --}}
									</div>
								</div>
							</tv-module-card-component>
						</div>
					</div>

				</template>	
			</div>
		</div>
	</tv-component>
@endsection

