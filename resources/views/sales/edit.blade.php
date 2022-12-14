@extends('layouts.main', ['activePage' => 'sales', 'titlePage' => __('Ventas')])

@section('content')
    <div class="content" id='report'>
        <form action="{{ route('sales.update', $sale->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($tables as $table)
                                        <div class="col-sm-3">
                                            <div
                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                                                <div class="align-self-end mb-2">
                                                    <input type="checkbox" name="table_id[]" id="table" checked
                                                        value="{{ $table->id }}">
                                                </div>
                                                <i class="material-icons fa-5x">table_restaurant</i>
                                                <span class="mt-2 text-muted font-weight-bold">
                                                    {{ $table->name }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-md-12 card p-3">
                                        <div class="row">
                                            @foreach ($productos as $producto)
                                                <div class="col-md-4 mb-2">
                                                    <div class="card h-100">
                                                        <div
                                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                                            <div class="align-self-end mb-2">
                                                                <input type="checkbox" name="producto_id[]" id="producto"
                                                                    checked value="{{ $producto->id }}">
                                                            </div>
                                                            <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                                width="100" hight="100"
                                                                class="img-fluid rounded-circle"
                                                                alt="{{ $producto->nombre }}">
                                                            <h5 class="font-weight-bold">
                                                                {{ $producto->nombre }}
                                                            </h5>
                                                            <h5 class="text-muted">
                                                                $ {{ $producto->precio }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 mx-auto">
                                                <div class="form-group">
                                                    <select name="user_id" class="form-control">
                                                        <option value="" selected disabled>
                                                            Elija un mesero
                                                        </option>
                                                        @foreach ($users as $user)
                                                            <option {{ $user->id === $sale->user_id ? 'selected' : '' }}
                                                                value="{{ $user->id }}">
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="quantity" placeholder="Cantidad"
                                                        class="form-control" value="{{ $sale->quantity }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="price" placeholder="Precio"
                                                        class="form-control" value="{{ $sale->price }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="total" placeholder="Total"
                                                        class="form-control" value="{{ $sale->total }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="change" placeholder="Vuelto"
                                                        class="form-control" value="{{ $sale->change }}">
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
                                                        <option
                                                            {{ $sale->payment_status === 'pendiente' ? 'selected' : '' }}
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
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
