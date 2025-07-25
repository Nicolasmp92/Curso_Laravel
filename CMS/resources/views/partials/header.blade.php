<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">{{ $title ?? 'Título' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('inicio.home') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">
                            {{ $slot ?? 'Ruta No Definida' }}
                        {{-- {{ $breadcrumb ?? 'Dashboard' }} --}}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>


{{-- !PARA AGREGAR A LAS VISTAS --}}
{{-- TODO PARA LAS MIGAS DE PAN --}}
{{-- @include('partials.header', ['title' => 'Home', 'slot' => 'Home']) --}}
