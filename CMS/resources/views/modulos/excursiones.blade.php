{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    @include('partials.header', ['title' => 'Mis Excursiones', 'slot' => 'Excursiones'])
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4>Excursiones ({{ $excursiones->count() }})</h4>
                                </div>
                                <div class="col-auto ms-auto">
                                    <a class="btn btn-success" href="{{ route('excursiones.create') }}">
                                        <i class="fa fa-save"></i>
                                        Crear Excursiones
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover table table-bordered  align-middle">
                                    <thead class="table table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Categoria</th>
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
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
                                                <td class="w-25 h-25 text-center d-none d-sm-table-cell">
                                                    <img class="img img-thumbnail w-lg-auto h-lg-auto w-50 h-25"
                                                        src="{{ asset('storage/' . $excu->portada) }}" alt="portada">
                                                </td>

                                                <td class="text-center">
                                                    <div class="btn-group-vertical w-100" role="group">
                                                        {{-- GALERÍA --}}
                                                        <a href="{{ route('galerias.edit', $excu->id) }}"

                                                            class="btn btn-info btn-sm mb-1" title="Gestionar galería">
                                                            <i class="fa fa-image"></i> Galería
                                                        </a>

                                                        {{-- EDITAR --}}
                                                        <a href="{{ route('excursiones.edit', $excu->id) }}"
                                                            class="btn btn-warning btn-sm mb-1" title="Editar excursión">
                                                            <i class="fa fa-edit"></i> Editar
                                                        </a>

                                                        {{-- ELIMINAR --}}
                                                        <form method="POST"
                                                            action="{{ route('excursiones.delete', $excu->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="confirmarEliminacion('{{ $excu->id }}', 'Excursión', '{{ $excu->titulo }}')">
                                                                <i class="fa fa-trash"></i> Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
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
