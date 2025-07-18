{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Crear usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('crear-usuarios') }}" method="post">
                                @csrf


                                <div class="form-group ">
                                    </lable> Nombre: <span class="text-danger">*</span><lable>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" required="">
                                        {{-- @error('name')
                                            <p class="mt-2 alert alert-danger">Error al digitar el usuario</p>
                                        @enderror --}}

                                </div>
                                <div class="form-group ">
                                    <lable>Email: <span class="text-danger">*</span></lable>
                                    <input type="email" name="email"class="form-control @error('email') is-invalid @enderror" required="">
                                    {{-- @error('email')
                                        <p class="mt-2 alert alert-danger">  </p>
                                    @enderror --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Rol:</label>
                                    <select name="rol" class="form-control @error('rol') is-invalid @enderror"
                                        id="exampleFormControlSelect2">
                                        <option>Admin</option>
                                        <option>Editor</option>
                                        <option>Ventas</option>
                                    </select>
                                    @error('rol')
                                        <p class="mt-2 alert alert-danger"> seleccione un rol </p>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <lable>Clave: <span class="text-danger">*</span> </lable>
                                    <input type="password" name="password" value=""
                                        class="form-control @error('password') is-invalid @enderror" required="">
                                    {{-- @error('password')
                                        <p class="mt-2 alert alert-danger"> la Clave deve contener 8 carcteres minimo </p>
                                    @enderror --}}
                                </div>

                                <div class="form-group">
                                    <button type="submint" class="btn btn-outline-primary"> Guardar
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
