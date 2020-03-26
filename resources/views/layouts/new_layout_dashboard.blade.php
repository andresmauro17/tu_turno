@extends('layouts.layout')

@section('app')
	<div class="main-panel" filter-color="black">
			
		@include('layouts.includes.sidebar')
		@include('layouts.includes.navbar')

		<div class="content">
			<div class="row">
				<div class="col-lg-12 logo_contenedor">
					<!--<img src="{{asset('img/logo.png')}}" alt="" style="" class=""> -->
					<div class="container-fluid ">
						@yield('content_user')
					</div>
				</div>
			</div>
		</div> 
	</div>
@endsection