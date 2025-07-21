{{-- TODO este es el navbar --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>





    {{-- TODO Configuraciones usuaris --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- usuario nombre --}}
        <div class="user-panel  d-flex">

            <div class="image w-20 h-20">
                <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info text-muted">
                <a href="#" class="text-muted d-block"> {{auth()->user()->name}} </a>
                {{-- {{auth()->user()->name}} --}}

            </div>
        </div>

        <li class="nav-item dropdown">
            <!-- BOTÓN QUE ABRE EL DROPDOWN -->
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-caret-down"></i>
            </a>
            <!-- MENÚ DESPLEGABLE -->
            <div class="dropdown-menu dropdown-menu-right">
                <!-- ITEM: AJUSTES -->
                <a href="{{route ('misdatos.index')}}" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Ajustes
                </a>
                <div class="dropdown-divider"></div>
                <!-- ITEM: LOGOUT -->
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                </a>
                <!-- FORMULARIO INVISIBLE -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
