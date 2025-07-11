<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>crear-empleado</title>
</head>
<body>
    <div>
        <a href="{{ route('inicio') }}">
            <button>Volver</button>
        </a>
    </div>
    <div>
        <center>
        <h1 class="text-success fw-bolder">crear empleado</h1>

            <form action="" method="post" novalidate>
                @csrf
                <label for=""> Nombre</label>
                <input type="text" name="nombre">
                @error('nombre')
                    <p> Debe Colocar bien su nombre</p>
                @enderror
                <br><br>
                <label for="">Apellido</label>
                <input type="text" name="apellido" id="">
                @error('apellido')
                    <p> Debe Colocar bien su apellido</p>
                @enderror
                <br><br>
                <label for="">Telefono</label>
                <input type="text" name="telefono" id="">
                @error('telefono')
                    <p> Debe Colocar bien su telefono</p>
                @enderror
                <br><br>
                <label for="">Salario</label>
                <input type="text" name="salario" id="">
                @error('salario')
                    <p> Debe Colocar bien su salario</p>
                @enderror
                <br><br>
                <button type="submit"> Guardar</button>
            </form>
        </center>
    </div>
</body>
</html>
