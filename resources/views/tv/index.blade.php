<!DOCTYPE html>
<html lang="en">
<head>
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
		<title>TV-Vuew</title>
	
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
	
		<!-- Bootstrap core CSS     -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
	
		<!--  Material Dashboard CSS    -->
		<link href="{{asset('css/app.css')}}" rel="stylesheet"/>
	
		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="{{asset('css/demo.css')}}" rel="stylesheet" />
	
		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	</head>
</head>
<body style="background-color: blue">
		<!-- <div class="wrapper wrapper-full-page">
		<div class="full-page login-page" filter-color="black" data-image="{{asset('img/vacua-bebe.jpg')}}"> IMAGEN A FULL 
		<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
		
			<div class="container">
				<div class="content">
					<div class="row">
						<div class="col-md-8" style="padding-top: 3%">
							<div class="card">
								<div class="card-header card-header-icon" data-background-color="grey">
									<i class="material-icons">announcement</i>
								</div>
								<div class="card-content text-center">
									<h4><strong>Informacion Publicitaria</strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div id="indice">
						<iframe   width="870" height="520" src="https://www.youtube.com/embed/qIDzPUt20F4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					
					<div id="contenido">
						<div class="row">
							@foreach ($modules as $module)
								<div class="col">
									<div class="card">
										<div class="card-header card-header-icon" data-background-color="grey">
											<i class="material-icons">all_inbox</i>
										</div>
										<div class="card-content text-center">
											<h4><strong>{{strtoupper($module->name)}}</strong></h4>
											<h3>TURNO ACTUAL A53</h3>
											<h4>TURNO ANTERIOR A52</h4>									
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    $().ready(function(){
    demo.checkFullPageBackgroundImage();
        setTimeout(function(){
       // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
    }, 700)
});
</script>

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
</html>