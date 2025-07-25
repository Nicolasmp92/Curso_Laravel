{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    @vite(['resources/css/excu.css'])
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
                            <form action="{{ route('excursiones.update', $excu->id) }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="row  row-cols-2 align-items-center  justify-content-center">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-4 col-6 col-sm-12 text-center">
                                        <div class="card bg-secondary text-white shadow">
                                            <div class="card-header text-center">
                                                Imagen de portada
                                            </div>
                                            <div class="card-body text-center">
                                                @if ($excu->portada)
                                                    <div class="mb-3 top-50 start-50">
                                                        <img
                                                        src="{{ asset('storage/'.$excu->portada)}}"
                                                        alt="portada"
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
                                                @error('portada')
                                                    <div class="alert alert-danger mt-5" role="alert">
                                                        Seleccione una imagen Para cargar</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label"> Titulo</label>
                                            <input name="titulo" class="form-control" type="text" placeholder="Titulo"
                                                value="{{ $excu->titulo }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> Categoria</label>
                                            <select class="custom-select" name="id_categoria">

                                                <option value="{{ $excu->id_categoria }}">{{ $excu->Categoria->nombre }}
                                                </option>

                                                @foreach ($categorias as $categoria)
                                                    @if ($categoria->id != $excu->id_categoria)
                                                        <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}
                                                        </option>
                                                    @endif
                                                @endforeach


                                                {{-- @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ $excu->id_categoria == '$categoria->id' ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}</option>
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @endforeach --}}


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"> Descripcion</label>
                                            <textarea class="form-control" name="descripcion" cols="3" rows="3">{{ nl2br(e($excu->descripcion)) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">{{--*Button Editar Portada--}}
                                        <button class="btn btn-outline-warning btn-lg btn-block" type="submit">
                                            Editar Portada
                                        </button>
                                    </div>
                                </div>
                            </form>
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
