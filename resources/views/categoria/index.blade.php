@extends('layouts.main', ['activePage' => 'categorias', 'titlePage' => 'Categorias'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-head card-header-warning">
                                    <h4 class="card-title text-dark">Categorias</h4>
                                    <p class="card-category text-dark">Categorias registradas en el sistema</p>
                                </div>

                                <div class="card-body">
                                    @can('categoria.create')

                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{route('categorias.create')}}" class="btn btn-facebook">Nueva Categoria</a>
                                        </div>
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                    </div>
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
                                                            <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                                                <a class="btn btn-sm btn-primary" href="{{ route('categorias.show',$categoria->id) }}"><i class="fa fa-eye"></i> Ver</a>
                                                                @can('categoria.edit')
                                                                <a class="btn btn-sm btn-success" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                                                @endcan
                                                                @csrf
                                                                @method('DELETE')
                                                                @can('categoria.destroy')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                                                                @endcan
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {{$categorias->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
