@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Categorias'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">Categorias</h3>
                            <p class="card-category text-dark">Categorias registradas en el sistema</p>
                        </div>

                        <div class="card-body">
                            @can('categoria.create')
                                <div class="col-12 text-right">
                                    <a href="{{ route('categorias.create') }}" class="btn btn-warning">Nueva
                                        Categoria</a>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            @endcan

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Imagen</th>
                                        <th>Activa</th>
                                        <th class="text-right">Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{ $categoria->id }}</td>
                                                <td>{{ $categoria->nombre }}</td>
                                                <td>{{ $categoria->descripcion }}</td>
                                                <td>{{ $categoria->imagen }}</td>
                                                <td>{{ $categoria->activa }}</td>

                                                <td class="text-right">
                                                    <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('¿Estas Seguro que quieres Eliminar una categoria?')">
                                                        <a class="btn btn-just-icon btn-primary"
                                                            href="{{ route('categorias.show', $categoria->id) }}"><i
                                                                class="fa fa-eye"></i></a>
                                                        @can('categoria.edit')
                                                            <a class="btn btn-just-icon btn-success"
                                                                href="{{ route('categorias.edit', $categoria->id) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('categoria.destroy')
                                                            <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer mr-auto">
                                {{ $categorias->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
