{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
@include('partials.header', ['title' => 'Editar Galerias', 'slot' => 'Galerias/Excursiones'])



<!-- Panel de novedades del usuario -->
<section class="content">
    <div class="container-fluid">

<section class="content">
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body">
                <h5>Imágenes actuales</h5>
                <div class="row">
                    @forelse ($excursion->galeria as $imagen)
                        <div class="col-md-3 mb-3 text-center">
                            <img src="{{ asset('storage/' . $imagen->ruta) }}" class="img-fluid rounded shadow" alt="Imagen">
                            <form action="{{ route('galerias.destroy', $imagen->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar imagen?')">
                                    <i class="fa fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="col">
                            <p class="text-muted">No hay imágenes en esta galería.</p>
                        </div>
                    @endforelse
                </div>

                <hr>

                <h5>Agregar nuevas imágenes</h5>
                <form action="{{ route('galerias.update', $excursion->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="imagenes">Selecciona imágenes (puedes subir varias):</label>
                        <input type="file" name="imagenes[]" multiple accept="image/*" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success mt-3">
                        <i class="fa fa-upload"></i> Subir imágenes
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
