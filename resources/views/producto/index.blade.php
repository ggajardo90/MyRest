@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => 'Productos'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @can('producto.index.table')
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title text-dark">Productos</h3>
                                <p class="card-category text-dark">Productos registrados en el sistema</p>
                            </div>

                            <div class="card-body">
                                @can('producto.create')
                                    <div class="col-12 text-right">
                                        <a href="{{ route('productos.create') }}" class="btn btn-warning">Nuevo
                                            Producto</a>
                                    </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                @endcan

                                <div class="table-responsive-sm">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Categoria</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Descripcion</th>
                                                <th>Stock</th>
                                                <th>Imagen</th>
                                                <th class="text-center">Disponible</th>
                                                <th class="text-right">Acciones</th>
                                            </tr>
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
                                                    <td>
                                                        <div class="img-container">
                                                            <img src="/img/productos/{{ $producto->imagen }}"
                                                                style="width: 100px; heigt: 100px" rel="nofollow" alt="imagen"
                                                                class="card-img-top img-fluid">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($producto->activa)
                                                            <i class="material-icons text-danger">cancel</i>
                                                        @else
                                                            <i class="material-icons text-success">check_circle</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        <form action="{{ route('productos.destroy', $producto->slug) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('¿Estas Seguro que quieres Eliminar una categoria?')">
                                                            <a class="btn btn-just-icon btn-primary "
                                                                href="{{ route('productos.show', $producto->slug) }}"><i
                                                                    class="fa fa-eye"></i></a>
                                                            @can('producto.edit')
                                                                <a class="btn btn-just-icon btn-success"
                                                                    href="{{ route('productos.edit', $producto->slug) }}"><i
                                                                        class="fa fa-fw fa-edit"></i></a>
                                                            @endcan
                                                            @csrf
                                                            @method('DELETE')
                                                            @can('producto.destroy')
                                                                <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                        class="fa fa-fw fa-trash"></i></button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer mr-auto">
                                    {!! $productos->links() !!}
                                    <p>
                                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collimgprod" aria-expanded="false" aria-controls="collimgprod">
                                            Ver productos con imagenes
                                        </button>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="collapse" id="collimgprod">
                        @endcan

                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title text-dark">Productos</h3>
                                <p class="card-category text-dark">Productos registrados en el sistema</p>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    @foreach ($productos as $producto)
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                            <div class="card">

                                                <div class="img-container text-center">
                                                    <img src="/img/productos/{{ $producto->imagen }}"
                                                        style="width: 300px; heigt: 300px" rel="nofollow" alt="imagen"
                                                        class="card-img-top img-fluid">
                                                </div>

                                                <div class="card-body">
                                                    <h4 class="card-title"><strong>Nombre:</strong>
                                                        {{ $producto->nombre }}</h4>
                                                    <h4 class="card-text"><strong>Categoria:</strong>
                                                        {{ $producto->categoria->nombre }}</h4>
                                                    <p class="card-text"><strong>Descripción:</strong>
                                                        {{ $producto->descripcion }}</p>
                                                    <h4 class="card-title"><strong>Precio:</strong>
                                                        ${{ $producto->precio }} CLP</h4>
                                                </div>
                                                <div class="card-footer ml-auto mr-auto">
                                                    <form action="{{ route('productos.destroy', $producto->slug) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('¿Estas Seguro que deseas Eliminar un Producto?')">
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('productos.show', $producto->slug) }}"><i
                                                                class="fa fa-fw fa-eye"></i></a>

                                                        @can('producto.edit')
                                                            <a class="btn btn-success btn-sm"
                                                                href="{{ route('productos.edit', $producto->slug) }}"><i
                                                                    class="fa fa-fw fa-edit"></i></a>
                                                        @endcan

                                                        @method('DELETE')
                                                        @can('producto.destroy')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i></button>
                                                        @endcan
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

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
@endsection
