@extends('layouts.main', ['activePage' => 'sales', 'titlePage' => __('Ventas')])

@section('content')
    <div class="content" id='report'>
        <form action="{{ route('sales.store') }}" method="post" id="add-sale">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card-title text-dark">Mesas del restaurante</h3>
                                        <p class="card-category text-dark">Fecha
                                            {{ Carbon\Carbon::now()->toDateString() }}</p>
                                    </div>
                                    <div class="col-sm text-right">
                                        <a href="{{ route('sales.index') }}" class="btn btn-secondary">
                                            Todas las ventas
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($tables as $table)
                                        <div class="col-sm-3">
                                            <div
                                                class="card p-2 mb-2 d-flex flex-column justify-content-center align-items-center">
                                                {{-- <div class="align-self-end mb-2 form-check form-check-radio">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="table_id[]"
                                                            id="table" value="{{ $table->id }}" data-toggle="modal"
                                                            data-target="#table_{{ $table->id }}">

                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div> --}}

                                                <span class="mt-2 font-weight-bold">
                                                    {{ $table->name }}
                                                </span>
                                                <div class="align-self-end mb-2 form-check form-check-radio">
                                                    <input type="radio" class="btn-check" name="table_id[]"
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
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="table_{{ $table->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLongTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog-scrollable modal-dialog ">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        {{ $table->name }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @foreach ($table->sales as $sale)
                                                                        @if ($sale->created_at >= Carbon\Carbon::today() and $sale->payment_status == 'pendiente')
                                                                            <div style="border: 2px dashed pink"
                                                                                class="my-2 shadow w-100"
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
                                                                                            <span
                                                                                                class="badge badge-danger">
                                                                                                Mesero :
                                                                                                {{ $sale->user->name }}
                                                                                            </span>
                                                                                        </h5>
                                                                                        <h5 class="font-weight-bold mt-2">
                                                                                            <span
                                                                                                class="badge badge-secondary">
                                                                                                Cantidad :
                                                                                                {{ $sale->quantity }}
                                                                                            </span>
                                                                                        </h5>
                                                                                        <h5 class="font-weight-bold mt-2">
                                                                                            <span class="badge badge-light">
                                                                                                Total : {{ $sale->total }}
                                                                                            </span>
                                                                                        </h5>
                                                                                        <h5 class="font-weight-bold mt-2">
                                                                                            <span class="badge badge-light">
                                                                                                Vuelto :
                                                                                                {{ $sale->change }}
                                                                                            </span>
                                                                                        </h5>
                                                                                        <h5 class="font-weight-bold mt-2">
                                                                                            <span class="badge badge-light">
                                                                                                Metodo de pago :
                                                                                                {{ $sale->payment_type }}
                                                                                            </span>
                                                                                        </h5>
                                                                                        <h5 class="font-weight-bold mt-2">
                                                                                            <span class="badge badge-light">
                                                                                                Estado del pedido :
                                                                                                {{ $sale->payment_status }}
                                                                                            </span>
                                                                                        </h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="mt-2 d-flex justify-content-between">
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
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    {{-- <button type="button" class="btn btn-primary">Save
                                                                        changes</button> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
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
                            </div>
                            <div class="card-body">

                                <div class="tab-content" id="pills-tabContent">
                                    @foreach ($categorias as $categoria)
                                        <div class="tab-pane" id="{{ $categoria->slug }}" role="tabpanel"
                                            aria-labelledby="pills-home-tab">


                                            {{-- <div class="col-md-4 mb-2">
                                                            <div class="card h-100">
                                                                <div class="align-self-end mb-2">
                                                                    <input type="checkbox" name="producto_id[]"
                                                                        id="producto" value="{{ $producto->id }}">
                                                                </div>
                                                                <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                                    height="100" width="100"
                                                                    class="rounded mx-auto d-block"
                                                                    alt="{{ $producto->nombre }}">
                                                                <div class="card-body d-flex justify-content-center">
                                                                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                                                                    <h5 class="text-muted">
                                                                        ${{ $producto->precio }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                            {{-- <div class="col-md-4 mb-2">
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
                                                        </div> --}}
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-center"></th>
                                                            <th class="th-description">Nombre</th>
                                                            <th class="th-description">Stock</th>
                                                            <th class="text-right">Precio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($categoria->productos as $producto)
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="producto_id[]"
                                                                        id="producto" value="{{ $producto->id }}">
                                                                </td>
                                                                <td>
                                                                    <div class="img-container">
                                                                        <img class="rounded mx-auto d-block"
                                                                            height="50" width="50"
                                                                            src="{{ asset('img/productos/' . $producto->imagen) }}"
                                                                            rel="nofollow" alt="{{ $producto->nombre }}">
                                                                    </div>
                                                                </td>
                                                                <td class="td-name">
                                                                    <a href="">{{ $producto->nombre }}</a>
                                                                    {{-- <br><small>{{ $producto->descripcion }}</small> --}}
                                                                </td>
                                                                <td>
                                                                    {{ $producto->stock }}
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 mx-auto">
                                        <div class="form-group">
                                            <select name="user_id" class="form-control">
                                                {{-- <option value="" selected disabled>
                                                    Elija un mesero
                                                </option> --}}
                                                <option value="{{ Auth::user()->id }}"> {{ Auth::user()->name }}
                                                </option>
                                                {{-- @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach --}}
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
                                                <option value="efectivo">
                                                    Efectivo
                                                </option>
                                                <option value="tarjeta">
                                                    Tarjeta
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="payment_status" class="form-control">
                                                <option value="" selected disabled>
                                                    Estado del pago
                                                </option>
                                                <option value="pagado">
                                                    Pagado
                                                </option>
                                                <option value="pendiente">
                                                    Pendiente
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button
                                                onclick="event.preventDefault(); document.getElementById('add-sale').submit()"
                                                class="btn btn-primary">
                                                Agregar
                                            </button>
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
