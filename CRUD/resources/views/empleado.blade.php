<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ver</title>
</head>
<body>
    <div>
        <a href="{{ route('inicio') }}">
            <button>Volver al inicio</button>
        </a>
    </div>
    <br><br>
    <h1>Datos de empleados</h1>
    <h2>{{$empleado -> nombre}}</h2>
    <h2>{{$empleado -> apellido}}</h2>
    <h2>{{$empleado -> telefono}}</h2>
    <h2>{{$empleado -> salario}}</h2>


</body>
</html>
