@extends('welcome')
@section('content')
    @vite(['resources/css/slide.css'])

    <div class="container-fluid bg-dark">
        <div class="row" id="articulos">
            <hr>

            <h1 class="text-center text-info"><b> TODAS LAS EXCURSIONES</b></h1>
            <hr>
            @foreach ($excursiones as $excursion )
            <h1>bla</h1>
                <ul>
                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="{{ asset('storage/' . $excursion->portada) }}" class="img-thumbnail">
                        <h1>{{ $excursion->titulo }}</h1>
                        <p>{{ $excursion->descripcion }}</p>
                        <a href="{{ route('excrusrion.showone') }}">
                            Ver mas
                        </a>
                        <hr>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
