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
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong class="text-dark">{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                @endcan
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive-sm">
                                            <table class="table table-hover" id="tableprod">
                                                <thead class="text-primary">
                                                    <tr>
                                                        {{-- <th>ID</th> --}}
                                                        <th>Imagen</th>
                                                        <th>Categoria</th>
                                                        <th>Nombre</th>
                                                        <th>Precio</th>
                                                        <th>Descripcion</th>
                                                        <th>Stock</th>
                                                        <th class="text-center">Disponible</th>
                                                        <th class="text-right">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productos as $producto)
                                                        <tr>
                                                            {{-- <td>{{ $producto->id }}</td> --}}
                                                            <td>
                                                                <div class="img-container">
                                                                    <img src="/img/productos/{{ $producto->imagen }}"
                                                                        style="width: 100px; heigth: 100px" rel="nofollow"
                                                                        alt="imagen" class="card-img-top img-fluid">
                                                                </div>
                                                            </td>
                                                            <td>{{ $producto->categoria->nombre }}</td>
                                                            <td>{{ $producto->nombre }}</td>
                                                            <td><small>$</small>{{ number_format($producto->precio, 0, ',','.') }}</td>
                                                            <td>{{ $producto->descripcion }}</td>
                                                            <td>{{ $producto->stock }}</td>

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
                                                                    {{-- @can('producto.destroy')
                                                                        <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                                class="fa fa-fw fa-trash"></i></button>
                                                                    @endcan --}}
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                                        style="width: 300px; heigth: 300px" rel="nofollow" alt="imagen"
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
                                                        {{-- @can('producto.destroy')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i></button>
                                                        @endcan --}}
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#tableprod').DataTable({
                "language": {
                    "lengthMenu": "Mostrar " +
                        `<select class="custom-select custom-select-sm form-control form-control-sm text-center">
                            <option value = '10'>10</option>
                            <option value = '25'>25</option>
                            <option value = '50'>50</option>
                            <option value = '100'>100</option>
                            <option value = '-1'>Todos</option>
                        </select>` +
                        " productos por pagina",
                    "zeroRecords": "No se encontró nada - lo siento",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                }
            });
        });
    </script>
@endpush
