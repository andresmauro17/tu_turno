<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>PDF</title>
</head>
<body>
    <div class="container">
        <div class="alert alert-danger">Alerta</div>
    </div>
    @foreach ($services as $service)
        <p>{{$service->short_name}}</p>
    @endforeach
</body>
</html>