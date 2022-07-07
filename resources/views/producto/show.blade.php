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

                            <!--<div class="form-group">
                                        <strong>Categoria:</strong>
                                        {{ $producto->categoria->nombre }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        {{ $producto->nombre }}
                                    </div>-->
                            <div class="form-group">
                                <strong>Precio:</strong>
                                ${{ $producto->precio }}
                            </div>
                            <div class="form-group">
                                <strong>Descripcion:</strong>
                                {{ $producto->descripcion }}
                            </div>
                            <div class="form-group">
                                <strong>Stock:</strong>
                                {{ $producto->stock }}
                            </div>
                            <div class="form-group">
                                <strong>Imagen:</strong>
                                {{ $producto->imagen }}
                            </div>
                            <div class="form-group">
                                <strong>Activo:</strong>
                                {{ $producto->activo }}
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
