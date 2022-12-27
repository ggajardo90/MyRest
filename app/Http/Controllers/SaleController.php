<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Table;
use App\Models\Categoria;

use App\Models\ProductoSale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index')->with([
            "sales" => Sale::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create')->with([
            "tables" => Table::all(),
            "categorias" => Categoria::has('productos')->get(),
            "users" => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            "table_id" => 'required',
            "producto_id" => 'required',
            'user_id' => 'required',
            "quantity" => 'required',
            'price' => 'required',
            'total' => 'required',
            'payment_status' => 'required',
            'payment_type' => 'required'
        ], [
            'table_id.required' => 'Debes seleccionar una mesa',
            'producto_id.required' => 'Selecciona al menos un producto',
            'user_id.required' => 'Debes seleccionar una mesa',
            'quantity.required' => 'Debes agregar la cantidad',
            'price.required' => 'El precio no puede estar vacio',
            'total.required' => 'El total no puede estar vacio',
            'payment_status.required' => 'Debes seleccionar el estado del pago',
            'payment_type.required' => 'Debes seleccionar el metodo de pago'
        ]);

        $sale = new Sale();
        $sale->user_id = $request->user_id;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;
        $sale->total = $request->total;
        $sale->change = $request->change;
        $sale->payment_status = $request->payment_status;
        $sale->payment_type = $request->payment_type;


        $sale->save();

        foreach ($request->producto_id as $value) {
            ProductoSale::create([
                'producto_id' => $value,
                'quantity' => $request->quantity,
                'sale_id' => $sale->id
            ]);
        }

        //$sale->productos()->sync($request->producto_id);
        $sale->tables()->sync($request->table_id);
        if ($request->payment_status == 'pendiente') {
            $sale->tables()->update([
                'status' => 1
            ]);
        }

        return redirect()->back()->with([
            'success' => 'Venta registrada correctamente'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
        return view('sales.edit')->with([
            'tables' => $sale->tables()->where('sale_id', $sale->id)->get(),
            'productos' => $sale->productos,
            "categorias" => Categoria::has('productos')->get(),
            'users' => User::all(),
            'sale' => $sale
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $this->validate($request, [
            "table_id" => 'required',
            "producto_id" => '',
            'user_id' => 'required',
            "quantity" => 'required',
            'price' => 'required',
            'total' => 'required',
            'payment_type' => 'required',
            'payment_status' => 'required'
        ], [
            'table_id.required' => 'Debes seleccionar una mesa',
            'producto_id.required' => 'Selecciona al menos un producto',
            'user_id.required' => 'Debes seleccionar una mesa',
            'quantity.required' => 'Debes agregar la cantidad',
            'price.required' => 'El precio no puede estar vacio',
            'total.required' => 'El total no puede estar vacio',
            'payment_status.required' => 'Debes seleccionar el estado del pago',
            'payment_type.required' => 'Debes seleccionar el metodo de pago'
        ]);

        $sale->user_id = $request->user_id;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;
        $sale->total = $request->total;
        $sale->change = $request->change;
        $sale->payment_type = $request->payment_type;
        $sale->payment_status = $request->payment_status;
        $sale->update();
        //$sale->productos()->sync($request->producto_id);
        if ($request->producto_id) {
            foreach ($request->producto_id as $value) {
                ProductoSale::create([
                    'producto_id' => $value,
                    'quantity' => $request->quantity,
                    'sale_id' => $sale->id
                ]);
            }
        }
        
        $sale->tables()->sync($request->table_id);
        if ($request->payment_status == 'pagado') {
            $sale->tables()->update([
                'status' => 0
            ]);
        }
        return redirect()->route("sales.create")->with([
            'success' => 'Venta actualizada con exito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
        $sale->tables()->update([
            'status' => 0
        ]);
        $sale->payment_status = 'pagado';
        $sale->update();
        return redirect()->back()->with([
            'success' => 'Venta cerrada correctamente'
        ]);
    }
}
