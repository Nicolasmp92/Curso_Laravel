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
    <h1>Editar de empleados</h1>

    <form action="" method="post" action="{{url('update/'.$empleado -> id)}}" novalidate>
                @csrf
                @method('PUT')
                <label for=""> Nombre</label>
                <input type="text" name="nombre" value="{{$empleado -> nombre}}">
                @error('nombre')
                    <p> Debe Colocar bien su nombre</p>
                @enderror
                <br><br>
                <label for="">Apellido</label>
                <input type="text" name="apellido" value="{{$empleado -> apellido}}" id="">
                @error('apellido')
                    <p> Debe Colocar bien su apellido</p>
                @enderror
                <br><br>
                <label for="">Telefono</label>
                <input type="text" name="telefono" value="{{$empleado -> telefono}}" id="">
                @error('telefono')
                    <p> Debe Colocar bien su telefono</p>
                @enderror
                <br><br>
                <label for="">Salario </label>
                <input type="text" name="salario"  value="{{$empleado -> salario}}">
                @error('salario')
                    <p> Debe Colocar bien su salario</p>
                @enderror
                <br><br>
                <button type="submit"> editar</button>
            </form>


</body>
</html>
