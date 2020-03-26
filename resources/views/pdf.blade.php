<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <title>PDF</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="form-group">
                <img width="300"  src="images/logo.png" alt="">
            </div>
            <br>
            <h1>Turno</h1>
            <h1>{{$turn->consecutive_string}}</h1>
            <br>
            <small>Sistema TuTurno, todos los derechos reservados MDO Partners s.a.s</small>
        </div>
        
            
    </div>
</body>
</html>