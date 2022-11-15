@extends('layouts.main', ['activePage' => 'tables', 'titlePage' => 'Nueva Mesa'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('tables.store') }}" method="post" role="form" enctype="multipart/form-data"
                        class="form-horizontals">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title text-dark">Agregar una nueva mesa</h3>
                                <p class="card-category text-dark">Ingrese los datos</p>
                            </div>
                            <div class="card-body">
                                @include('tables.form')
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
