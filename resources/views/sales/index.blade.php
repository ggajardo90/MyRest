@extends('layouts.main', ['activePage' => 'sales', 'titlePage' => 'Ordenes'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">Ordenes</h3>
                            <p class="card-category text-dark"></p>
                        </div>

                        <div class="card-body">

                            <div class="col-12 text-right">
                                <a href="{{ route('sales.create') }}" class="btn btn-warning">Nuevo
                                    Producto</a>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif


                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Table</th>
                                        <th>Mesero</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Metodo de pago</th>
                                        <th>Estado de pago</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ $sale->id }}</td>
                                                <td>
                                                    @foreach ($sale->productos()->where('sale_id', $sale->id)->get() as $producto)
                                                        <h5 class="font-weight-bold">
                                                            {{ $producto->nombre }}
                                                        </h5>
                                                        <h5 class="text-muted">
                                                            ${{ $producto->precio }}
                                                        </h5>
                                                    @endforeach
                                                </td>
                                                <td>{{ $producto->descripcion }}</td>
                                                <td>{{ $producto->stock }}</td>

                                                <td class="text-right">
                                                    <form action="{{ route('productos.destroy', $producto->slug) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('¿Estas Seguro que quieres Eliminar una categoria?')">
                                                        <a class="btn btn-just-icon btn-primary "
                                                            href="{{ route('productos.show', $producto->slug) }}"><i
                                                                class="fa fa-eye"></i></a>

                                                        <a class="btn btn-just-icon btn-success"
                                                            href="{{ route('productos.edit', $producto->slug) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-just-icon btn-danger"><i
                                                                class="fa fa-fw fa-trash"></i></button>

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
        </div>
    </div>
@endsection
