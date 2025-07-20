{{-- TODO contenido --}}
@extends('plantilla')
@section('content')
@vite(['resources/css/misdatos.css'])

{{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde
cuendo termine el tutorual --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">MIS DATOS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboar/Mis Datos</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-5">
                        <div class="row">

                            {{-- ! Formulario imagen --}}
                            <div class="col-md-4">
                                <form action="" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        {{--? Imagen con hover --}}
                                        <div class="mb-2 d-flex img-cont">
                                            <img src="..." class="rounded shadow img-profile mx-auto d-block"
                                                accept="images/*" id="imagePreview">
                                        </div>

                                        {{--? Input para subir imagen --}}
                                        <input class="form-control" for="customFile" type="file" name="image"
                                            onchange="previewImage(event)">

                                        {{--? Mensaje de error --}}
                                        @error('image')
                                        <p class="text-danger">Error al cargar la imagen</p>
                                        @enderror
                                    </div>
                                    <hr>
                                    {{-- ? guardar imagen --}}
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-outline-secondary btn-block">
                                            Guardar Imagen
                                        </button>
                                    </div>
                                </form>
                            </div>



                            {{-- ! Formulario para datos de usuario --}}
                            <div class="col-md-8 px-5">
                                <form action="{{ route('misdatos.editar.usuarios') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group"> {{--! Nombre --}}
                                        <label>Nombre:</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}"
                                            class="form-control">
                                        @error('name')
                                        <p class="text-danger">Error al digitar el nombre.</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">{{--! Email --}}
                                        <label>Email:</label>
                                        <input type="email" name="email" value="{{ auth()->user()->email }}"
                                            class="form-control">
                                        @error('email')
                                        <p class="text-danger">El Email ya existe.</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">{{--! Telefono --}}
                                        <label>Telefono:</label>
                                        <input type="tel" name="telefono" value="{{ auth()->user()->telefono }}"
                                            class="form-control">
                                        @error('telefono')
                                        <p class="text-danger">El Email ya existe.</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">{{--! Contraseña Actual--}}
                                        <label>Contraseña actual: <span class="text-danger">*</span> </label>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                        <p class="text-danger">Error en la contraseña, vuelva a intentarlo.</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">{{--! Contraseña Nueva--}}
                                        <label>Contraseña Nueva: <span class="text-danger">*</span> </label>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                        <p class="text-danger">Error en la contraseña, vuelva a intentarlo.</p>
                                        @enderror
                                    </div>

                                    <hr>
                                    <div class="form-group mt-3">{{--! Guardar --}}
                                        <button type="submit" class="btn btn-outline-secondary btn-block">
                                            Guardar
                                        </button>
                                    </div>
                                </form>
                            </div>



                        </div>{{--row--}}

                    </div> {{--card body--}}
                </div> {{--card--}}
            </div>{{--col-lg-12--}}

        </div> {{--row--}}
    </div><!-- /.container-fluid -->


</section>


<script>
    function previewImage(event) {
            const input = event.target;
            const imagePreview = document.getElementById('imagePreview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = ""; // Limpiar vista previa si no hay archivo
            }
        }
</script>
@endsection
