{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                      {{-- !ACA voy a cargar el formulario para crear usuarios --}}
                            <a href="{{route('usuarios.create')}}" class="btn btn-outline-success mt-3">
                            <i class="fa fa-user"></i> Crear Usuario</a>
                        </a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th>Nombres</th>
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
                                                    <form action="{{route('usuarios.destroy', $user->id)}}"
                                                        method="post"
                                                        id="form-eliminar-{{ $user->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    <button class="btn btn-danger"
                                                        type="button"{{--? se cambia de submit a button para que el formulario no se envia de inmediato sin confirmar--}}
                                                         onclick="confirmarEliminacion('{{ $user->id }}', 'usuario', '{{ $user->name }}')">
                                                            <i class="fa fa-trash"> Eliminar</i>
                                                    </button>
                                                    <a class="btn btn-warning text-white" href="{{route('usuarios.edit',$user->id,'/edit')}}">
                                                        <i class="fa fa-edit"> Editar</i>
                                                    </a>
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
