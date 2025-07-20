{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    @vite(['resources/css/slide.css'])

    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestionar Slides</h1>
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
                        {{-- TODO cargar imagenes --}}
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <form class="mt-5 " enctype="multipart/form-data"
                                            action="{{ route('store.slide') }}" method="post" novalidate="">
                                            @csrf

                                            <div class="form-group">
                                                <label class="form-label">Cargar Imagen</label>
                                                <input type="file" name="imagen" accept="images/*"
                                                    class="form-control-file niko" onchange="previewImage(event)">
                                                @error('image')
                                                    <p>Solo puedes cargar imagenes</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Titulo:</label>
                                                <input type="text" name="titulo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Descripcion:</label>
                                                <input type="text" name="descripcion" class="form-control">
                                            </div>

                                            <button class="btn btn-success" type="submit"> Guardar</button>
                                        </form>
                                    </div>
                                    <div class="col-6 px-5">
                                        <img class="img-responsive border border-success h-75 w-75 " id="imagePreview">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- TODO mostrar imagenes --}}
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container">
                                <h2 class="text-bold pt-2 pb-4">Imagenes cargadas</h2>
                                <div class="row">
                                    @foreach ($slide as $sli)
                                        <div class="col-3 mb-4 px-2">
                                            <div class="card h-100">
                                                <img src="{{ asset('storage/' . $sli->imagen) }}" class="card-img-top"
                                                    alt="...">

                                                <div class="card-body">
                                                        <h5 class="card-title">{{ $sli->titulo }}</h5>
                                                        <p class="card-text">{{ $sli->descripcion }}</p>
                                                        <p class="card-text text-bold  mt-0 align-top">
                                                            {{ $sli->id }}</p>
                                                        <form method="POST"
                                                            action="{{ route('eliminar.slide',$sli->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Eliminar</button>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <script>
        function previewImage(event) {
            const input = event.target;
            const imagePreview = document.getElementById('imagePreview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = ""; // Limpiar vista previa si no hay archivo
            }
        }
    </script>
@endsection
