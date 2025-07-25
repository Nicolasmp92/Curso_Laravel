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
                                        <input name="titulo"
                                        class="form-control"
                                        type="text"
                                        placeholder="Titulo"
                                        required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Categoria</label>
                                        <select class="custom-select" name="id_categoria" required="">
                                            <option selected disabled> Seleccione... </option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Descripción</label>
                                        <textarea
                                        class="form-control"
                                        name="descripcion"
                                        cols="3"
                                        rows="3"
                                        placeholder="ingrese una Descripción"
                                        required=""
                                        data-cursor-start
                                        >
                                    </textarea>
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
