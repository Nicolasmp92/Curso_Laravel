{{-- TODO Esto es el sidebar --}}

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">CMS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Usuario</a>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route ('misdatos.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Inicio
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- !aca el formulario para mostrar usuarios --}}
                            <a href="{{route('users.index')}}" class="nav-link ">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route ('index.slide')}}" class="nav-link ">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Slide
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route ('categorias.show')}}" class="nav-link ">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Categorias
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route ('excursiones.show')}}" class="nav-link ">
                                <i class="nav-icon fas fa-bus"></i>
                                <p>
                                    Excursiones
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route ('misdatos.index')}}" class="nav-link ">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    mensajes
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
