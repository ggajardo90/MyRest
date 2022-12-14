@extends('layouts.main', ['activePage' => 'reports', 'titlePage' => 'Reportes'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h3 class="card-title text-dark">Reportes de ventas</h3>
                            <p class="card-category text-dark">Consulta los reportes de ventas</p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('reports.show') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="from">Fecha de inicio</label>
                                    <input type="date" name="from"
                                        class="form-control @error('from') is-invalid @enderror" id="from">
                                    @error('from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="from">Fecha de termino</label>
                                    <input type="date" name="to" class="form-control @error('from') is-invalid @enderror" id="to">
                                    @error('to')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning">
                                        Mostrar el informe
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @isset($total)
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h3 class="card-title text-dark">Ventas desde el dia {{ $startDate }} al {{ $endDate }}
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Producto/s</th>
                                                <th scope="col">Mesa</th>
                                                <th scope="col">Mesero</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Metodo de pago</th>
                                                <th scope="col">Estado de pago</th>
                                                <th scope="col">Fecha de venta</th>
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
                                                    <td>{{ $sale->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <p class="text-danger text-center font-weight">
                                    <span class="border border-danger p-2">
                                        Total: $ {{ number_format($total, 0, ',', '.') }}
                                    </span>
                                </p>
                                <form action="{{ route('reports.generate') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $startDate }}" name="from">
                                    <input type="hidden" value="{{ $endDate }}" name="to">
                                    <button type="submit" class="btn btn-success">Exportar a excel</button>

                                </form>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
