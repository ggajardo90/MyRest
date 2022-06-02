@extends('layouts.app')

@section('template_title')
    {{ $categoria->name ?? 'Show Categoria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $categoria->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $categoria->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Activa:</strong>
                            {{ $categoria->activa }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
