@extends('welcome')
@section('content')

    @foreach ($excursiones as $excu )
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-content">
                        <img src="{{asset('storage/'.$excu->portada)}}" alt="" class="img-responsive">
                    </div>
                    <div class="title">
                        <h3 class="text-primary"> {{$excu->titulo}}</h3>
                        <hr>
                    </div>
                    <p class="text-break">{{$excu->descripcion}}</p>

                </div>
            </div>
        </div>
    @endforeach



@endsection

