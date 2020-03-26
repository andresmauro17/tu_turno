<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}" />
	<link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    {{-- <!-- <meta name="csrf-token" content="{{csrf_token}}"/> --> --}}
	<title>TuTurno</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    	<!--  Material Dashboard CSS    -->
	<link href="{{asset('css/app.css')}}" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="{{asset('css/demo.css" rel="stylesheet')}}" />

	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">
	  
	  @yield('aditional_style')

</head>
<body>
    <div class="wrapper" id="app">
        @yield('app')
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
	@yield('aditional_scripts')

</html>
