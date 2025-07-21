{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Crear Excursiones</h1>

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
                        <div class="card-header">
                            <a href="{{ route('excursiones.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>
                                Volver</a>
                        </div>
                        <div class="card-body">
                            <div class="col-md-9 col-md mx-auto">
                                <form action="{{ route('excursiones.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    <div class="form-group">
                                        <label class="control-label"> Titulo</label>
                                        <input name="titulo" class="form-control" type="text" placeholder="Titulo">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Categoria</label>
                                        <select class="custom-select" name="id_categoria">
                                            <option selected disabled> Seleccione... </option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Descripcion</label>
                                        <textarea class="form-control" name="descripcion" cols="3" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Portada</label>
                                        <input accept="image/*" name="portada" class="form-control pb-5 bg-dark"
                                            type="file" placeholder="Id Categoria">
                                    </div>
                                    <hr class="mt-5">
                                    <div class="col-m-6">
                                        <button class="btn btn-outline-secondary btn-sm btn-block" type="submit">
                                            Crear</button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
