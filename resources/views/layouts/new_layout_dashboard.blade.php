<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}" />
	<link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    {{-- <!-- <meta name="csrf-token" content="{{csrf_token}}"/> --> --}}
	<title>Kiosko</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    	<!--  Material Dashboard CSS    -->
	<link href="{{asset('css/app.css')}}" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="{{asset('css/demo.css" rel="stylesheet')}}" />

	<!-- Fonts and icons -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body>
 <div class="wrapper" id="app">
    <div class="main-panel contenedor" filter-color="black">
        <div class="sidebar primary" data-active-color="rose" data-background-color="black" >
            <!--
                Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
                Tip 2: you can also add an image using data-image tag
                Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    IPS
                </a>

                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Farallones
                </a>
            </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    {{-- <img src="https://nyc3.digitaloceanspaces.com/statics-meditec/static/img/faces/face-0.jpg?Signature=ppHZYE2Zg8%2FK5N0ayl6e7otCw%2FI%3D&amp;AWSAccessKeyId=PD5BYU6PYDZH6BT5A2WW&amp;Expires=1564685376"> --}}
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span>
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                    {{-- <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini"> MP </span>
                                    <span class="sidebar-normal"> My Profile </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini"> EP </span>
                                    <span class="sidebar-normal"> Edit Profile </span>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
                <ul class="nav">
                    <li>
                        <a href="/kiosko">
                            <i class="material-icons">dashboard</i>
                            <p> KIOSKO </p>
                        </a>
                    </li>
                    <li>
                        <a href="/servicios">
                            <i class="material-icons">dashboard</i>
                            <p> SERVICIOS </p>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Template </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
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
                        </ul>
                    </div>
                </div>
            </nav>
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
    </div>
</body>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			responsive: true,
			language: {
			search: "_INPUT_",
			searchPlaceholder: "Buscar",
			}

		});


		var table = $('#datatables').DataTable();

		// Edit record
		table.on( 'click', '.edit', function () {
			$tr = $(this).closest('tr');

			var data = table.row($tr).data();
			alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
		} );

		// Delete a record
		table.on( 'click', '.remove', function (e) {
			$tr = $(this).closest('tr');
			table.row($tr).remove().draw();
			e.preventDefault();
		} );

		//Like record
		table.on( 'click', '.like', function () {
			alert('You clicked on Like button');
		});

		$('.card .material-datatables label').addClass('form-group');
	});

	</script>





</html>
