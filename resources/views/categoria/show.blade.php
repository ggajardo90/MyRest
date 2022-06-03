@extends('layouts.main', ['activePage' => 'categorias','titlePage' => 'Información de categoria'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title text-dark">{{$categoria->nombre}}</h4>
                        <p class="card-category text-dark">{{$categoria->descripcion}}</p>
                    </div>
                    <div class="card-body">
                        
                        
                        <!--<div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $categoria->descripcion }}
                        </div>-->
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $categoria->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Activa:</strong>
                            {{ $categoria->activa }}
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
