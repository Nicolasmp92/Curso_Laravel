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



                            <div class="col-md-6">
                                <div class="row">
                                    @foreach ($categorias as $categoria)
                                    {{-- ? formulario de actualizacion --}}
                                    <form class="form-inline" action="{{ route('categorias.edit', $categoria->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                                <input class="form-control mb-2 mr-sm-2" type="text" name="nombre" id=""
                                                value="{{ $categoria->nombre }}">
                                            <div class="col-1">
                                                <button class="btn btn-success btn-xs" type="submit"> Guardar</button>
                                            </div>
                                    </form>
                                    {{-- ? Formulario de eliminación --}}
                                        <form class="form-inline" action="{{ route('categorias.eliminar', $categoria->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="col-1">
                                            <button class="btn btn-danger btn-xs" type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar
                                            </button>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
