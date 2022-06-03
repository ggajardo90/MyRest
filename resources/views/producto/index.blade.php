@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Productos'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-head card-header-warning">
                                    <h4 class="card-title text-dark">Productos</h4>
                                    <p class="card-category text-dark">Productos registrados en el sistema</p>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{route('productos.create')}}" class="btn btn-facebook">Nuevo Producto</a>
                                        </div>
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Categoria</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Descripcion</th>
                                                <th>Stock</th>
                                                <th>Imagen</th>
                                                <th>Activo</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($productos as $producto)
                                                    <tr>
                                                        <td>{{ $producto->id }}</td>
                                                        <td>{{ $producto->categoria->nombre }}</td>
                                                        <td>{{ $producto->nombre }}</td>
                                                        <td>{{ $producto->precio }}</td>
                                                        <td>{{ $producto->descripcion }}</td>
                                                        <td>{{ $producto->stock }}</td>
                                                        <td>{{ $producto->imagen }}</td>
                                                        <td>{{ $producto->activo }}</td>

                                                        <td class="text-right">
                                                            <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                                <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                                <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {!! $productos->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
