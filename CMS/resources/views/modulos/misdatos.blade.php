{{-- TODO contenido --}}
@extends('plantilla')
@section('content')
@vite(['resources/css/misdatos.css'])

{{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde
cuendo termine el tutorual --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">MI PERFIL</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Mis datos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card shadow">
                    <div class="card-header mb-2">
                        <div class="row align-items-end">
                            <div class="col">
                            <h2>Actualiza tus datos</h2>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('misdatos.change.pass') }}" class="btn btn-outline-danger btn-md">
                                    <i class="fa fa-key"></i>
                                    Cambiar Contraseña
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            {{--! Imagen de perfil --}}
                            <div class="col-6 col-md-4 text-center px-5">
                                <div class="card bg-dark text-white shadow">
                                    <div class="card-header text-center">
                                        Imagen de Perfil
                                    </div>
                                    <div class="card-body text-center">
                                        {{-- !formulario para actualizar imagen de perfil --}}
                                        <form action="{{ route('misdatos.imagen') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            {{-- Mostrar imagen actual o una por defecto --}}
                                            <div class="mb-3 img-cont">
                                                <img
                                                src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/default-user.png') }}"
                                                    alt="Imagen actual"
                                                    class="img-thumbnail img-profile"
                                                    id="imagePreview"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                            </div>

                                            <div class="mb-3">
                                                <input type="file"
                                                class="form-control-file border"
                                                name="image"
                                                accept="image/*"
                                                onchange="previewImage(event)">
                                            </div>
                                            <button type="submit" class="btn btn-outline-light">
                                                Cambiar Foto
                                            </button>
                                            @error('image')
                                                <div class="alert alert-danger mt-5" role="alert">Seleccione una imagen para cargar</div>
                                            @enderror
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--! Formulario datos --}}
                            <div class="col-sm-6 col-md-8">
                                <form action="{{ route('misdatos.editar.perfil') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input type="text"
                                                name="name"
                                                value="{{ auth()->user()->name }}"
                                                class="form-control" required="">
                                        @error('name')
                                        <p class="text-danger">Error, campo vacio.</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="email" value="{{ auth()->user()->email }}"
                                            class="form-control">
                                        @error('email')
                                        <p class="text-danger">Ingrese un email.</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Teléfono:</label>
                                        <input type="tel" name="telefono" value="{{ auth()->user()->telefono }}"
                                            class="form-control">
                                        @error('telefono')
                                        <p class="text-danger">Error en el teléfono.</p>
                                        @enderror
                                    </div>

                                    <hr class="pt-3">
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-outline-secondary btn-block">
                                            Guardar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div> {{-- row interna --}}
                    </div> {{-- card-body --}}
                </div> {{-- card --}}

            </div> {{-- col-lg-12 --}}
        </div> {{-- row --}}
    </div> <!-- /.container-fluid -->
</section>

{{-- Script para vista previa de la imagen de perfil--}}
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
