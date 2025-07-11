<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <title>CRUD</title>
</head>

<body>

    <a href=" {{ url('crear-empleado') }}">
        <button class="btn btn-info bg-white mx-5 my-5"> crear empleado</button>
    </a>
    <br>
    <br>
    <br>
    <div class="container">
    <table  border="1" class="table table-info table-striped ">
        <thead>
            <tr>
                <th>nombre</th>
                <th>apellido</th>
                <th>telefono</th>
                <th>salario</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{$empleado ->nombre}}</td>
                    <td>{{$empleado ->apellido}}</td>
                    <td>{{$empleado ->telefono}}</td>
                    <td>{{$empleado ->salario}}</td>
                    <td>
                        <a href="{{ url ('show/'.$empleado -> id) }}">
                            <button> Ver</button>
                        </a>

                        <a href="{{ url ('edit/'.$empleado -> id) }}">
                            <button> Editar</button>
                        </a>
                        <form action="{{ url ('delete/'.$empleado -> id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button> eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>




    {{-- JS bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
