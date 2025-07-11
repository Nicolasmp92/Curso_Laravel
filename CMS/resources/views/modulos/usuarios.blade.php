{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
{{--!Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Gestor de usuarios</h1>
                        {{-- !ACA voy a cargar el formulario para crear usuarios --}}
                            <a href="{{route('crear-usuarios')}}">
                            <button type="submit">Crear Usuario</button>
                        </a>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Roll</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($usuarios as $user)
                                            <tr>
                                                <td>{{ $user -> name}}</td>
                                                <td>{{ $user -> email}}</td>
                                                <td>{{ $user -> rol}}</td>
                                                <td>
                                                    <form action="{{route('usuarios.destroy', $user->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa fa-trash">Eliminar</i>

                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
@endsection
