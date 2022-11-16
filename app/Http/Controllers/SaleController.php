<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Table;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
        $this->validate($request,[
            "table_id" => 'required',
            "producto_id" => 'required',
            'user_id' => 'required',
            "quantity" => 'required',
            'price' => 'required',
            'total' => 'required',
            'payment_status' => 'required',
            'payment_type' => 'required'
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

        $sale->productos()->sync($request->producto_id);
        $sale->tables()->sync($request->table_id);
        $sale->tables()->update([
            'status' => 0
        ]);
        return redirect()->back()->with([
            'success' => 'Producto agregado correctamente'
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
        return view('sales.create')->with([
            'tables' => $sale->tables()->where('sale_id', $sale->id)->get(),
            'productos' => $sale->productos()->where('sale_id', $sale->id)->get(),
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
        //
        $this->validate($request,[
            "table_id" => 'required',
            "producto_id" => 'required',
            'user_id' => 'required',
            "quantity" => 'required',
            'price' => 'required',
            'total' => 'required',
            'payment_status' => 'required',
            'payment_type' => 'required'
        ]);
        $sale->user_id = $request->user_id;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;
        $sale->total = $request->total;
        $sale->change = $request->change;
        $sale->payment_status = $request->payment_status;
        $sale->payment_type = $request->payment_type;
        $sale->update();

        $sale->productos()->sync($request->producto_id);
        $sale->tables()->sync($request->table_id);
        return redirect()->back()->with([
            'success' => 'Producto actualizado correctamente'
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
            'status' => 1
        ]);
        $sale->delete();
        return redirect()->back()->with([
            'success' => 'Producto eliminado correctamente'
        ]);
    }
}
