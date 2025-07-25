@extends('welcome')
@section('content')
    @vite(['resources/css/slide.css'])

<div class="container">
<a href="{{route('front.view') }}" class="btn btn-info"> <i> <- </i> Volver</a>
        <div class="row align-items-center">
            <div class="thumbnail">
                <div id="slide" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul>
                        <li>
                            <div class="slide-img-wrapper">
                                <img src="{{ asset('storage/' . $excu->portada) }}" class="img-fluid mx-auto d-block"
                                    alt="...">
                            </div>
                            <div class="slideCaption">
                            </div>
                        </li>
                    </ul>
                    <div id="slideIzq"><span class="fa fa-chevron-left"></span></div>
                    <div id="slideDer"><span class="fa fa-chevron-right"></span></div>
                </div>
                <div class="caption">
                    <h3>{{ $excu->titulo }}</h3>
                    <p>{{ $excu->descripcion }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
