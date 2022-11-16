@extends('layouts.main', ['activePage' => 'sales', 'titlePage' => __('Ventas')])

@section('content')
    <div class="content" id='report'>
        <form action="{{ route('sales.store') }}" method="POST" id="add-sale">
            @csrf

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-muted border-bottom">{{ Carbon\Carbon::now() }}</h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($tables as $table)
                                        <div class="col-sm-3">
                                            <div
                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                                                <div class="align-self-end mb-2">
                                                    <input type="checkbox" name="table_id[]" id="table"
                                                        value="{{ $table->id }}">
                                                </div>
                                                <i class="material-icons fa-5x">table_restaurant</i>
                                                <span class="mt-2 text-muted font-weight-bold">
                                                    {{ $table->name }}
                                                </span>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('tables.edit', $table->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-fw fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @foreach ($categorias as $categoria)
                                            <li class="nav-item">
                                                <a class="nav-link mr-1 {{ $categoria->id === 1 ? 'active show' : '' }}"
                                                    data-toggle="pill" id="{{ $categoria->id }}-tab"
                                                    href="#{{ $categoria->id }}" role="tab"
                                                    aria-controls="{{ $categoria->id }}" aria-selected="true">
                                                    {{ $categoria->nombre }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach ($categorias as $categoria)
                                            <div class="tab-pane {{ $categoria->id === 1 ? 'active show' : '' }} fade"
                                                id="{{ $categoria->id }}" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    @foreach ($categoria->productos as $producto)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="card h-100">
                                                                <div
                                                                    class="card-body d-flex flex-column justify-content-center align-items-center">
                                                                    <div class="align-self-end mb-2">
                                                                        <input type="checkbox" name="producto_id[]"
                                                                            id="producto" value="{{ $producto->id }}">
                                                                    </div>
                                                                    <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                                        width="100" height="100"
                                                                        class="img-fluid rounded-circle"
                                                                        alt="{{ $producto->nombre }}">
                                                                    <h5 class="font-weight-bold">
                                                                        {{ $producto->nombre }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
