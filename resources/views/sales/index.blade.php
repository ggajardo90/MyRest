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
                                <a href="{{ route('sales.create') }}" class="btn btn-warning">Nueva Venta
                                </a>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong class="text-dark">{{ $message }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th>Producto/s</th>
                                            <th>Mesa</th>
                                            <th>Mesero</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th>Metodo de pago</th>
                                            <th>Estado de pago</th>
                                            <th>Fecha de venta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                {{-- <td>{{ $sale->id }}</td> --}}
                                                <td>
                                                    @foreach ($sale->productos()->where('sale_id', $sale->id)->get() as $producto)
                                                        <h5 class="font-weight-bold">
                                                            {{ $producto->nombre }}
                                                        </h5>
                                                        <h5 class="text-muted">
                                                            ${{ number_format($producto->precio, 0, ',', '.') }}
                                                        </h5>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($sale->tables()->where('sale_id', $sale->id)->get() as $table)
                                                        <span class="mt-2 text-muted">
                                                            {{ $table->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $sale->user->name }}</td>
                                                <td>{{ $sale->quantity }}</td>
                                                <td>${{ number_format($sale->total, 0, ',', '.') }}</td>
                                                <td>{{ $sale->payment_type }}</td>
                                                <td>{{ $sale->payment_status }}</td>
                                                <td>{{ $sale->created_at }}</td>

                                                <td class="text-right">
                                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST"
                                                        onsubmit="return confirm('¿Estas seguro que quieres cerrar esta venta?')">

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
