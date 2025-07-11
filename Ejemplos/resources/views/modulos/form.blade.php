<div class="container">
    {{-- CSRF significa Cross-Site Request Forgery, una medida de seguridad para proteger tus formularios POST, PUT, DELETE de ataques falsos. --}}
    <form {{route ('formulario.store')}} enctype="multipart/form-data" method="post" novalidate>
    @csrf
        <h2>Roll:</h2>
        <input type="text" name="nombre">
        @error ('nombre')
            <p>debe colocar un nombre mayor a 5</p>
        @enderror

        {{-- TODO imagen             --}}
        <h2>imagen</h2>
        <input type="file" name="image">
        @error('imagen')
            <h2 class="text-success">Debe Seleccionar una imagen </h2>
        @enderror

        <button type="submit"> Agregar</button>
    </form>
</div>
