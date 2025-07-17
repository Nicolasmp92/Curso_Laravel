{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Crear Excursiones</h1>
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



                            <div class="col-md-6 col-md">

                            <form  action="#" method="post">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label class="control-label"> Id</label>
                                    <input class="form-control" type="text" placeholder="Id Categoria" >
                                </div>
                                <div class="form-group">
                                    <label class="control-label"> Titulo</label>
                                    <input class="form-control" type="text" placeholder="Id Categoria" >
                                </div>
                                <div class="form-group">
                                    <label class="control-label"> Descripcion</label>
                                    <input class="form-control" type="text" placeholder="Id Categoria" >
                                </div>
                                <div class="form-group">
                                    <label class="control-label"> portada</label>
                                    <input class="form-control" type="text" placeholder="Id Categoria" >
                                </div>
                            </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
