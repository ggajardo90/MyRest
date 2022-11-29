@extends('layouts.main', ['activePage' => 'sales', 'titlePage' => __('Ventas')])

@section('content')
    <div class="content" id='report'>
        <form action="{{ route('sales.store') }}" method="post" id="add-sale">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h3 class="text-muted border-bottom">{{ Carbon\Carbon::now() }}</h3>
                                    <a href="{{ route('sales.index') }}" class="btn btn-outline-secondary">
                                        Todas las ventas
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($tables as $table)
                                        <div class="col-sm-3">
                                            <div
                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                                                <div class="align-self-end mb-2">
                                                    <input type="checkbox" name="table_id[]" id="table"
                                                        value="{{ $table->id }}">
                                                </div>
                                                <i class="material-icons fa-5x">table_restaurant</i>
                                                <span class="mt-2 text-muted font-weight-bold">
                                                    {{ $table->name }}
                                                </span>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('tables.edit', $table->slug) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-fw fa-edit"></i></a>
                                                </div>
                                                <hr>
                                                @foreach ($table->sales as $sale)
                                                    @if ($sale->created_at >= Carbon\Carbon::today())
                                                        <div style="border: 2px dashed pink" class="my-2 shadow w-100"
                                                            id="{{ $sale->id }}">
                                                            <div class="card">
                                                                <div
                                                                    class="card-body d-flex flex-column justify-content-center align-items-center">
                                                                    @foreach ($sale->productos()->where('sale_id', $sale->id)->get() as $producto)
                                                                        <h5 class="font-weight-bold">
                                                                            {{ $producto->nombre }}
                                                                        </h5>
                                                                        <h5 class="text-muted">
                                                                            ${{ $producto->precio }}
                                                                        </h5>
                                                                    @endforeach
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        <span class="badge badge-danger">
                                                                            Mesero : {{ $sale->user->name }}
                                                                        </span>
                                                                    </h5>
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        <span class="badge badge-secondary">
                                                                            Cantidad : {{ $sale->quantity }}
                                                                        </span>
                                                                    </h5>
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        <span class="badge badge-light">
                                                                            Total : {{ $sale->total }}
                                                                        </span>
                                                                    </h5>
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        <span class="badge badge-light">
                                                                            Vuelto : {{ $sale->change }}
                                                                        </span>
                                                                    </h5>
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        <span class="badge badge-light">
                                                                            Metodo de pago : {{ $sale->payment_type }}
                                                                        </span>
                                                                    </h5>
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        <span class="badge badge-light">
                                                                            Estado de pago : {{ $sale->payment_status }}
                                                                        </span>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 d-flex justify-content-between">
                                                            <a href="{{ route('sales.edit', $sale->id) }}"
                                                                class="btn btn-sm btn-warning mr-2">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#" target="_blank"
                                                                onclick="print({{ $sale->id }})"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @foreach ($categorias as $categoria)
                                            <li class="nav-item">
                                                <a class="nav-link mr-1 {{ $categoria->slug === 'neque' ? 'active show' : '' }}"
                                                    data-toggle="pill" id="{{ $categoria->slug }}-tab"
                                                    href="#{{ $categoria->slug }}" role="tab"
                                                    aria-controls="{{ $categoria->slug }}" aria-selected="true">
                                                    {{ $categoria->nombre }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach ($categorias as $categoria)
                                            <div class="tab-pane {{ $categoria->slug === 'neque' ? 'active show' : '' }}"
                                                id="{{ $categoria->slug }}" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    @foreach ($categoria->productos as $producto)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="card h-100">
                                                                <div
                                                                    class="card-body d-flex flex-column justify-content-center align-items-center">
                                                                    <div class="align-self-end mb-2">
                                                                        <input type="checkbox" name="producto_id[]"
                                                                            id="producto" value="{{ $producto->id }}">
                                                                    </div>
                                                                    <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                                        width="100" hight="100"
                                                                        class="img-fluid rounded-circle"
                                                                        alt="{{ $producto->nombre }}">
                                                                    <h5 class="font-weight-bold">
                                                                        {{ $producto->nombre }}
                                                                    </h5>
                                                                    <h5 class="text-muted">
                                                                        ${{ $producto->precio }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="quantity" placeholder="Cantidad"
                                                    class="form-control" value="{{ old('quantity') }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="price" placeholder="Precio"
                                                    class="form-control" value="{{ old('price') }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="total" placeholder="Total"
                                                    class="form-control" value="{{ old('total') }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="change" placeholder="Vuelto"
                                                    class="form-control" value="{{ old('change') }}">
                                            </div>
                                            <div class="form-group">
                                                <select name="payment_type" class="form-control">
                                                    <option value="" selected disabled>
                                                        Metodo de pago
                                                    </option>
                                                    <option value="cash">
                                                        Efectivo
                                                    </option>
                                                    <option value="card">
                                                        Tarjeta
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="payment_status" class="form-control">
                                                    <option value="" selected disabled>
                                                        Metodo de pago
                                                    </option>
                                                    <option value="paid">
                                                        Pagado
                                                    </option>
                                                    <option value="unpaid">
                                                        No pagado
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button
                                                    onclick="event.preventDefault(); document.getElementById('add-sale').submit()"
                                                    class="btn btn-primary">
                                                    Submit
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
        </form>
    </div>
@endsection
@section('javascript')
    <script>
        function print(el) {
            const restorePage = document.body.innerHTML;
            const printContent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = restorePage;
        }
    </script>
@endsection
