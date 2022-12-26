@extends('layouts.main', ['activePage' => 'sales', 'titlePage' => __('Ventas')])

@section('content')
    <div class="content" id='report'>
        <form action="{{ route('sales.update', $sale->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <div class="row">
                                    <div class="col-md-8">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($tables as $table)
                                        <div class="col-sm-3">
                                            <div
                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                                                <span class="mt-2 font-weight-bold">
                                                    {{ $table->name }}
                                                </span>
                                                <div class="align-self-end mb-2 form-check form-check-radio">
                                                    <input type="radio" class="btn-check" name="table_id[]" checked
                                                        id="table{{ $table->id }}" autocomplete="off"
                                                        value="{{ $table->id }}" data-toggle="modal"
                                                        data-target="#table_{{ $table->id }}">
                                                </div>
                                                @if ($table->status == 0)
                                                    <label class="btn btn-success btn-lg" for="table{{ $table->id }}"><i
                                                            class="material-icons fa-5x">table_restaurant</i></label>
                                                @else
                                                    <label class="btn btn-danger btn-lg" for="table{{ $table->id }}"><i
                                                            class="material-icons fa-5x">table_restaurant</i></label>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center"></th>
                                                <th class="th-description">Nombre</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="producto_id[]" checked id="producto"
                                                            value="{{ $producto->id }}">
                                                    </td>
                                                    <td>
                                                        <div class="img-container">
                                                            <img class="rounded mx-auto d-block" height="50"
                                                                width="50"
                                                                src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                                rel="nofollow" alt="{{ $producto->nombre }}">
                                                        </div>
                                                    </td>
                                                    <td class="td-name">
                                                        {{ $producto->nombre }}
                                                        {{-- <br><small>{{ $producto->descripcion }}</small> --}}
                                                    </td>

                                                    <td class="td-number">
                                                        <small>$</small>{{ number_format($producto->precio, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-6 mx-auto">
                                    <div class="form-group">
                                        <label for="user_id">Mesero</label>
                                        <select name="user_id" class="form-control">
                                            <option value="{{ Auth::user()->id }}">
                                                {{ Auth::user()->name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="quantity" placeholder="Cantidad" class="form-control"
                                            value="{{ $sale->quantity }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="price" placeholder="Precio" class="form-control"
                                            value="{{ $sale->price }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="total" placeholder="Total" class="form-control"
                                            value="{{ $sale->total }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="change" placeholder="Vuelto" class="form-control"
                                            value="{{ $sale->change }}">
                                    </div>
                                    <div class="form-group">
                                        <select name="payment_type" class="form-control">
                                            <option value="" selected disabled>
                                                Metodo de pago
                                            </option>
                                            <option {{ $sale->payment_type === 'efectivo' ? 'selected' : '' }}
                                                value="efectivo">
                                                Efectivo
                                            </option>
                                            <option {{ $sale->payment_type === 'tarjeta' ? 'selected' : '' }}
                                                value="tarjeta">
                                                Tarjeta
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="payment_status" class="form-control">
                                            <option value="" selected disabled>
                                                Estado de pago
                                            </option>
                                            <option {{ $sale->payment_status === 'pagado' ? 'selected' : '' }}
                                                value="pagado">
                                                Pagado
                                            </option>
                                            <option {{ $sale->payment_status === 'pendiente' ? 'selected' : '' }}
                                                value="pendiente">
                                                Pendiente
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
