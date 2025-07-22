{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-bold">Gestion Excursiones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Excursiones </li>
                    </ol>
                </div><!-- /.col -->

                <div class="row px-4">
                    <a class="btn btn-info" href="{{ route('excursiones.create') }}">
                        <i class="fa fa-save"></i> Crear
                        Excursiones</a>
                </div>
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
                            <div class="card-header">
                                <h4>Mis Excursiones</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table table-bordered  align-middle">
                                    <thead class="table table-dark">
                                        <tr>
                                            <th >ID</th>
                                            <th >Categoria</th>
                                            <th >Titulo</th>
                                            <th >Descripcion</th>
                                            <th class="text-center">Portada</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @foreach ($excursiones as $excu)
                                            <tr>
                                                <th>{{ $excu->id }}</th>
                                                <td>{{ $excu->categoria->nombre }}</td>
                                                <td>{{ $excu->titulo }}</td>
                                                <td>{{ Str::limit($excu->descripcion, 70) }}</td>
                                                <td class="w-25 h-25 text-center">
                                                    <img class="img img-thumbnail w-lg-auto  h-lg-auto  w-50 h-25"
                                                        src=" {{ asset('storage/' . $excu->portada) }}">
                                                </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            {{-- ! EDITAR --}}
                                                            <a href="{{ route('excursiones.edit',$excu->id,'/edit') }}"
                                                                class="btn btn-warning px-3">
                                                                <i class="fa fa-edit"> Editar</i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <form method="POST"
                                                                action="{{ route('excursiones.delete', $excu->id) }}"
                                                                id="form-eliminar-{{ $excu->id }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="button" class="btn btn-danger btn-block mt-2"
                                                                    style="min-width: 50px"
                                                                    onclick="confirmarEliminacion('{{ $excu->id }}', 'Slide', '{{ $excu->titulo }}')">
                                                                    <i class="fa fa-trash"></i> Eliminar
                                                                </button>

                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                    <tfoot>
                                        {{-- <th>Total</th> --}}
                                    </tfoot>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
