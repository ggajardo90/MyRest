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
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong class="text-dark">{{ $message }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            @endcan

                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Imagen</th>
                                            <th class="text-center">Disponible</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{ $categoria->id }}</td>
                                                <td>{{ $categoria->nombre }}</td>
                                                <td>{{ $categoria->descripcion }}</td>
                                                <td>
                                                    <div class="img-container">
                                                        <img src="/img/categorias/{{ $categoria->imagen }}"
                                                            style="width: 100px; heigt: 100px" rel="nofollow" alt="imagen"
                                                            class="card-img-top img-fluid">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if ($categoria->activa)
                                                        <i class="material-icons text-success">check_circle</i>
                                                    @else
                                                        <i class="material-icons text-danger">cancel</i>
                                                    @endif
                                                </td>

                                                <td class="text-right">
                                                    <form action="{{ route('categorias.destroy', $categoria->slug) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('¿Estas Seguro que quieres Eliminar una categoria?')">
                                                        <a class="btn btn-just-icon btn-primary"
                                                            href="{{ route('categorias.show', $categoria->slug) }}"><i
                                                                class="fa fa-eye"></i></a>
                                                        @can('categoria.edit')
                                                            <a class="btn btn-just-icon btn-success"
                                                                href="{{ route('categorias.edit', $categoria->slug) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- @can('categoria.destroy')
                                                            <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        @endcan --}}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer flex-column justify-content-center align-items-center">

                            <ul class="pagination">
                                <li>{{ $categorias->links() }}</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
