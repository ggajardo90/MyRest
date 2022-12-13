<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <img src="{{ asset('/img/favicon.png') }}" width="50" height="50" class="d-inline-block align-top"
                alt=""><br>
            {{ __('MyRest') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            @can('sales.index')
                <li class="nav-item{{ $activePage == 'sales' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('sales.create') }}">
                        <i class="material-icons">local_grocery_store</i>
                        <p>{{ __('Ventas') }}</p>
                    </a>
                </li>
            @endcan

            @can('reports.index')
                <li class="nav-item{{ $activePage == 'reports' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('reports.index') }}">
                        <i class="material-icons">insert_chart</i>
                        <p>{{ __('Reportes') }}</p>
                    </a>
                </li>
            @endcan

            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i class="material-icons">settings</i>
                    <p>{{ __('Configuraciones') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="laravelExample">
                    <ul class="nav">
                        @can('categoria.index')
                            <li class="nav-item{{ $activePage == 'categorias' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('categoria.index') }}">
                                    <i class="material-icons">menu_book</i>
                                    <p>{{ __('Categorias') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('producto.index')
                            <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('producto.index') }}">
                                    <i class="material-icons">restaurant</i>
                                    <p>{{ __('Productos') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('tables.index')
                            <li class="nav-item{{ $activePage == 'tables' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('tables.index') }}">
                                    <i class="material-icons">table_restaurant</i>
                                    <p>{{ __('Mesas') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('user.index')
                            <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    <i class="material-icons">group</i>
                                    <p>{{ __('Usuarios') }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
