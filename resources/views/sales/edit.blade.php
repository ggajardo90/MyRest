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
                                                        <input type="checkbox" name="producto_id[]" id="producto"
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
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    @foreach ($categorias as $categoria)
                                        <li class="nav-item">
                                            <a class="nav-link mr-1 {{ $categoria->slug === 'neque' ? 'active show' : '' }} catcheckbox"
                                                data-toggle="pill" id="{{ $categoria->slug }}-tab"
                                                href="#{{ $categoria->slug }}" role="tab"
                                                aria-controls="{{ $categoria->slug }}" aria-selected="true"
                                                data-id="{{ $categoria->id }}">
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
                                                                    <input class="productocheckbox" type="checkbox"
                                                                        name="producto_id[]" id="producto"
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
                                        <label for="quantity">Cantidad</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control"
                                            value="{{ $sale->quantity }}">
                                        @if ($errors->has('quantity'))
                                            <div id="quantity-error" class="error text-danger pl-3" for="quantity"
                                                style="display: block;">
                                                <strong>{{ $errors->first('quantity') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="{{ $sale->price }}">
                                        @if ($errors->has('price'))
                                            <div id="price-error" class="error text-danger pl-3" for="price"
                                                style="display: block;">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Total</label>
                                        <input type="number" name="total" id="total" class="form-control"
                                            value="{{ $sale->total }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pagacon">Paga con</label>
                                        <input type="number" name="paga" id="paga" oninput="vuelto()"
                                            class="form-control" value="{{ old('paga') }}">
                                        @if ($errors->has('paga'))
                                            <div id="paga-error" class="error text-danger pl-3" for="paga"
                                                style="display: block;">
                                                <strong>{{ $errors->first('paga') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vuelto">Vuelto</label>
                                        <input type="number" name="change" id="change" class="form-control"
                                            value="{{ $sale->change }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_type">Metodo de pago</label>
                                        <select name="payment_type" class="form-control">
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
                                        <label for="payment_status">Metodo de pago</label>
                                        <select name="payment_status" class="form-control">
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
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        const categorias = @json($categorias)

        function vuelto() {
            try {
                var total = parseFloat(document.getElementById("total").value) || 0,
                    paga = parseFloat(document.getElementById("paga").value) || 0;

                var vuelto = paga - total;

                document.getElementById("total").value = total;
                document.getElementById("change").value = vuelto || 0;
            } catch (e) {}
        }

        var catid;

        $('.catcheckbox').on('click', function() {

            catid = $(this).attr("data-id");
            console.log("Categoria: ", catid)
        })

        const subtotal = [];
        const initialValue = 0;

        $('.productocheckbox').on('click', function() {
            const {
                productos
            } = categorias.find(cat => cat.id == catid)

            var prodid = $(this).val()

            if ($(this).is(':checked')) {
                const producto = productos.find(prod => prod.id == prodid)
                subtotal.push(parseInt(producto.precio))
                console.log(subtotal)
            } else {
                subtotal.pop()
                console.log(subtotal)
            }

            calcular(subtotal)
        })

        function calcular(subtotal) {
            try {
                const sumWithInitial = subtotal.reduce((
                    accumulator, currentValue
                ) => accumulator + currentValue, initialValue);
                document.getElementById("price").value = sumWithInitial;

                var quantity = parseFloat(document.getElementById("quantity").value) || 1,
                    price = parseFloat(document.getElementById("price").value) || 0;

                var total = quantity * price;

                document.getElementById("total").value = total;
                //document.getElementById("change").value = vuelto;
            } catch (e) {}
        }
        // console.log(categorias)

        $(document).ready(function() {
            var total = parseFloat(document.getElementById("total").value) || 0;
            subtotal.push(total)
            console.log(subtotal)
        });
    </script>
@endpush
