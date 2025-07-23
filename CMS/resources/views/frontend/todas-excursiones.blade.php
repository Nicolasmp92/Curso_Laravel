
@extends('welcome')

@section('content')



<div class="container-fluid bg-dark">
        <div class="row" id="articulos">
        <hr>

        <h1 class="text-center text-info"><b> TODAS LAS EXCURSIONES</b></h1>
            <hr>
        <ul>
                @foreach($excursiones as $excursion)
                    <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="{{asset('storage/'. $excursion->portada)}}" class="img-thumbnail">
                    <h1>{{$excursion->titulo}}</h1>
                    <p>{{$excursion->descripcion}}</p>
                    <a href="#">
                        <button class="btn btn-default">Leer Más</button>
                    </a>
                    <hr>
                </li>
                @endforeach
        </ul>
    </div>
</div>
@endsection
