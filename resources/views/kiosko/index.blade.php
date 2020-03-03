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
<body>
	<div class="wrapper wrapper-full-page">
		<div class="full-page login-page" filter-color="black" data-image="{{asset('img/bg-pricing.jpeg')}}">
		<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
          
            <div class="content">
                <div class="container"> 
                    <div class="row">

                        <div class="col-md-4">
                            <form method="#" action="#">
                                <div class="card card-profile card-hidden">
                                    <div class="card-avatar">
                                        <img style="height: 150px; width: 150px;" class="avatar" src="{{asset('img/vacua-bebe.jpg')}}" alt="...">
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title"><strong>DISPENSACIÓN</strong></h4>
                                    </div>
                                    <div class="form-group label-floating">
                                        <p class="control-label">
                                            Atención preferencial significa que cumples con almenos una de estas características:
                                            <li>Persona mayor de 60 años.</li> 
                                            <li>Mujer en estado de embarazo.</li>
                                            <li>Vienes con un menor de 10 años.</li>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-rose btn-round">IMPRIMIR</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <form method="#" action="#">
                                <div class="card card-profile card-hidden">
                                    <div class="card-avatar">
                                        <img style="height: 150px; width: 150px;" class="avatar" src="{{asset('img/vacua-bebe.jpg')}}" alt="...">
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title"><strong>APLICACIÓN</strong></h4>
                                    </div>
                                    <div class="form-group label-floating">
                                        <p class="control-label">
                                            Atención preferencial significa que cumples con almenos una de estas características:
                                            <li>Persona mayor de 60 años.</li> 
                                            <li>Mujer en estado de embarazo.</li>
                                            <li>Vienes con un menor de 10 años.</li>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-rose btn-round">IMPRIMIR</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <form method="#" action="#">
                                <div class="card card-profile card-hidden">
                                    <div class="card-avatar">
                                        <img style="height: 150px; width: 150px;" class="avatar" src="{{asset('img/vacua-bebe.jpg')}}" alt="...">
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title"><strong>INFORMACIÓN</strong></h4>
                                    </div>
                                    <div class="form-group label-floating">
                                        <p class="control-label">
                                            Atención preferencial significa que cumples con almenos una de estas características:
                                            <li>Persona mayor de 60 años.</li> 
                                            <li>Mujer en estado de embarazo.</li>
                                            <li>Vienes con un menor de 10 años.</li>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-rose btn-round">IMPRIMIR</button>
                                    </div>
                                </div>
                            </form>
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
</html>