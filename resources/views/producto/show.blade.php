@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Información de producto'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">{{ $producto->nombre }}</h3>
                            <p class="card-category text-dark">Pertenece a categoria
                                <b>{{ $producto->categoria->nombre }}</b>
                            </p>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ml-auto mr-auto">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <img src="/img/productos/{{ $producto->imagen }}" alt="imagen"
                                                class="card-img-top img-fluid">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><strong>Precio:</strong> ${{ $producto->precio }}</h4>
                                            <h4 class="card-title"><strong>Stock:</strong> {{ $producto->stock }}</h4>
                                            <p><strong>Descripcion:</strong> {{ $producto->descripcion }}
                                            <br><strong>Activo:</strong> {{ $producto->activo }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
