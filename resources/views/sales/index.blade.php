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


                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Producto/s</th>
                                            <th>Mesa</th>
                                            <th>Mesero</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th>Metodo de pago</th>
                                            <th>Estado de pago</th>
                                        </tr>
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
                                                <td>
                                                    @foreach ($sale->tables()->where('sale_id', $sale->id)->get() as $table)
                                                        <div
                                                            class="mb-1 d-flex flex-column justify-content-center align-items-center">
                                                            <i class="material-icons fa-3x">table_restaurant</i>
                                                            <span class="mt-2 text-muted">
                                                                {{ $table->name }}
                                                            </span>

                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td>{{ $sale->user->name }}</td>
                                                <td>{{ $sale->quantity }}</td>
                                                <td>{{ $sale->total }}</td>
                                                <td>{{ $sale->payment_type }}</td>
                                                <td>{{ $sale->payment_status }}</td>

                                                <td class="text-right">
                                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST"
                                                        onsubmit="return confirm('¿Estas seguro que quieres eliminar esa venta?')">

                                                        <a class="btn btn-just-icon btn-success"
                                                            href="{{ route('sales.edit', $sale->id) }}"><i
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
                                <div class="d-flex justify-content-center">
                                    {{ $sales->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
