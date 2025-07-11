{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
{{--!Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">MIS DATOS</h1>
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
                                    <h2 class="text-bold mb-4">Editar mis datos</h2>
                                    <form action="" method="post" novalidate velue="" >
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            </lable> Nombre:<lable>
                                                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                                                @error('name')
                                                    <p>Error al digitar el usuario</p>
                                                @enderror

                                            </div>
                                        <div class="form-group">
                                            <lable>Email:</lable>
                                                <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control">
                                                @error('name')
                                                    <p> El Email ya existe. </p>
                                                @enderror
                                            </div>
                                        <div class="form-group">
                                            <lable>Contraseña:</lable>
                                                <input type="password" name="password" value="" class="form-control">
                                                @error('password')
                                                    <p>Error en la contraseña, vuelva a intentarlo.</p>
                                                @enderror
                                            </div>
                                        <div class="form-group">
                                                <button
                                                    type="submint"
                                                    class="btn btn-outline-primary"
                                                > Guardar
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
