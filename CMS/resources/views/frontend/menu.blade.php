
<header class="row">

    {{-- <div id="logo" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <img src="{{asset('storage/logo.png')}}" width="100px" height="100px" class="d-inline-block align-top">
    </div>

    <div id="botoneraMovil" class="navbar-header navbar-inverse">
        <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#botonera">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <nav id="botonera" class="col-lg-9 col-md-9 col-sm-12 col-xs-12 collapse navbar-collapse pull-right">
        <ul class="nav navbar-nav">
            <li>
                <a href="{{route('panel.inicio')}}">Inicio</a>
            </li>
            <li><a href="#top">Categorias</a></li>
            <li><a href="Excursiones-Todas">Excursiones</a></li>
            <li><a href="#contactenos">Contáctenos</a></li>
        </ul>
    </nav> --}}

<header class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">

        {{-- LOGO --}}
        <div id="logo" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a class="navbar-brand" href="{{ route('panel.inicio') }}">
                <img src="{{ asset('storage/logo.png') }}" width="100" height="100" class="img-responsive center-block" alt="Logo">
            </a>
        </div>

        {{-- BOTÓN RESPONSIVE --}}
        <div id="botoneraMovil" class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#botonera">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        {{-- MENÚ --}}
        <nav id="botonera" class="col-lg-9 col-md-9 col-sm-12 col-xs-12 collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('panel.inicio') }}">Inicio</a></li>
                <li><a href="#top">Categorías</a></li>
                <li><a href="Excursiones-Todas">Excursiones</a></li>
                <li><a href="#contactenos">Contáctenos</a></li>
            </ul>
        </nav>

    </div>
</header>



</header>

