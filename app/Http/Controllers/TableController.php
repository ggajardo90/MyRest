<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class TableController
 * @package App\Http\Controllers
 */
class TableController extends Controller
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
        //
        return view("tables.index")->with([
            "tables" => Table::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = new Table();
        return view("tables.create", compact("table"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            "name" => "required",
            "status" => "required|boolean"
        ], [
            'name.required' => 'Ingrese el nombre de la mesa',
            'status.required' => 'Selecciona el estado de la mesa'
        ]);
        $name = $request->name;
        Table::create([
            "name" => $name,
            "slug" => Str::slug($name),
            "status" => $request->status
        ]);
        return redirect()->route("tables.index")
            ->with("success", "Mesa creada con éxito.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        return view("tables.show")->with([
            "table" => $table
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view("tables.edit")->with([
            "table" => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $this->validate($request, [
            "name" => "required",
            "status" => "required|boolean"
        ], [
            'name.required' => 'Ingrese el nombre de la mesa',
            'status.required' => 'Selecciona el estado de la mesa'
        ]);
        $name = $request->name;
        $table->update([
            "name" => $request->name,
            "slug" => Str::slug($name),
            "status" => $request->status
        ]);

        return redirect()->route("tables.index")
            ->with("success", "Mesa actualizada correctamente");
    }

    /**
     * @param  \App\Models\Table   $table
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route("tables.index")->with([
            "success", "Table eliminada correctamente"
        ]);
    }
}
