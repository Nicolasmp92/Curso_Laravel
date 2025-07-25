{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h2>Complete el Formulario:</h2> --}}
                        <a href="{{route('usuarios.index')}}" class="btn btn-outline-secondary" ><i class="fa fa-arrow-left"></i> Volver</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('usuarios.create') }}" method="post" class="px-5">
                                @csrf
                                <div class="form-group px-5 ">
                                    <label>Nombre: <span class="text-danger">*</span></label>
                                        <input type="text" name="name" autocomplete="name"
                                            class="form-control @error('name') is-invalid @enderror" required="">
                                        {{-- @error('name')
                                            <p class="mt-2 alert alert-danger">Error al digitar el usuario</p>
                                        @enderror --}}

                                </div>
                                <div class="form-group px-5 ">
                                    <label>Email: <span class="text-danger">*</span></label>
                                    <input type="email" name="email"class="form-control @error('email') is-invalid @enderror" required="">
                                    {{-- @error('email')
                                        <p class="mt-2 alert alert-danger">  </p>
                                    @enderror --}}
                                </div>
                                <div class="form-group px-5 ">
                                    <label>Telefono <span class="font-italic">(no obligatorio):</span></label>
                                    <input type="tel" name="telefono"class="form-control">
                                    {{-- @error('email')
                                        <p class="mt-2 alert alert-danger">  </p>
                                    @enderror --}}
                                </div>
                                <div class="form-group px-5">
                                    <label>Rol: <span class="text-danger">*</span></label>
                                    <select name="rol" class="form-control @error('rol') is-invalid @enderror"
                                        id="exampleFormControlSelect2" required="">
                                        <option>Admin</option>
                                        <option>Editor</option>
                                        <option>Ventas</option>
                                    </select>
                                    @error('rol')
                                        <p class="mt-2 alert alert-danger"> seleccione un rol </p>
                                    @enderror
                                </div>
                                <div class="form-group px-5 ">
                                    <label>Clave: <span class="text-danger">*</span> </label>
                                    <input type="password" name="password" value=""
                                        class="form-control @error('password') is-invalid @enderror" required="">
                                    {{-- @error('password')
                                        <p class="mt-2 alert alert-danger"> la Clave deve contener 8 carcteres minimo </p>
                                    @enderror --}}
                                </div>

                                <div class="form-group px-5">
                                    <button type="submit" class="btn btn-outline-primary"> Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
