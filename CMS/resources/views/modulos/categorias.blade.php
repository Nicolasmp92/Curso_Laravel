{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categorias</h1>
                    <div class="mt-5">
                        <form action="{{ route('categorias.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre" placeholder="Categorias"
                                        required="">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-md-lg">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Categorias</li>
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



                            <div class="row">
                                @foreach($categorias->chunk(10) as $grupo)
                                <div class="col-md-6 col-md mx-auto">
                                    @foreach ($grupo as $categoria)
                                    {{-- ? formulario de actualizacion --}}
                                    <div class="row mb-2">
                                    <form class="form-inline" action="{{ route('categorias.edit', $categoria->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                                <input class="form-control" type="text" name="nombre" id=""
                                                value="{{ $categoria->nombre }}">
                                                <div class="col">
                                                    <button class="btn btn-warning px-2 btn-xs" type="submit">
                                                    <i class="fa fa-edit"></i> Editar</button>
                                                </div>
                                    </form>
                                    {{-- ? Formulario de eliminación --}}
                                        <form class="form-inline"
                                        action="{{ route('categorias.eliminar', $categoria->id) }}"
                                        method="post"
                                        id="form-eliminar-{{ $categoria->id }}">
                                            @csrf
                                            @method('delete')
                                            <div class="col">
                                                {{-- ? improtante cambiar el  submit x button para que no se envie sin confirmaicon --}}
                                            <button class="btn btn-danger btn-xs"
                                                type="button"
                                                onclick="confirmarEliminacion('{{ $categoria->id }}', 'Categoria', '{{ $categoria->titulo }}')">
                                                <i class="fa fa-trash"></i> Eliminar
                                            </button>
                                            </div>
                                        </form>
                                        </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
