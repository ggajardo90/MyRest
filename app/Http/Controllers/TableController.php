<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Requests;
use Image;

/**
 * Class TableController
 * @package App\Http\Controllers
 */
class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::paginate();

        return view('tables.index', compact('tables'))
            ->with('i', (request()->input('page', 1) - 1) * $tables->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = new Table();
        return view('tables.create', compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Table::$rules);
        $requestData = $request->all();

        $table = Table::create($requestData);

        return redirect()->route('tables.index')
            ->with('success', 'Categoría creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Table::find($id);

        return view('tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);

        return view('tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Table $tables
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        request()->validate(Table::$rules);
        $requestData = $request->all();

        $table->update($requestData);

        return redirect()->route('tables.index')
            ->with('success', 'Table actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $table = Table::find($id)->delete();

        return redirect()->route('tables.index')
            ->with('success', 'Table eliminada correctamente');
    }
}
