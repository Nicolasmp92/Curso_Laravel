{{-- TODO contenido --}}
@extends('plantilla')
@section('content')
{{--! Contenido principal --}}
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- centrado horizontalmente y más angosto --}}
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <a href="{{route('misdatos.index')}}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Volver
                        </a>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('misdatos.update.pass') }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{--! Contraseña Actual --}}
                            <div class="form-group">
                                <label>Contraseña actual: <span class="text-danger">*</span></label>
                                <input type="password" name="current_password" class="form-control" required>
                                @error('current_password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{--! Contraseña Nueva --}}
                            <div class="form-group">
                                <label>Contraseña nueva: <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{--! Confirmar Contraseña --}}
                            <div class="form-group">
                                <label>Confirmar nueva contraseña: <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">
                                    Actualizar Contraseña
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
