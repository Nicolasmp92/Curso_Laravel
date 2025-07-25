@extends('welcome')
@section('content')
    @vite(['resources/css/slide.css'])

    <div class="container-fluid bg-dark">
        <div class="row" id="articulos">
            <hr>
            <h1 class="text-center text-info"><b> TODAS LAS EXCURSIONES</b></h1>
            <hr>
            @foreach ($excursiones as $excu)
                <ul>
                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="{{ asset('storage/' . $excu->portada) }}" class="img-thumbnail">
                        <h1>{{ $excu->titulo }}</h1>
                        <p>{{ $excu->descripcion }}</p>
                        <a href="{{ route('excrusrion.showone', $excu->id) }}">
                            Saber más
                        </a>
                        <hr>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
