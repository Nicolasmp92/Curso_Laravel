{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    @vite(['resources/css/gelerias.css'])
    @include('partials.header', ['title' => 'Editar Galerias', 'slot' => 'Galerias/Excursiones'])



    <!-- Panel de novedades del usuario -->
    <section class="content">
        <div class="container-fluid">

            <section class="content">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>Galeria: {{ $excursion->titulo }}</h2>
                        </div>
                        <div class="card-body">

                            <h5>Agregar nuevas imágenes</h5>
                            <form action="{{ route('galerias.update', $excursion->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group has-validation">
                                    <label for="imagenes">Selecciona imágenes (puedes subir varias):</label>
                                    <input
                                    class="form-control @error('imagenes') is-invalid @enderror"
                                    type="file"
                                    name="imagenes[]"
                                    multiple accept="image/*"
                                    class="form-control"
                                    onchange="previewImage(event)">
                                </div>

                                <input type="hidden" name="excursion_id" value="{{ $excursion->id }}">

                                <button type="submit" class="btn btn-success mt-3">
                                    <i class="fa fa-upload"></i> Cargar imágenes
                                </button>
                                {{-- ! Contenedor para mostrar todas las imagenes a cargar --}}
                                <div id="previewContainer" class="row mt-3"></div>
                                @error('imagenes.*')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </form>

                            <hr>
                            <h5>Imágenes actuales</h5>
                            <div class="row">
                                @forelse ($excursion->galerias as $imagen)
                                    <div class="col-md-3 mb-3 text-center">
                                        <p>{{ $imagen->id }}</p>
                                        <p>{{ $excursion->titulo }}</p>
                                        <img src="{{ asset('storage/' . $imagen->imagen) }}"
                                            class="img-fluid rounded shadow" alt="Imagen">
                                        <form action="{{ route('galerias.destroy', $imagen->id) }}" method="POST"
                                            id="form-eliminar-{{ $imagen->id }}" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="confirmarEliminacion('{{ $imagen->id }}', 'Imagen', '{{ $excursion->titulo }}')">
                                                Eliminar
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
                        </div>
                    </div>
                </div>
            </section>



            <script>
                let stagedFiles = [];

                document.querySelector('input[name="imagenes[]"]').addEventListener('change', function(event) {
                    const files = Array.from(event.target.files);
                    const previewContainer = document.getElementById('previewContainer');

                    // Reinicia arrays y contenedor visual
                    stagedFiles = files;
                    previewContainer.innerHTML = '';

                    stagedFiles.forEach((file, index) => {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                const col = document.createElement('div');
                                col.classList.add('col-md-3', 'mb-3');

                                const wrapper = document.createElement('div');
                                wrapper.classList.add('preview-wrapper');

                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.classList.add('img-thumbnail');
                                img.style.maxHeight = '150px';
                                img.style.width = '100%';

                                const btn = document.createElement('button');
                                btn.innerText = '×';
                                btn.classList.add('remove-btn');
                                btn.setAttribute('type', 'button');

                                // Eliminar imagen del stage y actualizar
                                btn.addEventListener('click', function() {
                                    stagedFiles.splice(index, 1);
                                    updateInputAndPreview();
                                });

                                wrapper.appendChild(img);
                                wrapper.appendChild(btn);
                                col.appendChild(wrapper);
                                previewContainer.appendChild(col);
                            };

                            reader.readAsDataURL(file);
                        }
                    });
                });

                // Crea un nuevo FileList desde stagedFiles y lo asigna al input
                function updateInputAndPreview() {
                    const input = document.querySelector('input[name="imagenes[]"]');
                    const dt = new DataTransfer();

                    stagedFiles.forEach(file => dt.items.add(file));

                    input.files = dt.files;

                    // Volver a disparar evento para regenerar preview
                    const event = new Event('change', {
                        bubbles: true
                    });
                    input.dispatchEvent(event);
                }
            </script>
        @endsection
