{{-- TODO  contenido --}}
@extends('plantilla')
@section('content')
    {{-- !Estas son las clasicas miguitas de pan, a mi personalmente me gustan las dejare para configurarlas mas tarde cuendo termine el tutorual --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Gestionar Slides</h1>
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
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <form class="mt-5 " enctype="multipart/form-data" action="" method="post"
                                            novalidate="">
                                            @csrf

                                            <div class="form-group">
                                                <label>Titulo:</label>
                                                <input type="text" class="form-control" id="exampleFormControlFile1">
                                            </div>
                                            <div class="form-group">
                                                <label>Descripcion:</label>
                                                <input type="text" class="form-control" id="exampleFormControlFile1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Cargar Imagen</label>
                                                <input  type="file"
                                                        class="form-control-file"
                                                        id="exampleFormControlFile1"
                                                        onchange="previewImage(event, '#imgPreview')">
                                            </div>

                                            <button class="btn btn-success" type="submit"> Guardar</button>
                                        </form>
                                    </div>
                                    <div class="col-6 px-5">
                                        <img class="border border-success" style="height: 21rem; width:21rem;" id="imgPreview">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <script>
function previewImage(event, querySelector){

 const input = event.target;
  const imagePreview = document.querySelector(querySelector);

  if(!input.files.length){
    return
  }

  const file = input.files[0];
  const reader = new FileReader();

  reader.onload = function() {
    imagePreview.src = reader.result;
  }

  reader.readAsDataURL(file);
}
</script>
@endsection
