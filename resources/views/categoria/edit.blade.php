@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Editar Categoria'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('categorias.update', $categoria->id) }}" method="post" role="form"
                        enctype="multipart/form-data">

                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title text-dark">Categorias</h3>
                                    <p class="card-category text-dark">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                {{ method_field('PATCH') }}
                                @csrf

                                @include('categoria.form')
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@includeif('partials.errors')
