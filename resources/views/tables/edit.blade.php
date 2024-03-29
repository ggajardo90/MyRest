@extends('layouts.main', ['activePage' => 'tables', 'titlePage' => 'Editar Mesa'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('tables.update', $table->slug) }}">

                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title text-dark">Mesas</h3>
                                <p class="card-category text-dark">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method("PUT")
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
