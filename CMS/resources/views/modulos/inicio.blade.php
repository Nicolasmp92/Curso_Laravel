{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">INICIO</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<!-- Panel de novedades del usuario -->
<section class="content">
    <div class="container-fluid">

        {{-- Panel de bienvenida --}}
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="text-info text-bold">
                    ¡Bienvenid@ {{ Auth::user()->name }}!
                </h1>
                <p class="text-muted">Este es tu panel de novedades personales.</p>
            </div>
        </div>

        {{-- Panel de alertas o sugerencias --}}
        @if ($mostrarBloquePerfil)
            <div class="alert alert-info d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-user-circle mr-2"></i>
                    <strong>Aviso:</strong> Aún no has subido tu imagen de perfil.
                </div>
                <a href="{{ route('misdatos.index') }}" class="btn btn-sm btn-outline-dark">
                    Subir ahora
                </a>
            </div>
        @endif

        {{-- Aquí puedes agregar más paneles dinámicos a futuro --}}
        {{-- @if ($algunaOtraCondicion) --}}
        {{--     <div class="alert alert-warning">... </div> --}}
        {{-- @endif --}}

    </div>
</section>

@endsection
