@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Hola {{ Auth::user()->name }} <small class="text-muted">Bienvenido nuevamente</small></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">menu_book</i>
                            </div>
                            <p class="card-category">Categorias registradas en el sistema</p>
                            <h3 class="card-title">{{ $categorias }}
                                <small>Categorias</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">visibility</i>
                                <a href="{{ route('categoria.index') }}">Ver categorias</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">table_restaurant</i>
                            </div>
                            <p class="card-category">Productos registrados en el sistema</p>
                            <h3 class="card-title">{{ $productos }} Productos</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">visibility</i>
                                <a href="{{ route('productos.index') }}">Ver productos</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">group</i>
                            </div>
                            <p class="card-category">Usuarios registrados en el sistema</p>
                            <h3 class="card-title">{{ $users }} Usuarios</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">visibility</i>
                                <a href="{{ route('users.index') }}">Ver usuarios</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Ventas</p>
                            <h3 class="card-title">${{ number_format($sales, 0, ',', '.') }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">visibility</i>
                                <a href="{{ route('sales.index') }}">Ver ventas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">
                            <div class="ct-chart" id="dailySalesChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Ventas diarias</h4>
                            <p class="card-category">
                                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> incremento en las
                                ventas de hoy.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> actualizado hace 4 minutos.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-warning">
                            <div class="ct-chart" id="websiteViewsChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Subscripcion de correo electronico</h4>
                            <p class="card-category">Rendimiento de la última campaña</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campaña enviada hace 2 días
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-danger">
                            <div class="ct-chart" id="completedTasksChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Tareas Completadas</h4>
                            <p class="card-category">Rendimiento de la última campaña</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campaña enviada hace 2 días
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
