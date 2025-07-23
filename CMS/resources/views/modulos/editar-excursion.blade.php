{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
@vite(['resources/css/excu.css'])
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ediar Excursion</h1>
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
                            <a href="{{ route('excursiones.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">

                            <div class="col-6 col-md-4 text-center px-5">
                                <div class="card bg-secondary text-white shadow">
                                    <div class="card-header text-center">
                                        Imagen de portada
                                    </div>
                                    <div class="card-body text-center">
                                        {{-- !formulario para actualizar imagen de perfil --}}
                                        {{-- * recuerda muy importante pasar el id en la url del action y en la ruta --}}
                                      <form action="{{ route('excursiones.portada.update', $excu->id) }}" method="POST" enctype="multipart/form-data">

                                            @csrf
                                            {{-- Mostrar imagen actual o una por defecto --}}
                                            {{-- ! Mostrar imagen --}}
                                            @if ($excu->portada)
                                            <div class="mb-3 top-50 start-50">
                                                <img src="{{ asset('storage/' . $excu->portada) }}"
                                                alt="Imagen actual"
                                                class="rounded mx-auto d-block "
                                                id="imagePreview">
                                            </div>
                                            @endif

                                            <div class="form-group">
                                                <input accept="image/*"
                                                name="portada"
                                                class="file-niko border"
                                                onchange="previewImage(event)"
                                                type="file">
                                            </div>
                                        <hr class="bg-light">
                                            <button type="submit" class="btn btn-outline-light">
                                                Cambiar Foto
                                            </button>
                                            @error('image')
                                                <div class="alert alert-danger mt-5" role="alert">Seleccione una imagen para
                                                    cargar</div>
                                            @enderror
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-8">

                                <form action="{{ route('excursiones.update', $excu->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <p>{{$excu->id}}</p>
                                        <label class="control-label"> Titulo</label>
                                        <input name="titulo" class="form-control" type="text" placeholder="Titulo"
                                            value="{{ $excu->titulo }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Categoria</label>
                                        <select class="custom-select" name="id_categoria">
                                            {{-- @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                                            @endforeach --}}
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"

                                                    {{ $excu->id_categoria == '$categoria->id' ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Descripcion</label>
                                        <textarea class="form-control" name="descripcion" cols="3" rows="3">{{ nl2br(e($excu->descripcion)) }}</textarea>
                                    </div>


                                    <hr class="mt-5">
                                    <div class="col-m-6">
                                        <button class="btn btn-outline-warning btn-sm btn-block"
                                                type="submit">
                                            Editar
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- Script para vista previa de la imagen de perfil --}}
   <script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            // Si no existe el elemento, lo creamos
            let output = document.getElementById('imagePreview');

            // Si no existe imagen previa, la insertamos
            if (!output) {
                output = document.createElement('img');
                output.id = 'imagePreview';
                output.className = 'rounded mx-auto d-block';
                output.style.width = '100%';
                output.style.objectFit = 'cover';

                // Insertamos el nuevo <img> después del input
                event.target.parentNode.insertBefore(output, event.target.nextSibling);
            }

            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
