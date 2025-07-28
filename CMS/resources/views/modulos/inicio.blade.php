{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')

{{-- TODO PARA LAS MIGAS DE PAN --}}
@include('partials.header', ['title' => 'Home', 'slot' => 'Home'])



<!-- Panel de novedades del usuario -->
<section class="content">
    <div class="container-fluid">

        {{-- Panel de bienvenida --}}
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="text-info text-bold">
                    ¡Bienvenid@ {{ Auth::user()->name }}!

                </h1>
                {{-- <p>{{dd(Auth::user());}}</p> --}}
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
