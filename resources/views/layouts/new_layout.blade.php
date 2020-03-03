<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard Pro by Creative Tim</title>

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

<body class="off-canvas-sidebar">
    <div id="app">
        <nav class="navbar navbar-primary navbar-transparent navbar-absolute primary">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">IPS Farallones</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
    
                        @guest
                            <li class= " active ">
                                <a href="{{ route('login') }}">
                                    <i class="material-icons">assignment_ind</i>
                                        Iniciar sesion
                                </a>
                            </li>
                        @else
                                <li>
                                    <a href="" class="dropdown-toggle exit" data-toggle="dropdown">
                                        <i class="material-icons">directions_run</i>
                                        <span class="nomAuth">{{ Auth::user()->name }}</span>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                    </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    
                                        <ul class="nav">
                                            <li>
                                                <a class="btn-login" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <span class="sidebar-normal">
                                                        {{ __('Cerrar sesion') }}
                                                    </span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
    
                                    </div>
                                </li>
                               <li class="separator hidden-lg hidden-md"></li>
                        @endguest
    
                    </ul>
                </div>
             </div>
        </nav>
        <div class="wrapper wrapper-full-page">
            <div class="full-page login-page" filter-color="black" data-image="{{asset('img/login.jpeg')}}">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="content">
                    <div class="container">
                        @yield('content_login')
                          <div class="container">
                            @yield('content_option_carnet')
                            @yield('carne')
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





