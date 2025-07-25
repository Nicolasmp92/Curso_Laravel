{{-- @extends('welcome')
@section('content')
@vite(['resources/css/slide.css'])
<h1>Excursiones por categorias</h1>

    @foreach ($excursiones as $excu)
        <div class="card mb-3">
            <div class="card-body">
                <h3>{{ $excu->titulo }}</h3>
                <p>{{ $excu->descripcion }}</p>
                <img src="{{ asset("storage/{$excu->portada}") }}" alt="{{ $excu->titulo }}" width="200">
            </div>
        </div>
    @endforeach


@endsection --}}


@extends('welcome')
@section('content')
    <h2 class="text-center">Excursiones por categoría: {{ $categoria->nombre }}</h2>

    @foreach ($excursiones as $excu)
        <div class="card mb-3">
            <div class="card-body">
                <h3>{{ $excu->titulo }}</h3>
                <p>{{ $excu->descripcion }}</p>
                <img src="{{ asset("storage/{$excu->portada}") }}" alt="{{ $excu->titulo }}" width="200">
            </div>
        </div>
    @endforeach
@endsection
