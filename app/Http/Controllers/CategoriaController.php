<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Str;
use Image;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
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
        return view('categoria.index')->with([
            'categorias' => Categoria::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'activa' => 'required',
        ]);
        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save( public_path('img/categorias/' . $imageName));
            $nombre = $request->nombre;
            Categoria::create([
                'nombre' => $nombre,
                'slug' => Str::slug($nombre),
                'descripcion' => $request->descripcion,
                'imagen' => $imageName,
                'activa' => $request->activa,
            ]);
            return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada con éxito.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //$categoria = Categoria::find($id);

        return view('categoria.show')->with([
            'categoria' => $categoria
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit')->with([
            'categoria' => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'activa' => 'required',
        ]);
        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save( public_path('img/categorias/' . $imageName));
            $nombre = $request->nombre;
            $categoria->update([
                'nombre' => $nombre,
                'slug' => Str::slug($nombre),
                'descripcion' => $request->descripcion,
                'imagen' => $imageName,
                'activa' => $request->activa,
            ]);
            return redirect()->route('categorias.index')
            ->with('success', 'Categoría actualizada con exito.');
        }
    }

    /**
     * Remove the specified resource from storage
     *
     * @param \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')
            ->with('success', 'Categoria eliminada correctamente');
    }
}
