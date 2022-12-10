<table>
    <thead>
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
                        <h5>
                            {{ $producto->nombre }}
                        </h5>
                        <h5>
                            ${{ $producto->precio }}
                        </h5>
                    @endforeach
                </td>
                <td>
                    @foreach ($sale->tables()->where('sale_id', $sale->id)->get() as $table)
                        <div>

                            <span>
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
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                Report From {{ $startDate }} to {{ $endDate }}
            </td>
            <td>
                Total: $ {{ $total }}
            </td>
        </tr>
    </tbody>
</table>
