@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Información de categoria'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">{{ $categoria->nombre }}</h3>
                            <p class="card-category text-dark">{{ $categoria->descripcion }}</p>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ml-auto mr-auto">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <img src="/img/categorias/{{ $categoria->imagen }}" alt="imagen"
                                                class="card-img-top img-fluid">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title"><strong>Activa:</strong> {{ $categoria->activa }}</h3><br>
                                            <p class="text-muted">Creado el: {{ $categoria->created_at }}</p>
                                        </div>
                                        <div class="card-footer ml-auto mr-auto">
                                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Volver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
